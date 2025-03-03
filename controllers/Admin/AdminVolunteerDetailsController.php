<?php

require_once __DIR__ . '/../../models/Sidebarinfo.php';
require_once __DIR__ . '/../../models/Application.php';

class AdminVolunteerDetails
{

    public static function ShowVolunteerDetails()
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

        $volunteer_id = $_POST['volunteer_id'];

        $sidebarData = SidebarInfo::getSidebarInfo($email, $role);
        $volunteerDetails = Application::AdminViewDetails($volunteer_id);
        $applicationInfo = Application::getinfoApplication($email);

        view('admin/admin_volunteer_details', [
            'email' => $email,
            'role' => $role,
            'applicationInfo' => $applicationInfo,
            'volunteersDetails' => $volunteerDetails,
            'adminsidebarinfo' => $sidebarData
        ]);
    }
}