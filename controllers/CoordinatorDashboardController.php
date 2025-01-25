<?php

require_once __DIR__ . '/../models/Dashboard.php';


class CoordinatorDashboardController{
    
    public static function CoordinatorDashboard(){

        $countdown = Dashboard::CountDownElectionDay();
        $activities = Dashboard::getActivityLog();

        view('coordinator_dashboard', [
            'activities' => $activities,
            'days' => $countdown['days'],
            'hours' => $countdown['hours'],
            'minutes' => $countdown['minutes'],
            'seconds' => $countdown['seconds']
        ]);
    }
}