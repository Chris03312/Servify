<?php

require_once __DIR__ . '/../configuration/Database.php';

class LoginController
{
    public static function ShowLoginForm()
    {
        view('login');
    }

    public static function Login()
    {
        session_start();

        $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'] ?? '';

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo json_encode(['error' => 'Invalid email address.']);
            return;
        }

        try {
            $db = Database::getConnection();
            $stmt = $db->prepare('
                SELECT USERNAME, PARISH, PASSWORD, STATUS, ROLE 
                FROM ACCOUNTS 
                WHERE EMAIL = :email 
                UNION 
                SELECT USERNAME, "Admin" AS PARISH, PASSWORD, STATUS, "Admin" AS ROLE 
                FROM ADMIN 
                WHERE EMAIL = :email
            ');

            $stmt->execute(['email' => $email]);

            if ($stmt->rowCount() !== 1) {
                echo json_encode(['error' => 'Invalid email or password.']);
                return;
            }

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user['STATUS'] !== 'ACTIVE') {
                echo json_encode(['error' => 'Your account is inactive. Contact support.']);
                return;
            }

            if (password_verify($password, $user['PASSWORD'])) {
                // Generate a unique session ID for this user
                $session_id = bin2hex(random_bytes(64)); // Generates a 64-character secure token

                // Store session data under the unique session ID
                $_SESSION['sessions'][$session_id] = [
                    'session_id' => $session_id,
                    'loggedin' => true,
                    'email' => $email,
                    'parish' => $user['PARISH'],
                    'role' => $user['ROLE'],
                    'username' => $user['USERNAME']
                ];

                echo json_encode([
                    'redirect' => match ($user['ROLE']) {
                        'Volunteer' => "/volunteer_dashboard?token=$session_id",
                        'Coordinator' => "/coordinator_dashboard?token=$session_id",
                        'Admin' => "/admin_dashboard?token=$session_id",
                        default => "/index"
                    }
                ]);
            } else {
                echo json_encode(['error' => 'Invalid password.']);
            }
        } catch (PDOException $e) {
            echo json_encode(['error' => 'Login error. Please try again later.']);
            error_log('Login error: ' . $e->getMessage());
        }
    }


}
