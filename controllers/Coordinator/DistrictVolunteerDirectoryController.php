<?php

require_once __DIR__ . '/../../models/VolunteerManagement.php';
require_once __DIR__ . '/../../models/Sidebarinfo.php';


class DistrictVolunteerDirectoryController
{
    public static function ShowDistrictDirectory()
    {

        $city = $_GET['City'] ?? null;

        $Districtlinks = VolunteerManagement::getDistrictDirectory($city);
        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);


        view('Coordinator/district_volunteer_directory', [
            'coordinator_info' => $sidebarData,
            'City' => $city,
            'Districtlinks' => $Districtlinks,
            "sidebarinfo" => $sidebarData
        ]);
    }
}