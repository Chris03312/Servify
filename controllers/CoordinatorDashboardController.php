<?php

require_once __DIR__ . '/../models/Dashboard.php';
require_once __DIR__ . '/../models/coordinatorDashboard.php';
require_once __DIR__ . '/../models/sidebarinfo.php';
require_once __DIR__ . '/../models/activityLog.php';

class CoordinatorDashboardController
{

    public static function ShowCoordinatorDashboard()
    {

        if (!isset($_SESSION['email']) || !$_SESSION['email']) {
            redirect('/login');
        }

        $coordinatorActivities = getActivityLog($_SESSION['email'], $_SESSION['username']);
        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);

        $chartsData = CoordinatorDashboard::chartsData();
        $dropdownData = CoordinatorDashboard::getDropdownG2();
        $totalCities = CoordinatorDashboard::getTotalCities();
        $volunteersTbl = CoordinatorDashboard::getVolunteers();
        $pendingApp = CoordinatorDashboard::PendingApp();
        $heatmapData = CoordinatorDashboard::heatMapAttendance();
        $countdown = Dashboard::CountDownElectionDay();
        $currentDate = date('F j, Y');

        view('coordinator_dashboard', [
            'email' => $_SESSION['email'],
            'username' => $_SESSION['username'],
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