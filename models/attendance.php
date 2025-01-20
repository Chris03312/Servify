<?php 

require_once __DIR__ . '/../configuration/Database.php';


class Attendance {

    public static function getAttendanceInfo() {
        try {
            $email = $_SESSION['email'];
            
            $db = Database::getConnection();
    
            $stmt = $db->prepare('SELECT * FROM VOLUNTEERS_TBL WHERE EMAIL = :email');
            $stmt->execute(['email' => $email]);
            $attendancesInfo = $stmt->fetch(PDO::FETCH_ASSOC);
    
            // Return data or fallback values if no data is found
            return $attendancesInfo ?: [
                'FIRST_NAME' => 'FIRSTNAME',
                'MIDDLE_NAME' => 'MIDDLENAME',
                'SURNAME' => 'SURNAME',
                'VOLUNTEERS_ID' => 'N/A',
                'ROLE' => 'Unspecified Role',
                'ASSIGNED_MISSION' => 'No Mission Assigned'
            ];
        } catch (PDOException $e) {
            error_log("Error in getting attendance info: " . $e->getMessage());
            // Return fallback values in case of an error
            return [
                'FIRST_NAME' => 'FIRSTNAME',
                'MIDDLE_NAME' => 'MIDDLENAME',
                'SURNAME' => 'SURNAME',
                'VOLUNTEERS_ID' => 'N/A',
                'ROLE' => 'Unspecified Role',
                'ASSIGNED_MISSION' => 'No Mission Assigned'
            ];
        }
    }
    
    
public static function getAttendances() {
    try {
        $email = $_SESSION["email"];
        $currentDate = date('M d, Y');

        $db = Database::getConnection();

        // Fetch the latest attendance record for the email, ordered by DATE DESC, limit 1
        $stmt = $db->prepare("SELECT * FROM ATTENDANCES WHERE EMAIL = :email ORDER BY DATE DESC");
        $stmt->execute(["email" => $email]);
        $attendances = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($attendances) {
            // Get the latest attendance record (first record)
            $latestAttendance = $attendances[0];

            // Format the latest attendance date
            $formattedDate = date("D, M d, Y", strtotime($latestAttendance['DATE']));
            $timeIn = $latestAttendance['TIME_IN'];
            $timeOut = $latestAttendance['TIME_OUT'] ?? null; // Ensure null if TIME_OUT is missing

            // Return the latest attendance record
            return [
                'formattedDate' => $formattedDate,
                'timeIn' => $timeIn,
                'timeOut' => $timeOut,
                'allAttendances' => $attendances,  // You can return the all records as well
            ];
        }

        // Return default values if no attendance records found
        return [
            'formattedDate' => null,
            'timeIn' => null,
            'timeOut' => null,
            'allAttendances' => [],
        ];
    } catch (PDOException $e) {
        error_log("Error in getting attendance time in and out: " . $e->getMessage());
        return [
            'formattedDate' => null,
            'timeIn' => null,
            'timeOut' => null,
            'allAttendances' => [],
        ];
    }
}

    
    
    
}