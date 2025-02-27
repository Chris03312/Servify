<?php

require_once __DIR__ . '/../models/attendance.php';
require_once __DIR__ . '/../models/sidebarinfo.php';
require_once __DIR__ . '/../models/Notification.php';

class VolunteerAttendanceController
{

    public static function VolunteerAttendances()
    {

        if (!isset($_SESSION['email']) || !$_SESSION['email']) {
            redirect('/login');
        }

        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);
        $notifications = Notification::getNotification();
        $attendanceInfo = Attendance::getAttendanceInfo(); // info
        $attendanceData = Attendance::getAttendances(); // time in time out

        view('attendance', [
            'email' => $_SESSION['email'],
            'sidebarinfo' => $sidebarData,
            'notifications' => $notifications['notifications'] ?? [],
            'unread_count' => $notifications['unread_count'] ?? 0,
            'attendancesinfo' => $attendanceInfo,
            'getAttendances' => !empty($attendanceData) ? $attendanceData[0] : null // Get first record only
        ]);
    }
}
