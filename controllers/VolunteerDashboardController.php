<?php 

class VolunteerDashboardController{

    public static function VolunteerDashboard() {
        // If already logged in, redirect to dashboard
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
            redirect('/login');
        }

        // Render the login form
        view('volunteer_dashboard', [[
            'username' => $_SESSION['username']
        ]] );
    }
}