<?php

require_once __DIR__ . '/../../models/Sidebarinfo.php';
require_once __DIR__ . '/../../models/Dashboard.php';
require_once __DIR__ . '/../../models/ActivityLog.php';


class AdminDashboardController
{

    public static function ShowAdminDashboard()
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

        $adminActivities = getActivityLog($email, $username);
        $sidebarData = SidebarInfo::getSidebarInfo($email, $role);

        $parishcoorCount = Dashboard::getCoorParishCount();
        $chartsData = CoordinatorDashboard::chartsData();
        $totalCities = CoordinatorDashboard::getTotalCities();
        $volunteerPerParish = Dashboard::getVolunteerPerParish();
        $countdown = Dashboard::CountDownElectionDay();

        view('Admin/admin_dashboard', [
            'email' => $email,
            'username' => $username,
            'role' => $role,
            'days' => $countdown['days'],
            'hours' => $countdown['hours'],
            'minutes' => $countdown['minutes'],
            'seconds' => $countdown['seconds'],
            'chartsData' => $chartsData,
            'totalCities' => $totalCities,
            'activities' => $adminActivities,
            'adminsidebarinfo' => $sidebarData,
            'volunteerPerParish' => $volunteerPerParish,
            'parishcoorCount' => $parishcoorCount
        ]);
    }
}
