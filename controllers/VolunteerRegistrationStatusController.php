<?php 

class VolunteerRegistrationStatusController{
    public function VolunteerRegistrationStatus(){
        if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
            redirect('/login');
        }

        view('volunteer_registration_status');
    }
}