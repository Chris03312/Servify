<?php 

require_once __DIR__ . '/../configuration/Database.php';


class Attendance {

    public static function getAttendanceInfo() {
        try{
            $email = $_SESSION['email'];

            $db = Database::getConnection();

            $stmt = $db->prepare('SELECT * FROM VOLUNTEERS_TBL WHERE EMAIL = :email');
            $stmt->execute(['email' => $email]);
            $attendancesInfo = $stmt->fetch(PDO::FETCH_ASSOC);

            return $attendancesInfo;
        }catch (PDOException $e){
            error_log("Error in geting attendance info" .$e->getMessage());
        }
    }
    public static function getAttendances() {
        try {
            $email = $_SESSION["email"];
    
            $db = Database::getConnection();
    
            // Modify the query to fetch the latest attendance record
            $stmt = $db->prepare("SELECT * FROM ATTENDANCES WHERE EMAIL = :email ORDER BY DATE DESC LIMIT 1");
            $stmt->execute(["email" => $email]);
            $attendances = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            if ($attendances) {
                // Access the first (and only) record as it's sorted by DESC and limited to 1
                $latestAttendance = $attendances[0]; 
    
                $timeIn = $latestAttendance['TIME_IN'];
                $timeOut = $latestAttendance['TIME_OUT'];
                $date = $latestAttendance['DATE'];
    
                // Format the date
                $formattedDate = date("D, M d, Y", strtotime($date));
    
                return [
                    'formattedDate' => $formattedDate,
                    'timeIn' => $timeIn,
                    'timeOut' => $timeOut,
                ];
            }
    
            return []; // Return an empty array if no attendances found
    
        } catch (PDOException $e) {
            error_log("Error in getting attendance time in and out: " . $e->getMessage());
        }
    }
    
}