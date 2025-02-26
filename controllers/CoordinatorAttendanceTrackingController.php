<?php 

require_once __DIR__ . '/../models/attendance.php';

class CoordinatorAttendanceTrackingController {

    public static function ShowCoordinatorAttendanceTracking() {
        
        $coorattendances = Attendance::getattendancecoorInfo();
        $volunteersCounts = Attendance::getVolunteerAttendance(); // Corrected function name
    
        // error_log(print_r($coorattendances, true)); to show data in console

        view('coordinator_attendance_tracking', [
            'getattedancecoorInfo' => $coorattendances,
            'volunteersCounts' => $volunteersCounts
        ]);
    }

}