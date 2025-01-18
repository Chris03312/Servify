<?php 

require_once __DIR__ . '/../configuration/Database.php';

class Dashboard {

        public static function getinfodashboard() {
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
                    $stmt = $db->prepare('SELECT * FROM REGISTRATION WHERE EMAIL = :email');
                }
                
                $stmt->execute(['email' => $email]);
                $userData = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch single row since email is unique
                
                // If data is from REGISTRATION table, set 'volunteer_assignment' and 'assigned_mission' to "not assigned yet"
                if (!$existsInVolunteer) {
                    $userData['ASSIGNED_ASSIGNMENT'] = 'not assigned yet';
                    $userData['ASSIGNED_MISSION'] = 'not assigned yet';
                }

                return $userData;
            } catch (PDOException $e) {
                error_log('Dashboard error: ' . $e->getMessage());
                return null;
            }
        }
    

    public static function getActivityLog() {
        try {
            // Retrieve username from the session
            $email = $_SESSION['email'];
            $username = $_SESSION['username'];
    
            // Establish database connection
            $db = Database::getConnection();
    
            // Query activities for the specific username
            $stmt = $db->prepare('SELECT DESCRIPTION, CREATED_AT FROM ACTIVITIES WHERE username = :username OR EMAIL = :email ORDER BY created_at DESC');
            $stmt->execute(['username' => $username, 'email' => $email]);
    
            $activities = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            // Format the created_at timestamp
            foreach ($activities as &$activity) {
                $date = new DateTime($activity['CREATED_AT']);
                // Format to 'Mon, 2025-01-17 08:48 AM'
                $activity['FORMATTED_DATE'] = $date->format('D, h:i A');
            }
    
            return $activities;
        } catch (PDOException $e) {
            error_log('Activity log error: ' . $e->getMessage());
            return [];
        }
    }
    
    public static function CountDownElectionDay() {
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

    public static function MyTimeline() {
        try {
            $email = $_SESSION['email'];
    
            $db = Database::getConnection();
    
            // Fetch data from both ARCHIVE_VOLUNTEER and VOLUNTEER_TBL
            $stmtArchive = $db->prepare('SELECT ASSIGNED_ASSIGNMENT, ASSIGNED_MISSION, DATE_APPROVED FROM ARCHIVE_VOLUNTEER WHERE EMAIL = :email');
            $stmtArchive->execute([':email' => $email]);
    
            $stmtVolunteer = $db->prepare('SELECT ASSIGNED_ASSIGNMENT, ASSIGNED_MISSION, DATE_APPROVED FROM VOLUNTEERS_TBL WHERE EMAIL = :email');
            $stmtVolunteer->execute([':email' => $email]);
    
            // Fetch all results from both tables
            $timelines = array_merge($stmtArchive->fetchAll(PDO::FETCH_ASSOC), $stmtVolunteer->fetchAll(PDO::FETCH_ASSOC));
    
            // Loop through the fetched data to extract the year from both sets
            foreach ($timelines as &$timeline) {
                $approvedDate = $timeline['DATE_APPROVED'];
                $year = date('Y', strtotime($approvedDate)); // Get the year from the date
                $timeline['YEAR'] = $year; // Add the extracted year to the timeline data
            }
    
            return $timelines; // Return the combined array with the year included
        } catch (PDOException $e) {
            error_log(message: 'Timeline Error: ' . $e->getMessage());
            return []; // Return an empty array in case of error
        }
    }
    
}
