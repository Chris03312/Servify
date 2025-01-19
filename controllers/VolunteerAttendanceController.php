<?php 

require_once __DIR__ . '/../models/Attendance.php';
require_once __DIR__ . '/../models/Sidebarinfo.php';
require_once __DIR__ . '/../models/Notification.php';

class VolunteerAttendanceController {

    public static function VolunteerAttendances(){

        if (!isset($_SESSION['email']) || !$_SESSION['email']) {
            redirect('/login');
        }

        $sidebarinfo = Sidebarinfo::getsidebarinfo();
        $notifications = Notification::getNotification();
        $attendanceInfo = Attendance::getAttendanceInfo();
        $latestAttendance = Attendance::getAttendances();  // Fetch the latest attendance directly
        
        view('attendance', [
            'email' => $_SESSION['email'],
            'sidebarinfo' => $sidebarinfo,
            'notifications' => $notifications['notifications'],  // List of notifications
            'unread_count' => $notifications['unread_count'],
            'attendances' => $attendanceInfo,
            'formattedDate' => $latestAttendance['formattedDate'],
            'timeIn' => $latestAttendance['timeIn'],
            'timeOut' => $latestAttendance['timeOut'],
        ]);
    }
}