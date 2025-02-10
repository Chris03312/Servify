<?php

require_once __DIR__ . '/../models/sidebarinfo.php';
require_once __DIR__ . '/../models/dashboard.php';
require_once __DIR__ . '/../models/activityLog.php';

class AdminDashboardController{
    
    public static function ShowAdminDashboard(){

        // if (!isset($_SESSION['email']) || !$_SESSION['email']) {
        //     redirect('/login');
        // }

        $adminActivities = getActivityLog($_SESSION['email'], $_SESSION['username']);
        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);


        $chartsData = CoordinatorDashboard::chartsData();
        $totalCities = CoordinatorDashboard::getTotalCities();
        $volunteerPerParish = Dashboard::getVolunteerPerParish();
        $countdown = Dashboard::CountDownElectionDay();

        view('admin_dashboard', [
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
            'volunteerPerParish' => $volunteerPerParish
        ]);
    }
}
