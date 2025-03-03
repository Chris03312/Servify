<?php

require_once __DIR__ . '/../../models/Sidebarinfo.php';
require_once __DIR__ . '/../../models/Adminreports.php';

class AdminReportsController
{

    public static function ShowAdminReports()
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
        $volunteersList = Adminreports::AdminGetVolunteerList();
        $numberofVolunteers = Adminreports::numberofVolunteerPerYear();
        $numberofVolunteersGraphs = Adminreports::numberofVolunteerPerYearGraphs();
        $ageData = Adminreports::ageGroups(); // Get age group data

        view('Admin/admin_reports', [
            'adminsidebarinfo' => $sidebarData,
            'numberofVolunteers' => $numberofVolunteers,
            'numberofVolunteersGraphs' => $numberofVolunteersGraphs,
            'volunteersList' => $volunteersList['volunteersList'],
            'ageData' => $ageData,
            'role' => $role
        ]);
    }
}