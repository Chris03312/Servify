<?php

require_once __DIR__ . '/../../models/Renewalapplication.php';
require_once __DIR__ . '/../../models/Sidebarinfo.php';

class VolunteerRenewalApplicationController
{

    public static function RenewalApplication()
    {

        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);

        view('Volunteer/renewal_application', [
            'sidebarinfo' => $sidebarData
        ]);
    }
}