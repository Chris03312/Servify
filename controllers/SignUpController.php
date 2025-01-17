<?php

class SignUpController {

        public static function ShowSignUp() {
            view('signup');
        }

        public static function SignUp() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
                // Capture form data
                $role = $_POST['role'] ?? '';
                $surname = $_POST['surname'] ?? '';
                $firstName = $_POST['firstname'] ?? '';
                $middleName = $_POST['middlename'] ?? '';
                $nameSuffix = $_POST['namesuffix'] ?? '';
                $birthMonth = $_POST['birthMonth'] ?? '';
                $birthDate = $_POST['birthDate'] ?? '';
                $birthYear = $_POST['birthYear'] ?? '';
                $city = $_POST['city'] ?? '';
                $streetaddress = $_POST['streetaddress'] ?? '';
                $barangay = $_POST['barangay'] ?? '';
                $zipCode = $_POST['zipcode'] ?? '';
                $email = $_POST['email'] ?? '';
                $username = $_POST['username'] ?? '';
                $password = $_POST['password'] ?? '';
                $confirmPassword = $_POST['confirmPassword'] ?? '';
                $registration_date = date('F d, Y'); // Registration date format
                
                // Validation: Check if email or username already exists
                $db = Database::getConnection();
                
                // Check for existing email
                $stmtEmail = $db->prepare('SELECT COUNT(*) FROM REGISTRATION WHERE EMAIL = :email');
                $stmtEmail->execute([':email' => $email]);
                $emailExists = $stmtEmail->fetchColumn() > 0;
        
                // Check for existing username
                $stmtUsername = $db->prepare('SELECT COUNT(*) FROM ACCOUNTS WHERE USERNAME = :username');
                $stmtUsername->execute([':username' => $username]);
                $usernameExists = $stmtUsername->fetchColumn() > 0;
        
                if ($emailExists) {
                    $errors[] = 'Email is already registered.';
                }
                if ($usernameExists) {
                    $errors[] = 'Username is already taken.';
                }
        
                // Validate password match
                if ($password !== $confirmPassword) {
                    $errors[] = 'Passwords do not match.';
                }
        
                // If no errors, proceed with insertion
                try {
                    // Insert user details into the REGISTRATION table
                    $stmt = $db->prepare('INSERT INTO REGISTRATION 
                    (
                        REGISTRATION_DATE,
                        ROLE, 
                        SURNAME, 
                        FIRST_NAME, 
                        MIDDLE_NAME, 
                        NAME_SUFFIX,
                        BIRTHMONTH, 
                        BIRTHDATE, 
                        BIRTHYEAR,
                        CITY,
                        STREETADDRESS, 
                        BARANGAY, 
                        ZIPCODE, 
                        EMAIL
                    ) VALUES
                    (
                        :registration_date,
                        :role, 
                        :surname, 
                        :firstName, 
                        :middleName, 
                        :nameSuffix, 
                        :birthMonth,
                        :birthDate,
                        :birthYear,
                        :city,
                        :streetaddress, 
                        :barangay, 
                        :zipCode, 
                        :email
                    )');
                
                    $stmt->execute([
                        ':registration_date' => $registration_date,
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
        
                    // Insert account credentials into the ACCOUNTS table using registration_id as account_id
                    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                    $stmt = $db->prepare('INSERT INTO ACCOUNTS (ACCOUNT_ID, USERNAME, EMAIL, PASSWORD) VALUES (:account_id, :username, :email, :password)');
                    $stmt->execute([
                        ':account_id' => $registrationId,  // Insert registration_id as account_id
                        ':username' => $username,
                        ':email' => $email,
                        ':password' => $hashedPassword
                    ]);
        
                    redirect('/login');
                } catch (PDOException $e) {
                    // Log the error (you can log to a file or display it)
                    error_log('Error in signup: ' . $e->getMessage());
                    // Return to the signup page with the errors
                    redirect('/signup');
                }
            }
        }        
    
}

?>
 