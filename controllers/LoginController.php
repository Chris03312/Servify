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
    
        try {
            // Get the database connection
            $db = Database::getConnection();
    
            // Check if the email exists and fetch the role
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
                    $_SESSION['role'] = $user['ROLE']; // Store role in session
    
                    // Redirect based on the user's role
                    if ($user['ROLE'] === 'Volunteer') {
                        redirect('/volunteer_dashboard');
                    } elseif ($user['ROLE'] === 'Coordinator') {
                        redirect('/coordinator_dashboard');
                    } elseif ($user['ROLE'] === 'Admin') {
                        redirect('/admin_dashboard');
                    } else {
                        view('login', ['error' => 'Invalid user role.']);
                    }
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
}
