<?php

require_once __DIR__ . '/../configuration/Database.php';

class Landingpage
{

    public static function Volunteers()
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

    public static function Coordinators()
    {
        try {
            $db = Database::getConnection();
            $stmt = $db->prepare("SELECT * FROM CPROFILE_TABLE"); 
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            error_log('Error in Getting Coordinators at LandingPage: ' . $e->getMessage());
            return [];
        }
    }

    

    // public static function Coordinators()
    // {
    //     try {
    //         $db = Database::getConnection();
    //         $stmt = $db->prepare("SELECT * FROM CPROFILE_TABLE"); 
    //         $stmt->execute();
    //         return $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     } catch (PDOException $e) {
    //         error_log('Error in Getting Coordinators at LandingPage: ' . $e->getMessage());
    //         return [];
    //     }
    // }


    public static function Announcements($title = null)
    {
        try {
            $db = Database::getConnection();

            if ($title) {
                $stmt = $db->prepare("SELECT * FROM event_announcement WHERE announcement_title = :title LIMIT 1");
                $stmt->bindParam(':title', $title);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result ?: null; 
            } else {
                $stmt = $db->prepare("SELECT * FROM event_announcement ORDER BY announcement_date DESC");
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            error_log('Error fetching announcements: ' . $e->getMessage());
            return null;
        }
    }

    public static function Resources()
    {
        try {

            $db = Database::getConnection();
            $stmt = $db->prepare("SELECT * FROM resources");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log('Error in Getting Resources at LandingPage' . $e->getMessage());
        }
    }
}