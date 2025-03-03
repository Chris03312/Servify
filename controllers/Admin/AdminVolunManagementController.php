<?php
require_once __DIR__ . '/../../models/Sidebarinfo.php';
require_once __DIR__ . '/../../models/Admin_volunteer_management.php';

class AdminVolunManagementController
{
    public static function ShowAdminVolunManagement()
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
        $volunteers = VolunteerModel::getAllVolunteers(); // Now using a function instead of a class
        $requestApproval = VolunteerModel::getRequestingApproval();

        view('Admin/admin_volunteer_management', [
            'email' => $email,
            'role' => $role,
            'adminsidebarinfo' => $sidebarData,
            'volunteers' => $volunteers, // Now correctly passed to the view
            'pendingApprovals' => $requestApproval
        ]);
    }
}

?>