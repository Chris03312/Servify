<?php

require_once __DIR__ . '/../models/volunteerManagement.php';
require_once __DIR__ . '/../models/sidebarinfo.php';


class CoordinatorVolunteerManagementController
{

    public static function ShowVolunteerManagement()
    {

        $Citylinks = VolunteerManagement::getCityList();
        $parishes = VolunteerManagement::getParishes();
        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);


        view('coordinator_volunteer_management', [
            'Citylinks' => $Citylinks,
            'parishes' => $parishes,
            'sidebarinfo' => $sidebarData
        ]);
    }
}