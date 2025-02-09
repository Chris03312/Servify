<?php 

require_once __DIR__ . '/../configuration/Database.php';

class Adminsidebarinfo {

    public static function getsidebarinfo() {
        try {
            $email = $_SESSION['email'];

            $db = Database::getConnection();

            $stmt = $db->prepare('SELECT * FROM ADMIN WHERE EMAIL = :email');
            $stmt->execute(['email' => $email]);
            $adminsidebarinfo = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch single row since email is unique
            
            return $adminsidebarinfo;
        }catch (PDOException $e) {
            error_log("Get sidebar info error ". $e->getMessage());
        }    
    }
}