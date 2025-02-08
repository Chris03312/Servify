<?php

require_once __DIR__ . '/../models/adminsidebarinfo.php';
require_once __DIR__ . '/../models/dashboard.php';


class AdminDashboardController{
    
    public static function ShowAdminDashboard(){

        // if (!isset($_SESSION['email']) || !$_SESSION['email']) {
        //     redirect('/login');
        // }
        $adminsidebarinfo = Adminsidebarinfo::getsidebarinfo();
        $countdown = Dashboard::CountDownElectionDay();

        view('admin_dashboard', [
            'email' => $_SESSION['email'],
            'username' => $_SESSION['username'],
            'role' => $_SESSION['role'],
            'days' => $countdown['days'],
            'hours' => $countdown['hours'],
            'minutes' => $countdown['minutes'],
            'seconds' => $countdown['seconds'],
            'adminsidebarinfo' => $adminsidebarinfo
        ]);
    }
}
