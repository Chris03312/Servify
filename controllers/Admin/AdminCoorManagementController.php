<?php

require_once __DIR__ . '/../../models/Sidebarinfo.php';
require_once __DIR__ . '/../../models/CoordinatorManagement.php';
require __DIR__ . '/../../package/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class AdminCoorManagementController
{
    public static function ShowAdminCoorManagement()
    {

        session_start();

        // Retrieve the session_id from GET or POST request
        $session_id = $_GET['token'] ?? '';

        // Check if the session exists for the given session_id
        if (!isset($_SESSION['sessions'][$session_id])) {
            redirect('/login');
        }

        // Fetch user session data
        $userSession = $_SESSION['sessions'][$session_id];
        $email = $userSession['email'];
        $role = $userSession['role'];

        $sidebarData = SidebarInfo::getSidebarInfo($email, $role);
        $coordinatorManagement = CoordinatorManagement::getCoordinatorManagement();

        view('Admin/admin_coordinator_management', [
            'role' => $role,
            'coordinatorManagement' => $coordinatorManagement,
            'adminsidebarinfo' => $sidebarData
        ]);
    }

    public static function ViewCoordinatorDetails()
    {
        try {
            // Ensure the request is POST and has application_id
            if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['coordinator_id']) || empty($_POST['coordinator_id'])) {
                throw new Exception("Invalid request.");
            }

            $session_id = $_GET['token'];
            $coordinator_id = $_POST['coordinator_id'];

            $_SESSION['coordinator_id'] = $coordinator_id;
            // Redirect after deletion
            redirect('/view_coordinator_details?token=' . urlencode($session_id));
        } catch (PDOException $e) {
            error_log('Error deleting application: ' . $e->getMessage());
        } catch (Exception $e) {
            error_log('Validation error: ' . $e->getMessage());
        }
    }

    public static function ShowAddCoordinator()
    {
        $config = require __DIR__ . '/../../configuration/smtp_config.php';
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register_new_coordinator'])) {
            $conn = Database::getConnection();
            if (!$conn) {
                die(json_encode(["success" => false, "errors" => ["general" => "Database connection failed."]]));
            }

            $input = [
                'role' => htmlspecialchars($_POST['role'] ?? ''),
                'surname' => htmlspecialchars($_POST['surname'] ?? ''),
                'firstname' => htmlspecialchars($_POST['firstname'] ?? ''),
                'middlename' => htmlspecialchars($_POST['middlename'] ?? ''),
                'suffix' => htmlspecialchars($_POST['suffix'] ?? ''),
                'city' => htmlspecialchars($_POST['city'] ?? ''),
                'district' => htmlspecialchars($_POST['district'] ?? ''),
                'parishName' => htmlspecialchars($_POST['parishName'] ?? ''),
                'email' => htmlspecialchars($_POST['email'] ?? ''),
                'username' => htmlspecialchars($_POST['username'] ?? ''),
                'generated_password' => $_POST['generated_password'] ?? ''
            ];

            try {
                $conn->beginTransaction();

                // Insert into accounts FIRST to generate the account_id
                $stmt1 = $conn->prepare("
                    INSERT INTO accounts (email, username, password, role) 
                    VALUES (:email, :username, :password, :role)
                ");
                $stmt1->execute([
                    ':email' => $input['email'],
                    ':username' => $input['username'],
                    ':role' => $input['role'],
                    ':password' => password_hash($input['generated_password'], PASSWORD_BCRYPT)
                ]);

                // Get the newly generated account_id
                $account_id = $conn->lastInsertId();

                if (!$account_id) {
                    throw new Exception("Failed to insert into accounts");
                }

                // Insert into cprofile_table using the same account_id as cprofile_id
                $stmt2 = $conn->prepare("
                    INSERT INTO cprofile_table (CPROFILE_ID, ACCOUNT_ID, surname, first_name, middle_name, suffix, `MUNICIPALITY/CITY`, district, parish, email, username) 
                    VALUES (:cprofile_id, :account_id, :surname, :firstname, :middlename, :suffix, :city, :district, :parishName, :email, :username)
                ");
                $stmt2->execute([
                    ':cprofile_id' => $account_id,  // Ensuring CPROFILE_ID matches ACCOUNT_ID
                    ':account_id' => $account_id,   // Ensuring ACCOUNT_ID matches CPROFILE_ID
                    ':surname' => $input['surname'],
                    ':firstname' => $input['firstname'],
                    ':middlename' => $input['middlename'],
                    ':suffix' => $input['suffix'],
                    ':city' => $input['city'],
                    ':district' => $input['district'],
                    ':parishName' => $input['parishName'],
                    ':email' => $input['email'],
                    ':username' => $input['username']
                ]);

                $conn->commit();
                // ✅ Set success alert in session
                $_SESSION['alert'] = '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Coordinator added successfully!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ';
                header("Location: ../admin_coordinator_management");



                // Send email after successful registration
                self::sendWelcomeEmail($input['email'], $input['firstname'], $input['generated_password'], $config);

                // echo json_encode(["success" => true, "message" => "Coordinator added successfully"]);
                exit;
            } catch (Exception $e) {
                $conn->rollBack();
                error_log("Database Error: " . $e->getMessage());
                echo json_encode(["success" => false, "errors" => ["general" => $e->getMessage()]]);
                exit;
            }
        }
    }

    private static function sendWelcomeEmail($email, $first_name, $password, $config)
    {
        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = $config['SMTP_HOST'];
            $mail->SMTPAuth = true;
            $mail->Username = $config['SMTP_USER'];
            $mail->Password = $config['SMTP_PASSWORD'];
            $mail->SMTPSecure = $config['SMTP_SECURE'];
            $mail->Port = $config['SMTP_PORT'];
            $mail->setFrom($config['SMTP_USER']);
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'Welcome to Servify!';
            $mail->Body = "
            <p>Dear <b>{$first_name}</b>,</p>
            <p>Thank you for signing up! Below are your login credentials:</p>
            <ul>
                <li><b>Email:</b> {$email}</li>
                <li><b>Password:</b> {$password}</li>
            </ul>
            <p>Please change your password after logging in.</p>
            <p>Best regards,<br>Servify Team</p>";
            $mail->AltBody = "Dear {$first_name},\n\nThank you for signing up!\n\nYour login details:\nEmail: {$email}\nPassword: {$password}\n\nPlease change your password after logging in.\n\nBest regards,\nServify Team";
            $mail->send();
        } catch (Exception $e) {
            error_log('Email error: ' . $e->getMessage());
        }
    }
}
