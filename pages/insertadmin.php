<?php 

require_once __DIR__ . '/../configuration/Database.php';

$role = 'Admin';
$email = 'catalan.christian.03312002@gmail.com';
$password = 'password123';
$status = 'ACTIVE';

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$db = Database::getConnection();

$stmt = $db->prepare('
    INSERT INTO ADMIN (ROLE, EMAIL, PASSWORD, STATUS) VALUES (:role, :email, :password, :status)');
$stmt->execute(['role'=> $role, 'email' => $email, 'password' => $hashedPassword, 'status' => $status]);

echo 'Admin account created successfully!';