<?php

require_once __DIR__ . '/../configuration/Database.php';

class Application
{

    public static function getinfoApplication($email)
    {
        try {

            $db = Database::getConnection();

            $stmt = $db->prepare('SELECT * FROM VPROFILE_TABLE WHERE EMAIL = :email');
            $stmt->execute([':email' => $email]);
            $applicationInfo = $stmt->fetch(PDO::FETCH_ASSOC);

            return $applicationInfo;
        } catch (PDOException $e) {
            error_log("Get info error " . $e->getMessage());
        }
    }

    public static function reviewApplicationDetails($application_id)
    {
        try {
            $db = Database::getConnection();

            $stmt = $db->prepare("
            SELECT ai.*, aai.*
            FROM APPLICATION_INFO ai
            INNER JOIN APPLICATION_ADD_INFO aai
             ON ai.APPLICATION_ID = aai.APPLICATION_ADD_ID
             WHERE APPLICATION_ID = :application_id
        ");
            $stmt->execute(['application_id' => $application_id]);
            $applicationDetails = $stmt->fetch(PDO::FETCH_ASSOC);

            return $applicationDetails;
        } catch (PDOException $e) {
            error_log('Error in getting the application details' . $e->getMessage());
        }
    }

    public static function AdminViewDetails($volunteer_id)
    {
        try {
            $db = Database::getConnection();

            $stmt = $db->prepare("SELECT * FROM VOLUNTEERS_TBL WHERE VOLUNTEERS_ID = :volunteer_id");
            $stmt->execute(['volunteer_id' => $volunteer_id]);
            $volunteersDetails = $stmt->fetch(PDO::FETCH_ASSOC);

            return $volunteersDetails;
        } catch (PDOException $e) {
            error_log('Error in getting the application details' . $e->getMessage());
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