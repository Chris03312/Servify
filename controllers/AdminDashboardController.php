<?php

// require_once __DIR__ . '/../models/Dashboard.php';
// require_once __DIR__ . '/../models/coordinatorDashboard.php';


class AdminDashboardController{
    
    public static function ShowAdminDashboard(){

        // if (!isset($_SESSION['email']) || !$_SESSION['email']) {
        //     redirect('/login');
        // }

        // $cityFilter = isset($_GET['city']) ? $_GET['city'] : '';

        // $chartData = CoordinatorDashboard::chartsData();
        // $dropdownData = CoordinatorDashboard::getDropdownG2();
        // $totalCities = CoordinatorDashboard::getTotalCities();
        // $volunteersTbl = CoordinatorDashboard::getVolunteers($cityFilter);
        // $pendingApp = CoordinatorDashboard::PendingApp();
        // $countdown = Dashboard::CountDownElectionDay();
        // $activities = Dashboard::getActivityLog();
        // $currentDate = date('F j, Y');

        // view('coordinator_dashboard', [
        //     'email' => $_SESSION['email'],
        //     'username' => $_SESSION['username'],
        //     'currentDate' => $currentDate,
        //     'activities' => $activities,
        //     'volunteers' => $volunteersTbl,
        //     'pendingApps' => $pendingApp,
        //     'totalCities' => $totalCities,
        //     'dropdownData' => $dropdownData,
        //     'chartData' => $chartData,            // Pass the dropdown data to the view
        //     'days' => $countdown['days'],
        //     'hours' => $countdown['hours'],
        //     'minutes' => $countdown['minutes'],
        //     'seconds' => $countdown['seconds']
        // ]);

        view('admin_dashboard');
    }
}

?>