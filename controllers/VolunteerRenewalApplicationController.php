<?php

require_once __DIR__ . '/../models/renewalapplication.php';
require_once __DIR__ . '/../models/sidebarinfo.php';

class VolunteerRenewalApplicationController
{

    public static function RenewalApplication()
    {

        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);

        view('/renewal_application', [
            'sidebarinfo' => $sidebarData
        ]);
    }
}