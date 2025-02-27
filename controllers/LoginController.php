<?php

session_start();

class LoginController
{

    public static function ShowLoginForm()
    {
        view('login');
    }

    public static function Login()
    {
        require_once __DIR__ . '/../configuration/Database.php';

        $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'] ?? '';

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo json_encode(['error' => 'Invalid email address.']);
            return;
        }

        try {
            $db = Database::getConnection();

            // Use UNION to check both ACCOUNTS and ADMIN tables, including ROLE
            $stmt = $db->prepare('
                SELECT USERNAME, PASSWORD, STATUS, ROLE FROM ACCOUNTS WHERE EMAIL = :email 
                UNION 
                SELECT USERNAME, PASSWORD, STATUS, "Admin" AS ROLE FROM ADMIN WHERE EMAIL = :email
            ');
            $stmt->execute(['email' => $email]);

            if ($stmt->rowCount() === 1) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
            } else {
                echo json_encode(['error' => 'Invalid email or password.']);
                return;
            }

            if ($user['STATUS'] !== 'ACTIVE') {
                echo json_encode(['error' => 'Your account seems inactive. Please contact support.']);
                return;
            }

            // Ensure passwords are verified correctly
            if (password_verify($password, $user['PASSWORD'])) {
                $_SESSION['loggedin'] = true;
                $_SESSION['email'] = $email;
                $_SESSION['username'] = $user['USERNAME'];
                $_SESSION['role'] = $user['ROLE'];

                session_regenerate_id(true);

                echo json_encode([
                    'redirect' => $user['ROLE'] === 'Volunteer'
                        ? '/volunteer_dashboard'
                        : ($user['ROLE'] === 'Coordinator'
                            ? '/coordinator_dashboard'
                            : ($user['ROLE'] === 'Admin'
                                ? '/admin_dashboard'
                                : '/default_dashboard'))
                ]);
            } else {
                echo json_encode(['error' => 'Invalid password.']);
            }
        } catch (PDOException $e) {
            echo json_encode(['error' => 'An error occurred while processing your request. Please try again later.']);
            error_log('Login error: ' . $e->getMessage());
        }
    }
}
