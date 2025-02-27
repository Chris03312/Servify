<?php

require_once __DIR__ . '/../models/attendance.php';
require_once __DIR__ . '/../models/sidebarinfo.php';


class CoordinatorAttendanceTrackingController
{

    public static function ShowCoordinatorAttendanceTracking()
    {

        $coorattendances = Attendance::getattendancecoorInfo();
        $volunteersCounts = Attendance::getVolunteerAttendance(); // Corrected function name
        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);

        // error_log(print_r($coorattendances, true)); to show data in console

        view('coordinator_attendance_tracking', [
            'coordinator_info' => $sidebarData,
            'getattedancecoorInfo' => $coorattendances,
            'volunteersCounts' => $volunteersCounts,
            'sidebarinfo' => $sidebarData
        ]);
    }

}