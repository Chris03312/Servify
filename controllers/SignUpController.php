<?php

require_once __DIR__ . '/../models/Signup.php';
require __DIR__ . '/../package/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class SignUpController
{

    public static function ShowSignUp()
    {
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

    public static function SignUp()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return view('signup');
        }

        $config = require __DIR__ . '/../configuration/smtp_config.php';

        // Capture and sanitize input
        $input = [
            'parish' => htmlspecialchars($_POST['parish'] ?? ''),
            'role' => 'Volunteer',
            'surname' => htmlspecialchars($_POST['surname'] ?? ''),
            'firstname' => htmlspecialchars($_POST['firstname'] ?? ''),
            'middleName' => htmlspecialchars($_POST['middleName'] ?? ''),
            'nameSuffix' => !empty($_POST['suffix']) ? htmlspecialchars($_POST['suffix']) : 'N/A',
            'birthMonth' => htmlspecialchars($_POST['birthMonth'] ?? ''),
            'birthDate' => htmlspecialchars($_POST['birthDate'] ?? ''),
            'birthYear' => htmlspecialchars($_POST['birthYear'] ?? ''),
            'city' => htmlspecialchars($_POST['city'] ?? ''),
            'street' => htmlspecialchars($_POST['street'] ?? ''),
            'barangay' => htmlspecialchars($_POST['barangay'] ?? ''),
            'district' => htmlspecialchars($_POST['district'] ?? ''),
            'zipCode' => htmlspecialchars($_POST['zipcode'] ?? ''),
            'email' => filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL),
            'username' => htmlspecialchars($_POST['username'] ?? ''),
            'password' => $_POST['password'] ?? '',
            'confirmPassword' => $_POST['confirmPassword'] ?? '',
            'profile_date_created' => date('F d, Y'),
        ];

        // Validate input
        $errors = self::validateSignUp($input);
        if (!empty($errors)) {
            error_log("SignUp validation errors: " . json_encode($errors)); // Log validation errors
            header("Content-Type: application/json");
            echo json_encode(["success" => false, "errors" => $errors]);
            exit;
        }

        try {
            $db = Database::getConnection();

            // Check if email or username already exists
            $stmt = $db->prepare('
                    SELECT 
                        (SELECT COUNT(*) FROM VPROFILE_TABLE WHERE EMAIL = :email) AS email_count,
                        (SELECT COUNT(*) FROM ACCOUNTS WHERE USERNAME = :username) AS username_count
                ');
            $stmt->execute([':email' => $input['email'], ':username' => $input['username']]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result['email_count'] > 0) {
                $errors['email'] = 'Email already exists.';
            }
            if ($result['username_count'] > 0) {
                $errors['username'] = 'Username already exists.';
            }

            if (!empty($errors)) {
                error_log("SignUp duplicate check errors: " . json_encode($errors)); // Log duplicate check errors
                header("Content-Type: application/json");
                echo json_encode(["success" => false, "errors" => $errors]);
                exit;
            }

            $db->beginTransaction();

            // Insert into VPROFILE_TABLE
            $stmt = $db->prepare('
                    INSERT INTO VPROFILE_TABLE 
                    (PROFILE_DATE_CREATED, PARISH, ROLE, SURNAME, FIRST_NAME, MIDDLE_NAME, NAME_SUFFIX, BIRTHMONTH, BIRTHDATE, BIRTHYEAR, CITY, STREETADDRESS, BARANGAY, DISTRICT, ZIPCODE, EMAIL)
                    VALUES
                    (:profile_date_created, :parish, :role, :surname, :firstname, :middleName, :nameSuffix, :birthMonth, :birthDate, :birthYear, :city, :street, :barangay, :district, :zipCode, :email)
                ');
            $stmt->execute([
                ':profile_date_created' => $input['profile_date_created'],
                ':parish' => $input['parish'],
                ':role' => $input['role'],
                ':surname' => $input['surname'],
                ':firstname' => $input['firstname'],
                ':middleName' => $input['middleName'],
                ':nameSuffix' => $input['nameSuffix'],
                ':birthMonth' => $input['birthMonth'],
                ':birthDate' => $input['birthDate'],
                ':birthYear' => $input['birthYear'],
                ':city' => $input['city'],
                ':street' => $input['street'],
                ':barangay' => $input['barangay'],
                ':district' => $input['district'],
                ':zipCode' => $input['zipCode'],
                ':email' => $input['email']
            ]);

            $vprofileId = $db->lastInsertId();

            // Insert into ACCOUNTS
            $stmt = $db->prepare('
                    INSERT INTO ACCOUNTS (ACCOUNT_ID, ROLE, PARISH, USERNAME, EMAIL, PASSWORD)
                    VALUES (:account_id, :role, :parish, :username, :email, :password)
                ');
            $stmt->execute([
                ':account_id' => $vprofileId,
                ':role' => $input['role'],
                ':parish' => $input['parish'],
                ':username' => $input['username'],
                ':email' => $input['email'],
                ':password' => password_hash($input['password'], PASSWORD_BCRYPT)
            ]);

            $db->commit();

            // Send welcome email
            self::sendWelcomeEmail($input['email'], $input['firstname'], $config);

            header("Content-Type: application/json");
            echo json_encode(["success" => true]);
            exit;

        } catch (Exception $e) {
            $db->rollBack();
            error_log('Database Error: ' . $e->getMessage()); // Log database error
            header("Content-Type: application/json");
            echo json_encode(["success" => false, "errors" => ['general' => 'Something went wrong. Please try again later.']]);
            exit;
        }
    }

    // Separate function for validation
    private static function validateSignUp(array $input)
    {
        $errors = [];
        $currentMonth = date('m');
        $currentYear = date('Y');
        $minimumYear = $currentYear - 18;

        if (empty($input['email']) || !filter_var($input['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Invalid email address.';
        }
        if (empty($input['username']) || !preg_match('/^[a-zA-Z0-9]+$/', $input['username'])) {
            $errors['username'] = 'Username must contain only letters and numbers.';
        }
        if (empty($input['surname']) || !preg_match('/^[a-zA-Z]+$/', $input['surname'])) {
            $errors['surname'] = 'Surname must contain only letters.';
        }
        if (empty($input['firstname']) || !preg_match('/^[a-zA-Z]+$/', $input['firstname'])) {
            $errors['firstname'] = 'First name must contain only letters.';
        }
        if (strlen($input['password']) < 8) {
            $errors['password'] = 'Password must be at least 8 characters long.';
        }
        if ($input['password'] !== $input['confirmPassword']) {
            $errors['confirmPassword'] = 'Passwords do not match.';
        }
        if (empty($input['birthMonth'])) {
            $errors['birthMonth'] = 'Birth month is required. Please select a month from January to December.';
        }

        if (!preg_match('/^(0?[1-9]|1[0-9]|2[0-9]|31)$/', $input['birthDate'])) {
            $errors['birthDate'] = 'Birth Date is required. Please input a number from 1 to 31.';
        }

        if (!preg_match('/^(19|20)\d{2}$/', $input['birthYear']) || $input['birthYear'] < 1900 || $input['birthYear'] > $minimumYear) {
            $errors['birthYear'] = 'Birth year must be at least 18 years old.';
        }

        $requiredFields = ['parish', 'city', 'street', 'barangay', 'zipCode'];
        foreach ($requiredFields as $field) {
            if (empty($input[$field])) {
                $errors[$field] = ucfirst(str_replace('_', ' ', $field)) . ' is required.';
            }
        }

        return $errors;
    }

    // Separate function to send email
    private static function sendWelcomeEmail($email, $firstname, $config)
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
            $mail->Body = "<p>Dear {$firstname},</p><p>Thank you for signing up!</p>";
            $mail->AltBody = 'Thank you for signing up!';
            $mail->send();
        } catch (Exception $e) {
            error_log('Email error: ' . $e->getMessage()); // Log email error
        }
    }

}

