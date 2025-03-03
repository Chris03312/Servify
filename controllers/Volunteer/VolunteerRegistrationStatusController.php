<?php

require_once __DIR__ . '/../../models/Registrationstatus.php';
require_once __DIR__ . '/../../models/Application.php';
require_once __DIR__ . '/../../models/Dashboard.php';
require_once __DIR__ . '/../../models/Sidebarinfo.php';
require_once __DIR__ . '/../../models/Notification.php';

class VolunteerRegistrationStatusController
{
    public static function VolunteerRegistrationStatus()
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
        $userInfo = Dashboard::getinfodashboard($email);
        $statusInfo = Registrationstatus::registrationstatus($email);

        // Pass data to the view in a single variable
        view('Volunteer/volunteer_registration_status', [
            'email' => $email,
            'sidebarinfo' => $sidebarData,
            'userInfo' => $userInfo,
            'statusInfo' => $statusInfo, // Make sure this variable is correctly passed
            'notifications' => $notifications['notifications'],
            'unread_count' => $notifications['unread_count'],
        ]);

    }
}
