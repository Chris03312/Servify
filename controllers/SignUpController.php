<?php

require_once __DIR__ . '/../models/signup.php';
require __DIR__ .'/../package/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class SignUpController {

    public static function ShowSignUp() {
        $cities = Signup::cities();
        $barangays = Signup::barangays(); // Get all barangays initially
    
        // If a city is selected, fetch the barangays for that city
        $selectedCity = $_GET['city'] ?? null;
        if ($selectedCity) {
            $barangays = Signup::barangays($selectedCity); // Filter by city
        }
    
        // Pass data to the view
        view('signup', [
            'barangays' => $barangays,
            'cities' => $cities
        ]);
    }
    
    public static function SignUp() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $config = require __DIR__. '/../configuration/smtp_config.php';

            // Capture form data
            $parish = $_POST['parish'] ?? " ";
            $role = $_POST['role'] ?? '';
            $surname = $_POST['surname'] ?? '';
            $firstName = $_POST['firstname'] ?? '';
            $middleName = $_POST['middlename'] ?? '';
            $nameSuffix = $_POST['suffix'] ?? '';
            $birthMonth = $_POST['birthMonth'] ?? '';
            $birthDate = $_POST['birthDate'] ?? '';
            $birthYear = $_POST['birthYear'] ?? '';
            $city = $_POST['city'] ?? '';
            $streetaddress = $_POST['street'] ?? '';
            $barangay = $_POST['barangay'] ?? '';
            $zipCode = $_POST['zipcode'] ?? '';
            $email = $_POST['email'] ?? '';
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            $confirmPassword = $_POST['confirmPassword'] ?? '';
            $registration_date = date('F d, Y');
            $role = 'Volunteer'; // Registration date format
            
            // Validation: Check if email or username already exists in a single query
            $db = Database::getConnection();
            
            // Prepare a query to check both email and username existence at once
            $stmtCheck = $db->prepare('
                SELECT COUNT(*) FROM REGISTRATION WHERE EMAIL = :email
                UNION
                SELECT COUNT(*) FROM ACCOUNTS WHERE USERNAME = :username
            ');
            $stmtCheck->execute([':email' => $email, ':username' => $username]);

            // Fetch the results
            $emailExists = $stmtCheck->fetchColumn(0) > 0;
            $usernameExists = $stmtCheck->fetchColumn(1) > 0;

            // Check for errors
            $errors = [];

            if ($emailExists) {
                $errors['email'] = 'Email already exists.';
            }
            
            if ($usernameExists) {
                $errors['username'] = 'Username already exists.';
            }
            
            
            if (empty($errors)) {
                // Begin a transaction
                try {
                    $db->beginTransaction();

                    // Insert into REGISTRATION table
                    $stmt = $db->prepare('
                        INSERT INTO REGISTRATION 
                        (REGISTRATION_DATE, PARISH, ROLE, SURNAME, FIRST_NAME, MIDDLE_NAME, NAME_SUFFIX, BIRTHMONTH, BIRTHDATE, BIRTHYEAR, CITY, STREETADDRESS, BARANGAY, ZIPCODE, EMAIL) 
                        VALUES 
                        (:registration_date, :parish, :role, :surname, :firstName, :middleName, :nameSuffix, :birthMonth, :birthDate, :birthYear, :city, :streetaddress, :barangay, :zipCode, :email)
                    ');
                    $stmt->execute([
                        ':registration_date' => $registration_date,
                        ':parish' => $parish,
                        ':role' => $role,
                        ':surname' => $surname,
                        ':firstName' => $firstName,
                        ':middleName' => $middleName,
                        ':nameSuffix' => $nameSuffix,
                        ':birthMonth' => $birthMonth,
                        ':birthDate' => $birthDate,
                        ':birthYear' => $birthYear,
                        ':city' => $city,
                        ':streetaddress' => $streetaddress,
                        ':barangay' => $barangay,
                        ':zipCode' => $zipCode,
                        ':email' => $email
                    ]);

                    // Get the last inserted registration_id
                    $registrationId = $db->lastInsertId();

                    // Insert into ACCOUNTS table
                    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                    $stmt = $db->prepare('
                        INSERT INTO ACCOUNTS (ACCOUNT_ID, ROLE, USERNAME, EMAIL, PASSWORD) 
                        VALUES (:account_id, :role, :username, :email, :password)
                    ');
                    $stmt->execute([
                        ':account_id' => $registrationId, // Insert registration_id as account_id
                        ':role' => $role,
                        ':username' => $username,
                        ':email' => $email,
                        ':password' => $hashedPassword
                    ]);

                    // Initialize PHPMailer
                    $mail = new PHPMailer(true);
                    // Server settings
                    $mail->isSMTP();
                    $mail->Host       = $config['SMTP_HOST'];
                    $mail->SMTPAuth   = true;
                    $mail->Username   = $config['SMTP_USER'];
                    $mail->Password   = $config['SMTP_PASSWORD'];
                    $mail->SMTPSecure = $config['SMTP_SECURE'];
                    $mail->Port       = $config['SMTP_PORT'];
                    // Recipients
                    $mail->setFrom($config['SMTP_USER']);
                    $mail->addAddress($email);
                    // Content
                    $mail->isHTML(true);
                    $mail->Subject = 'Welcome to Servify!';
                    $mail->Body    = '<p>Dear ' . htmlspecialchars($firstName) . ',</p>
                                        <p>Thank you for signing up!</p>
                                        <p><a href="https://servify.infinityfreeapp.com/login">Click here</a> to complete your profile </p><br>
                                        <p>Best regards,<br>Servify</p>';
                                        
                    $mail->AltBody = 'Thank you for signing up!';
                
                    // Send email
                    $mail->send();

                    // Commit the transaction
                    $db->commit();

                    // Redirect to login
                    redirect('/login');

                } catch (PDOException $e) {
                    // Rollback the transaction if anything goes wrong
                    $db->rollBack();

                    // Log the error and return to the signup page with errors
                    error_log('Error in signup: ' . $e->getMessage());
                    redirect('/signup');
                }
            } else {
                // Return to the signup page with errors
                redirect('/signup');
            }
        }
    } 
}

?>
