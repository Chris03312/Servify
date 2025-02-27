<?php

require_once __DIR__ . '/../configuration/Database.php'; // Include the Database class
require_once __DIR__ . '/../models/sidebarinfo.php';
require_once __DIR__ . '/../models/Notification.php';
require_once __DIR__ . '/../models/dashboard.php';

class VolunteerApplicationDetailsController
{

    public static function ShowVolunteerApplicationDetails()
    {
        if (!isset($_SESSION['email']) || !$_SESSION['email']) {
            redirect('/login');
        }

        $sidebarinfo = Sidebarinfo::getsidebarinfo($_SESSION['email'], $_SESSION['role']);
        $notifications = Notification::getNotification();
        $applicationInfo = Application::getinfoApplication();
        $validId = Dashboard::getvalidId();

        view('volunteer_application_details', [
            'email' => $_SESSION['email'],
            'applicationInfo' => $applicationInfo,
            'sidebarinfo' => $sidebarinfo,
            'validId' => $validId,
            'notifications' => $notifications['notifications'],  // List of notifications
            'unread_count' => $notifications['unread_count'],
        ]);
    }




}

?>