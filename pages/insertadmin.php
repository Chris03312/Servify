<?php 

require_once __DIR__ . '/../configuration/Database.php';

// $role = 'Admin';
$email = 'catalan.christian.03312002@gmail.com';
// $password = 'password123';
// $status = 'ACTIVE';

// // Hash the password
// $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$db = Database::getConnection();

// // Insert user into database
// $stmt = $db->prepare('
//     INSERT INTO ADMIN (ROLE, EMAIL, PASSWORD, STATUS) VALUES (:role, :email, :password, :status)');
// $stmt->execute([
//     'role' => $role, 
//     'email' => $email, 
//     'password' => $hashedPassword, 
//     'status' => $status
// ]);

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['password'])) {
    $inputed = $_POST['password']; 
    
    // Retrieve hashed password from database
    $stmt1 = $db->prepare('SELECT PASSWORD FROM ADMIN WHERE EMAIL = :email');
    $stmt1->execute(['email' => $email]);  
    $result = $stmt1->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $storedHashedPassword = $result['PASSWORD']; // Get hashed password from DB
        
        if (password_verify($inputed, $storedHashedPassword)) {
            echo "Password match<br>";
            echo "Stored Hashed Password: " . $storedHashedPassword;
        } else {
            echo "Invalid password";
        }
    } else {
        echo "No user found with that email.";
    }
}
?>

<!-- HTML Form -->
<form method="POST">
    <input type="text" name="password" placeholder="Enter Password">
    <button type="submit">Verify</button>
</form>
