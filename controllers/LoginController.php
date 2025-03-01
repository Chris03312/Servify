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

        // Fetch user details from ACCOUNTS and ADMIN tables
        $stmt = $db->prepare('
            SELECT ACCOUNT_ID, USERNAME, PASSWORD, STATUS, ROLE, FIRST_TIME_LOGIN 
            FROM ACCOUNTS WHERE EMAIL = :email 
            UNION 
            SELECT ADMIN_ID AS ACCOUNT_ID, USERNAME, PASSWORD, STATUS, "Admin" AS ROLE, 0 AS FIRST_TIME_LOGIN 
            FROM ADMIN WHERE EMAIL = :email
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

        // Verify password
        if (password_verify($password, $user['PASSWORD'])) {
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;
            $_SESSION['username'] = $user['USERNAME'];
            $_SESSION['role'] = $user['ROLE'];
            $_SESSION['user_id'] = $user['ACCOUNT_ID'];

            session_regenerate_id(true);

            // Redirect coordinators to change password if first_time_login = 1
            if ($user['ROLE'] === 'Coordinator' && $user['FIRST_TIME_LOGIN'] == 1) {
                echo json_encode(['redirect' => '/coordinator_change_pass']);
                return;
            }

            // Normal role-based redirection
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
