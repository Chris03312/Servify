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
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log('Error in Getting Coordinator at LandingPage' . $e->getMessage());
        }
    }

    // public static function getAnnouncementByTitle($title)
    // {
    //     try {
    //         $db = Database::getConnection();
    //         $stmt = $db->prepare("SELECT * FROM announcements WHERE announcement_title = :title LIMIT 1");
    //         $stmt->bindParam(':title', $title, PDO::PARAM_STR);
    //         $stmt->execute();
    //         return $stmt->fetch(PDO::FETCH_ASSOC);
    //     } catch (PDOException $e) {
    //         error_log('Error fetching announcement: ' . $e->getMessage());
    //         return null;
    //     }
    // }
    // public static function Events()
    // {
    //     try {

    //         $db = Database::getConnection();
    //         $stmt = $db->prepare("SELECT * FROM announcements");
    //         $stmt ->execute();
    //         return $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     } catch (PDOException $e) {
    //         error_log('Error in Getting Announcements at LandingPage' . $e->getMessage());
    //     }
    // }

    public static function Announcements($title = null)
    {
        try {
            $db = Database::getConnection();

            if ($title) {
                // Fetch a single announcement
                $stmt = $db->prepare("SELECT * FROM announcements");
                $stmt->bindParam(':title', $title);
            } else {
                // Fetch all announcements
                $stmt = $db->prepare("SELECT * FROM announcements ORDER BY announcement_date DESC");
            }

            $stmt->execute();
            return $title ? $stmt->fetch(PDO::FETCH_ASSOC) : $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log('Error fetching announcements: ' . $e->getMessage());
            return null;
        }
    }



    // public static function Announcements()
    // {
    //     try {

    //         $db = Database::getConnection();
    //         $stmt = $db->prepare("SELECT * FROM announcements");
    //         $stmt ->execute();
    //         return $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     } catch (PDOException $e) {
    //         error_log('Error in Getting Announcements at LandingPage' . $e->getMessage());
    //     }
    // }
    

    // public static function GetAnnouncementByTitle($title)
    // {
    //     try {
    //         $db = Database::getConnection();
    //         $stmt = $db->prepare("SELECT * FROM announcements WHERE announcement_title = :title");
    //         $stmt->bindParam(':title', $title);
    //         $stmt->execute();
    //         return $stmt->fetch(PDO::FETCH_ASSOC);
    //     } catch (PDOException $e) {
    //         error_log('Error fetching announcement: ' . $e->getMessage());
    //         return null;
    //     }
    // }

}