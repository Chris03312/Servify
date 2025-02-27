<?php

require_once __DIR__ . '/../../models/VolunteerManagement.php';
require_once __DIR__ . '/../../models/Sidebarinfo.php';


class CoordinatorVolunteerManagementController
{

    public static function ShowVolunteerManagement()
    {

        $Citylinks = VolunteerManagement::getCityList();
        $parishes = VolunteerManagement::getParishes();
        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);


        view('Coordinator/coordinator_volunteer_management', [
            'coordinator_info' => $sidebarData,
            'Citylinks' => $Citylinks,
            'parishes' => $parishes,
            'sidebarinfo' => $sidebarData
        ]);
    }
}