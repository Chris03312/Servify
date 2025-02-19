<?php

require_once __DIR__ . '/../configuration/Database.php';


class Attendance
{

    public static function getAttendanceInfo()
    {
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
                'ASSIGNED_POLLING_PLACE' => 'No polling place assigned'
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
                'ASSIGNED_POLLING_PLACE' => 'No Polling place assigned'
            ];
        }
    }

    public static function getattendancecoorInfo()
    {
        try {
            $email = $_SESSION['email'];

            $db = Database::getConnection();

            $stmt = $db->prepare('SELECT * FROM CPROFILE_TABLE WHERE EMAIL = :email');
            $stmt->execute([':email' => $email]);
            $getattedancecoorInfo = $stmt->fetch(PDO::FETCH_ASSOC);

            return $getattedancecoorInfo ?: [
                'FIRST_NAME' => 'FIRSTNAME',
                'MIDDLE_NAME' => 'MIDDLENAME',
                'SURNAME' => 'SURNAME',
                'CPROFILE_ID' => 'N/A',
                'POLLING_PLACE' => 'No polling place assigned'
            ];
        } catch (PDOException $e) {
            error_log('Error in getting coordinator info' . $e->getMessage());
            return [
                'FIRST_NAME' => 'FIRSTNAME',
                'MIDDLE_NAME' => 'MIDDLENAME',
                'SURNAME' => 'SURNAME',
                'CPROFILE_ID' => 'N/A',
                'POLLING_PLACE' => 'No Polling place assigned'
            ];
        }
    }

    public static function getVolunteerAttendance()
    {
        try {
            $db = Database::getConnection();
            $stmt = $db->prepare('SELECT DATE(DATE) AS DATE, TIME_IN, TIME_OUT, VOLUNTEER_NAME, ROLE, EMAIL, POLLING_PLACE FROM ATTENDANCES');
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log('Error in getting volunteer attendance: ' . $e->getMessage());
            return []; // Return an empty array in case of error
        }
    }


    public static function getAttendances()
    {
        try {
            $email = $_SESSION['email'];

            $db = Database::getConnection();

            // Get today's date in the format YYYY-MM-DD
            $today = date('Y-m-d');

            // Select only records where the DATE is equal to today's date
            $stmt = $db->prepare('SELECT TIME_IN, TIME_OUT, DATE FROM attendances WHERE EMAIL = :email AND DATE(DATE) = :today');
            $stmt->execute([':email' => $email, ':today' => $today]);

            // Fetch all records (although there should only be one for today)
            $getAttendances = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $getAttendances;
        } catch (PDOException $e) {
            error_log('Database error in getAttendances: ' . $e->getMessage());
        }
    }

}