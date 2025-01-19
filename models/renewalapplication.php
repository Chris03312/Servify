<?php 

require_once __DIR__ . '/../configuration/Database.php';

class RenewalApplicationController {

    public static function renewalapplication() {
        try {
            $email = $_SESSION['email'];
            
            $db = Database::getConnection();

            $stmt = $db->prepare('SELECT STATUS FROM REGISTRATION WHERE EMAIL = :email');
            $stmt->execute(['email' => $email]);
            $renewal = $stmt->fetch(PDO::FETCH_ASSOC);

            return $renewal;
        }catch (PDOException $e) {
            error_log('Renewal application error' .$e->getMessage());
        }
    }

    public static function RenewalApplicationSchedule(){
        try {
            $presentDate = date('Y-m-d H:i:s');
            $db = Database::getConnection();

            $stmt = $db->prepare('SELECT SCHEDULE FROM SCHEDULE');
            $stmt->execute();
            $schedule = $stmt->fetch(PDO::FETCH_ASSOC);

            return $schedule;
        }catch (PDOException $e) {
            error_log('Rnewal application error'. $e->getMessage());
        }   
    }
}