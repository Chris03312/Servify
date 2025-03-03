<?php

require_once __DIR__ . '/../../models/Dashboard.php';
require_once __DIR__ . '/../../models/CoordinatorDashboard.php';
require_once __DIR__ . '/../../models/Sidebarinfo.php';
require_once __DIR__ . '/../../models/ActivityLog.php';


class CoordinatorDashboardController
{

    public static function ShowCoordinatorDashboard()
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
        $username = $userSession['username'];
        $role = $userSession['role'];
        $parish = $userSession['parish'];

        $coordinatorActivities = getActivityLog($email, $username);
        $sidebarData = SidebarInfo::getSidebarInfo($email, $role);

        $chartsData = CoordinatorDashboard::chartsData();
        $dropdownData = CoordinatorDashboard::getDropdownG2();
        $totalCities = CoordinatorDashboard::getTotalCities();
        $volunteersTbl = CoordinatorDashboard::getVolunteers($parish);
        $pendingApp = CoordinatorDashboard::PendingApp();
        $heatmapData = CoordinatorDashboard::heatMapAttendance();
        $countdown = Dashboard::CountDownElectionDay();
        $currentDate = date('F j, Y');

        view('Coordinator/coordinator_dashboard', [
            'token' => $session_id,
            'email' => $email,
            'username' => $username,
            'coordinator_info' => $sidebarData,
            'currentDate' => $currentDate,
            'activities' => $coordinatorActivities,
            'volunteers' => $volunteersTbl,
            'pendingApps' => $pendingApp,
            'totalCities' => $totalCities,
            'dropdownData' => $dropdownData,
            'chartsData' => $chartsData,
            'heatmapData' => $heatmapData,
            'days' => $countdown['days'],
            'hours' => $countdown['hours'],
            'minutes' => $countdown['minutes'],
            'seconds' => $countdown['seconds'],
            'sidebarinfo' => $sidebarData,
        ]);
    }
}