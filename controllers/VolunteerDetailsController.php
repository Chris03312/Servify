<?php 

require_once __DIR__ . '/../models/sidebarinfo.php';

class VolunteerDetailsController {

    public static function ShowVolunteerDetails() {
        
        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);

        view('volunteer_details', [
            'sidebarinfo' => $sidebarData
        ]);
    }
}