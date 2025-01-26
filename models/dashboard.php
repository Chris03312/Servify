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
    
    
    public static function getActivityLog() {
        try {
            // Validate that email and username are in the session
            if (!isset($_SESSION['email']) || !isset($_SESSION['username'])) {
                throw new Exception("Session data missing: email or username.");
            }
    
            // Retrieve username and email from the session
            $email = $_SESSION['email'];
            $username = $_SESSION['username'];
    
            // Establish database connection
            $db = Database::getConnection();
    
            // Query activities for the specific username or email
            $stmt = $db->prepare('
                SELECT DESCRIPTION, CREATED_AT
                FROM ACTIVITIES
                WHERE username = :username OR EMAIL = :email
                ORDER BY created_at DESC
            ');
            $stmt->execute(['username' => $username, 'email' => $email]);
    
            $activities = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            // If no activities found, return an empty array
            if (empty($activities)) {
                return [];
            }
    
            // Get the current date
            $currentDate = (new DateTime())->format('Y-m-d');
    
            // Format the created_at timestamp
            foreach ($activities as &$activity) {
                $date = new DateTime($activity['CREATED_AT']);
                $activityDate = $date->format('Y-m-d');
    
                if ($activityDate === $currentDate) {
                    // If the activity is from today, show 'Today'
                    $activity['FORMATTED_DATE'] = 'Today, ' . $date->format('h:i A');
                } else {
                    // Otherwise, show the full date with the day
                    $activity['FORMATTED_DATE'] = $date->format('D, h:i A');
                }
            }
    
            return $activities;
        } catch (PDOException $e) {
            error_log('Database error in getActivityLog: ' . $e->getMessage());
            return [];
        } catch (Exception $e) {
            error_log('General error in getActivityLog: ' . $e->getMessage());
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
    


    public static function getvalidId(){
        try {
            
            $db = Database::getConnection();

            $stmt = $db->prepare('SELECT NAME FROM VALID_ID ');
            $stmt->execute();
            $validId = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $validId;
        }catch (PDOException $e) {
        }
    }

    public static function mapOverview() {
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
    
    public static function coordinatorInfo() {
        try {
            $db = Database::getConnection();
            $email = $_SESSION['email'];

            $stmt = $db->prepare('SELECT PARISH FROM PROFILE');
        }catch (PDOException $e) {
            error_log('Error geting coordinator info'. $e->getMessage());
        }
    }
}
