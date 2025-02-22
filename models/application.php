<?php

require_once __DIR__ . '/../configuration/Database.php';

class Application
{

    public static function getinfoApplication()
    {
        try {

            $email = $_SESSION['email'];

            $db = Database::getConnection();

            $stmt = $db->prepare('SELECT * FROM VPROFILE_TABLE WHERE EMAIL = :email');
            $stmt->execute([':email' => $email]);
            $applicationInfo = $stmt->fetch(PDO::FETCH_ASSOC);

            return $applicationInfo;
        } catch (PDOException $e) {
            error_log("Get info error " . $e->getMessage());
        }
    }

    public static function preferredMission()
    {
        try {
            $db = Database::getConnection();

            $stmt = $db->prepare("SELECT * FROM MISSIONS");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log('Error in Getting Volunteers at LandingPage' . $e->getMessage());
        }

    }

}