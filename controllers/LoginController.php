<?php 

session_start();

class LoginController {

    public static function ShowLoginForm() {

        view('login'); // Ensure this helper correctly renders the view
    }
    
    
    public static function login()
    {
        require_once __DIR__ . '/../configuration/Database.php'; // Include the Database class

        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        try {
            // Get the database connection
            $db = Database::getConnection();

            // Create a prepared statement to prevent SQL injection
            $stmt = $db->prepare('SELECT * FROM accounts WHERE EMAIL = :email');
            $stmt->execute(['email' => $email]); // Match placeholder case with key

            // Check if the user exists
            if ($stmt->rowCount() === 1) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                // Verify the provided password against the hashed password
                if (password_verify($password, $user['PASSWORD'])) {
                    $_SESSION['loggedin'] = true;
                    $_SESSION['email'] = $email;
                    $_SESSION['username'] = $user['USERNAME'];

                    redirect('/volunteer_dashboard');
                } else {
                    // Invalid password
                    view('login', ['error' => 'Invalid username or password.']);
                }
            } else {
                // Invalid email
                view('login', ['error' => 'Invalid username or password.']);
            }
        } catch (PDOException $e) {
            // Handle database connection or query errors
            view('login', ['error' => 'An error occurred while processing your request. Please try again later.']);
            error_log('Login error: ' . $e->getMessage());
        }
    }

}