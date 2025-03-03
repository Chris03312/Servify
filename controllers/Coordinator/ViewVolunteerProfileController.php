<?php

require_once __DIR__ . '/../../models/Dashboard.php';
require_once __DIR__ . '/../../models/CoordinatorDashboard.php';
require_once __DIR__ . '/../../models/Sidebarinfo.php';
require_once __DIR__ . '/../../models/ActivityLog.php';

class ViewVolunteerProfileController
{

    public static function ShowVolunteerProfile()
    {
        if (!isset($_SESSION['email']) || !$_SESSION['email']) {
            redirect('/login');
        }

        if (!isset($_GET['id'])) {
            die("Volunteer ID is missing!"); // Prevent errors if no ID is provided
        }

        $volunteerId = $_GET['id']; // Get the volunteer ID from URL

        $coordinatorActivities = getActivityLog($_SESSION['email'], $_SESSION['username']);
        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);
        $volunteer = CoordinatorDashboard::getVolunteerById($volunteerId); // New function

        if (!$volunteer) {
            die("Volunteer not found!"); // Error handling if no data is found
        }

        view('Coordinator/view_volunteer_profile', [
            'email' => $_SESSION['email'],
            'username' => $_SESSION['username'],
            'coordinator_info' => $sidebarData,
            'activities' => $coordinatorActivities,
            'volunteer' => $volunteer, // Pass a single volunteer, not an array
            'sidebarinfo' => $sidebarData,
        ]);
    }
}
