<?php

require_once __DIR__ . '/../../configuration/Database.php'; // Include the Database class
require_once __DIR__ . '/../../models/Sidebarinfo.php';
require_once __DIR__ . '/../../models/Notification.php';
require_once __DIR__ . '/../../models/Dashboard.php';

class VolunteerApplicationDetailsController
{

    public static function ShowVolunteerApplicationDetails()
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
        $applicationInfo = Application::getinfoApplication();
        $validId = Dashboard::getvalidId();

        view('Volunteer/volunteer_application_details', [
            'email' => $email,
            'applicationInfo' => $applicationInfo,
            'sidebarinfo' => $sidebarData,
            'validId' => $validId,
            'notifications' => $notifications['notifications'],  // List of notifications
            'unread_count' => $notifications['unread_count'],
        ]);
    }




}

?>