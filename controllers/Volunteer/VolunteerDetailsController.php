<?php

require_once __DIR__ . '/../../models/Sidebarinfo.php';

class VolunteerDetailsController
{

    public static function ShowVolunteerDetails()
    {

        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);

        view('Volunteer/volunteer_details', [
            'sidebarinfo' => $sidebarData
        ]);
    }
}