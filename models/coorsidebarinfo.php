<?php 

require_once __DIR__ . '/../configuration/Database.php';


class Coorsidebarinfo {
    
    public static function sidebarinfo() {
        try {
            $email = $_SESSION['email'];

        }catch (PDOException $e) {
            error_log('error at coordinator sidebar'. $e->getMessage());
        }
    }
}