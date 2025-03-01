<?php

require_once __DIR__ . '/../configuration/Database.php';

class Dashboard
{

    public static function getinfodashboard()
    {
        try {
            $email = $_SESSION['email'];

            $db = Database::getConnection();

            // Check if the email exists in the VOLUNTEER table
            $stmt = $db->prepare('SELECT COUNT(*) FROM VOLUNTEERS_TBL WHERE EMAIL = :email');
            $stmt->execute(['email' => $email]);
            $existsInVolunteer = $stmt->fetchColumn() > 0;

            if ($existsInVolunteer) {
                // Fetch data from VOLUNTEER table
                $stmt = $db->prepare('SELECT * FROM VOLUNTEERS_TBL WHERE EMAIL = :email');
            } else {
                // Fetch data from REGISTRATION table
                $stmt = $db->prepare('SELECT * FROM VPROFILE_TABLE WHERE EMAIL = :email');
            }

            $stmt->execute(['email' => $email]);
            $userData = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch single row since email is unique

            // If data is from REGISTRATION table, set 'volunteer_assignment' and 'assigned_mission' to "not assigned yet"
            if (!$existsInVolunteer) {
                $userData['ASSIGNED_ASSIGNMENT'] = 'not assigned yet';
                $userData['ASSIGNED_POLLING_PLACE'] = 'not assigned yet';
            }

            return $userData;
        } catch (PDOException $e) {
            error_log('Dashboard error: ' . $e->getMessage());
            return null;
        }
    }

    public static function CountDownElectionDay()
    {
        // Set the target election date (example: Jan 20, 2025, 00:00:00)
        $targetDate = '2025-05-09 00:00:00';
        $targetTimestamp = strtotime($targetDate);

        // Get the current time
        $currentTimestamp = time();

        // Calculate the difference between the target time and the current time
        $timeDifference = $targetTimestamp - $currentTimestamp;

        // Check if the target date is in the future
        if ($timeDifference > 0) {
            // Calculate days, hours, minutes, and seconds
            $days = floor($timeDifference / (60 * 60 * 24));
            $hours = floor(($timeDifference % (60 * 60 * 24)) / (60 * 60));
            $minutes = floor(($timeDifference % (60 * 60)) / 60);
            $seconds = $timeDifference % 60;
        } else {
            // If the election day has passed, set values to 0
            $days = 0;
            $hours = 0;
            $minutes = 0;
            $seconds = 0;
        }

        // Return the countdown values to the view
        return [
            'days' => $days,
            'hours' => $hours,
            'minutes' => $minutes,
            'seconds' => $seconds
        ];
    }

    public static function MyTimeline()
    {
        try {

            $email = $_SESSION['email'];
            $db = Database::getConnection();

            // Fetch combined data from both ARCHIVE_VOLUNTEER and VOLUNTEERS_TBL using UNION
            $stmt = $db->prepare('
                SELECT ASSIGNED_ASSIGNMENT, ASSIGNED_POLLING_PLACE, DATE_APPROVED, "archive" AS source
                FROM ARCHIVE_VOLUNTEER
                WHERE EMAIL = :email
                UNION
                SELECT ASSIGNED_ASSIGNMENT, ASSIGNED_POLLING_PLACE, DATE_APPROVED, "volunteer" AS source
                FROM VOLUNTEERS_TBL
                WHERE EMAIL = :email
                ORDER BY DATE_APPROVED DESC
            ');
            $stmt->execute([':email' => $email]);

            $timelines = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Loop through the fetched data to extract the year from the DATE_APPROVED
            foreach ($timelines as &$timeline) {
                // Use DateTime for better flexibility and compatibility
                $approvedDate = new DateTime($timeline['DATE_APPROVED']);
                $timeline['YEAR'] = $approvedDate->format('Y'); // Extract the year
            }

            return $timelines; // Return the combined array with the year included
        } catch (PDOException $e) {
            error_log('Timeline database error: ' . $e->getMessage());
            return []; // Return an empty array in case of error
        } catch (Exception $e) {
            error_log('General error in MyTimeline: ' . $e->getMessage());
            return []; // Return an empty array in case of error
        }
    }

    public static function getvalidId()
    {
        try {
            $db = Database::getConnection();
            $stmt = $db->prepare('SELECT NAME FROM VALID_ID');
            $stmt->execute();
            $validId = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $validId;
        } catch (PDOException $e) {
            error_log('Error fetching valid IDs: ' . $e->getMessage());
            return []; // Return an empty array in case of error
        }
    }

    public static function mapOverview()
    {
        try {
            $email = $_SESSION['email'];

            $db = Database::getConnection();

            // Check if the email exists in the volunteers_tbl first
            $stmt = $db->prepare('SELECT email FROM VOLUNTEERS_TBL WHERE email = :email');
            $stmt->execute(['email' => $email]);
            $existsInVolunteer = $stmt->fetchColumn() > 0;

            if ($existsInVolunteer) {
                // If email exists in volunteers_tbl, fetch data from that table
                $stmt = $db->prepare('SELECT
                    p.latitude,
                    p.longitude,
                    v.email,
                    v.assigned_polling_place
                    FROM VOLUNTEERS_TBL AS v
                    INNER JOIN PRECINCT_TABLE AS p
                    ON v.assigned_polling_place = p.polling_place
                    WHERE v.email = :email');
                $stmt->execute(['email' => $email]);
                $location = $stmt->fetch(PDO::FETCH_ASSOC);

                // Return the location data from volunteers_tbl
                return $location;
            }

            // If the email is not found in either table, return default location
            return [
                'latitude' => '',  // Default latitude
                'longitude' => '', // Default longitude
                'assigned_mission' => '' // Default mission
            ];
        } catch (PDOException $e) {
            error_log('Map overview error: ' . $e->getMessage());
        }
    }

    public static function getVolunteerPerParish()
    {
        try {
            $db = Database::getConnection();

            $stmt = $db->prepare('
                SELECT
                    v.VOLUNTEERS_ID,
                    v.ROLE,
                    v.PRECINCT_NO,
                    CONCAT(v.FIRST_NAME, " ", COALESCE(v.MIDDLE_NAME, ""), " ", v.SURNAME) AS VOLUNTEERS_NAME,
                    CONCAT(c.FIRST_NAME, " ", COALESCE(c.MIDDLE_NAME, ""), " ", c.SURNAME) AS CPROFILE_NAME
                FROM VOLUNTEERS_TBL AS v
                INNER JOIN CPROFILE_TABLE AS c 
                ON v.PARISH = c.PARISH
            ');

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Return all results

        } catch (PDOException $e) {
            error_log("Get volunteer per parish error: " . $e->getMessage());
            return []; // Return an empty array if an error occurs
        }
    }

    public static function getCoorParishCount()
    {
        try {
            $db = Database::getConnection();
            $stmt = $db->prepare('
                SELECT 
                    COUNT(p.PARISHES_ID) AS PARISHES, 
                    (SELECT COUNT(c.CPROFILE_ID) FROM CPROFILE_TABLE c) AS COORDINATOR
                FROM PARISHES p
            ');
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error in getting coordinator and parish count" . $e->getMessage());
            return [];
        }
    }

}
