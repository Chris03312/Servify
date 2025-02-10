<?php

require_once __DIR__ . '/../models/attendance.php';
require_once __DIR__ . '/../models/sidebarinfo.php';
require_once __DIR__ . '/../models/notification.php';

class VolunteerAttendanceController
{

    public static function VolunteerAttendances()
    {

        if (!isset($_SESSION['email']) || !$_SESSION['email']) {
            redirect('/login');
        }

        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);
        $notifications = Notification::getNotification();
        $attendanceInfo = Attendance::getAttendanceInfo();
        $attendanceData = Attendance::getAttendances();  // Fetch the latest attendance directly

        view('attendance', [
            'email' => $_SESSION['email'],
            'sidebarinfo' => $sidebarData,
            'notifications' => $notifications['notifications'] ?? [],
            'unread_count' => $notifications['unread_count'] ?? 0,
            'attendances' => $attendanceInfo,
            'attendance' => $attendanceData,
            'timeIn' => $latestAttendance['timeIn'] ?? "",
            'timeOut' => $latestAttendance['timeOut'] ?? ""  // Pass all attendance records to the view
        ]);
    }
}
