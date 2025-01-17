<?php 

class VolunteerNewApplicationController {

    public function ShowVolunteerNewApplication() {
        if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
            redirect('/login');
        }
        
        view('Volunteer_new_application');
    }
}