<?php

require_once __DIR__ . '/../../models/Attendance.php';
require_once __DIR__ . '/../../models/Sidebarinfo.php';
require_once __DIR__ . '/../../models/Notification.php';

class VolunteerAttendanceController
{

    public static function VolunteerAttendances()
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
        $role = $userSession['role'];

        $sidebarData = SidebarInfo::getSidebarInfo($email, $role);
        $notifications = Notification::getNotification($email);
        $attendanceInfo = Attendance::getAttendanceInfo($email); // info
        $attendanceData = Attendance::getAttendances($email); // time in time out

        view('Volunteer/attendance', [
            'email' => $email,
            'sidebarinfo' => $sidebarData,
            'notifications' => $notifications['notifications'] ?? [],
            'unread_count' => $notifications['unread_count'] ?? 0,
            'attendancesinfo' => $attendanceInfo,
            'getAttendances' => !empty($attendanceData) ? $attendanceData[0] : null // Get first record only
        ]);
    }
}
