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
        if (!isset($_SESSION['email']) || !$_SESSION['email']) {
            redirect('/login');
        }

        // Get necessary data
        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);
        $notifications = Notification::getNotification();
        $userInfo = Dashboard::getinfodashboard();
        $statusInfo = Registrationstatus::registrationstatus();

        // Pass data to the view in a single variable
        view('Volunteer/volunteer_registration_status', [
            'email' => $_SESSION['email'],
            'sidebarinfo' => $sidebarData,
            'userInfo' => $userInfo,
            'statusInfo' => $statusInfo, // Make sure this variable is correctly passed
            'notifications' => $notifications['notifications'],
            'unread_count' => $notifications['unread_count'],
        ]);

    }
}
