<?php 

require_once __DIR__ . '/../configuration/Database.php';

class Sidebarinfo {

    public static function getsidebarinfo() {
        try {
            $email = $_SESSION['email'];

            $db = Database::getConnection();

            $stmt = $db->prepare('SELECT COUNT(*) FROM VOLUNTEERS_TBL WHERE EMAIL = :email');
            $stmt->execute(['email' => $email]);
            $existsInVolunteer = $stmt->fetchColumn() > 0;

            if ($existsInVolunteer) {
                // Fetch data from VOLUNTEER table
                $stmt = $db->prepare('SELECT * FROM VOLUNTEERS_TBL WHERE EMAIL = :email');
            } else {
                // Fetch data from REGISTRATION table
                $stmt = $db->prepare('SELECT * FROM REGISTRATION WHERE EMAIL = :email');
            }
            
            $stmt->execute(['email' => $email]);
            $sidebarinfo = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch single row since email is unique
            
            return $sidebarinfo;
        }catch (PDOException $e) {
            error_log("Get sidebar info error ". $e->getMessage());
        }
        
    }
}