<?php

require_once __DIR__ . '/../../models/Sidebarinfo.php';
require_once __DIR__ . '/../../models/Dashboard.php';
require_once __DIR__ . '/../../models/ActivityLog.php';

class AdminDashboardController
{

    public static function ShowAdminDashboard()
    {

        // if (!isset($_SESSION['email']) || !$_SESSION['email']) {
        //     redirect('/login');
        // }

        $adminActivities = getActivityLog($_SESSION['email'], $_SESSION['username']);
        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);
        $parishcoorCount = Dashboard::getCoorParishCount();


        $chartsData = CoordinatorDashboard::chartsData();
        $totalCities = CoordinatorDashboard::getTotalCities();
        $volunteerPerParish = Dashboard::getVolunteerPerParish();
        $countdown = Dashboard::CountDownElectionDay();

        view('Admin/admin_dashboard', [
            'email' => $_SESSION['email'],
            'username' => $_SESSION['username'],
            'role' => $_SESSION['role'],
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
