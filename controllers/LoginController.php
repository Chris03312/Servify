<?php 

session_start();

class LoginController {

    public static function ShowLoginForm() {
        
        view('login'); // Ensure this helper correctly renders the view
    }
    
    public static function Login()
    {
        require_once __DIR__ . '/../configuration/Database.php'; // Include the Database class

        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $rememberMe = isset($_POST['remember_me']);

        try {
            // Get the database connection
            $db = Database::getConnection();

            // Check if the email exists
            $stmt = $db->prepare('SELECT * FROM ACCOUNTS WHERE EMAIL = :email');
            $stmt->execute(['email' => $email]);

            if ($stmt->rowCount() === 1) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                // Check if the account is active
                if ($user['STATUS'] !== 'ACTIVE') {
                    view('login', ['error' => 'Your account is not active. Please contact support.']);
                    return;
                }

                // Verify password
                if (password_verify($password, $user['PASSWORD'])) {
                    $_SESSION['loggedin'] = true;
                    $_SESSION['email'] = $email;
                    $_SESSION['username'] = $user['USERNAME'];

                    // Handle "Remember Me" functionality
                    if ($rememberMe) {
                        $token = bin2hex(random_bytes(32)); // Generate secure token

                        date_default_timezone_set('Asia/Manila');
                        $currentTimestamp = time(); // Current Unix timestamp in Manila timezone
                        $expiry = $currentTimestamp + (30 * 24 * 60 * 60); // Add 30 days

                        // Save token and expiry in the database
                        $updateStmt = $db->prepare('UPDATE ACCOUNTS SET remember_token = :token, token_expiry = :expiry WHERE email = :email');
                        $updateStmt->execute([
                            'token' => $token,
                            'expiry' => date('Y-m-d H:i:s', $expiry),
                            'email' => $email,
                        ]);

                        // Set a secure cookie
                        setcookie('remember_token', $token, $expiry, '/', '', true, true);
                    }

                    redirect('/volunteer_dashboard');
                } else {
                    view('login', ['error' => 'Invalid username or password.']);
                }
            } else {
                view('login', ['error' => 'Invalid username or password.']);
            }
        } catch (PDOException $e) {
            view('login', ['error' => 'An error occurred while processing your request. Please try again later.']);
            error_log('Login error: ' . $e->getMessage());
        }
    }

    public static function checkRememberMe()
    {
        if (!isset($_SESSION['loggedin']) && isset($_COOKIE['remember_token'])) {
            require_once __DIR__ . '/../configuration/Database.php';

            $token = $_COOKIE['remember_token'];

            try {
                $db = Database::getConnection();

                // Validate token and expiry
                $stmt = $db->prepare('SELECT * FROM accounts WHERE remember_token = :token AND token_expiry > NOW()');
                $stmt->execute(['token' => $token]);

                if ($stmt->rowCount() === 1) {
                    $user = $stmt->fetch(PDO::FETCH_ASSOC);
                    $_SESSION['loggedin'] = true;
                    $_SESSION['email'] = $user['EMAIL'];
                    $_SESSION['username'] = $user['USERNAME'];
                }
            } catch (PDOException $e) {
                error_log('Remember Me validation error: ' . $e->getMessage());
            }
        }
    }


}