<?php 

require_once __DIR__ . '/../configuration/Database.php';


class Coorsidebarinfo {
    
    public static function sidebarinfo() {
        try {
            $email = $_SESSION['email'];
            
            $db = Database::getConnection();

            $query = $db->prepare('SELECT 
                a.account_id,
                a.role,
                c.surname,
                c.first_name
            FROM accounts a
            JOIN cprofile_table c ON a.account_id = c.account_id;
            ');
            $query->execute();

            $result = $query->fetch(PDO::FETCH_ASSOC);

            return $result;

        }catch (PDOException $e) {
            error_log('error at coordinator sidebar'. $e->getMessage());
        }
    }
}