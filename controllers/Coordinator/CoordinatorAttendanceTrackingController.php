<?php

require_once __DIR__ . '/../../models/Attendance.php';
require_once __DIR__ . '/../../models/Sidebarinfo.php';


class CoordinatorAttendanceTrackingController
{

    public static function ShowCoordinatorAttendanceTracking()
    {
        session_start();

        // Retrieve the session_id from GET or POST request
        $session_id = $_GET['token'] ?? '';

        // Check if the session exists for the given session_id
        if (!isset($_SESSION['sessions'][$session_id])) {
            redirect('/login');
        }

        // Fetch user session data
        $userSession = $_SESSION['sessions'][$session_id];
        $email = $userSession['email'];
        $parish = $userSession['parish'];
        $role = $userSession['role'];

        $sidebarData = SidebarInfo::getSidebarInfo($email, $role);
        $coorattendances = Attendance::getattendancecoorInfo($email);
        $volunteersPerParish = Attendance::getVolunteerAttendancebyParish($parish); // Corrected function name

        // error_log(print_r($coorattendances, true)); to show data in console

        view('Coordinator/coordinator_attendance_tracking', [
            'coordinator_info' => $sidebarData,
            'getattedancecoorInfo' => $coorattendances,
            'volunteersPerParish' => $volunteersPerParish,
        ]);
    }

}