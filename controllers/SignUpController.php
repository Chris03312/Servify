<?php

class SignUpController {

        public static function showSignUp() {
            view('signup');
        }

        public static function signup() {
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
                $confirmPassword = $_POST['confirmPassword'] ?? ''; // Ensure the name matches form field
        
                // Validation: Check if email or username already exists
                $db = Database::getConnection();
                
                // Check for existing email
                $stmtEmail = $db->prepare('SELECT COUNT(*) FROM REGISTRATION WHERE email = :email');
                $stmtEmail->execute([':email' => $email]);
                $emailExists = $stmtEmail->fetchColumn() > 0;
        
                // Check for existing username
                $stmtUsername = $db->prepare('SELECT COUNT(*) FROM ACCOUNTS WHERE username = :username');
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
                        role, 
                        surname, 
                        firstname, 
                        middlename, 
                        name_suffix,
                        birthmonth, 
                        birthdate, 
                        birthyear,
                        city,
                        streetaddress, 
                        barangay, 
                        zipcode, 
                        email
                    ) VALUES
                    (
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
        
                    // Insert account credentials into the ACCOUNTS table
                    $registrationId = $db->lastInsertId();

                    // Insert account credentials into the ACCOUNTS table with the registration ID
                    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                    $stmt = $db->prepare('INSERT INTO ACCOUNTS (username, password, registration_id) VALUES (:username, :password, :registrationId)');
                    $stmt->execute([
                        ':username' => $username,
                        ':password' => $hashedPassword,
                        ':registrationId' => $registrationId // Insert the last inserted registration ID
                    ]);

                    redirect('/login');
                } catch (PDOException $e) {
                    // Log the error (you can log to a file or to your database)
                    // Return to the signup page with the errors
                    redirect('/signup');
                }
            }
        }

}

?>
