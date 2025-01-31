<?php

require_once __DIR__ . '/../models/Dashboard.php';
require_once __DIR__ . '/../models/coordinatorDashboard.php';


class CoordinatorDashboardController{
    
    public static function ShowCoordinatorDashboard(){

        if (!isset($_SESSION['email']) || !$_SESSION['email']) {
            redirect('/login');
        }
        
        $chartsData = CoordinatorDashboard::chartsData();
        $dropdownData = CoordinatorDashboard::getDropdownG2();
        $totalCities = CoordinatorDashboard::getTotalCities();
        $volunteersTbl = CoordinatorDashboard::getVolunteers();
        $pendingApp = CoordinatorDashboard::PendingApp();
        $countdown = Dashboard::CountDownElectionDay();
        $activities = Dashboard::getActivityLog();
        $currentDate = date('F j, Y');

        view('coordinator_dashboard', [
            'email' => $_SESSION['email'],
            'username' => $_SESSION['username'],
            'currentDate' => $currentDate,
            'activities' => $activities,
            'volunteers' => $volunteersTbl,
            'pendingApps' => $pendingApp,
            'totalCities' => $totalCities,
            'dropdownData' => $dropdownData,
            'chartsData' => $chartsData,           
            'days' => $countdown['days'],
            'hours' => $countdown['hours'],
            'minutes' => $countdown['minutes'],
            'seconds' => $countdown['seconds']
        ]);
    }
}