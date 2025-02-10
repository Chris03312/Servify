<?php 

require_once __DIR__ . '/../models/VolunteerManagement.php';
require_once __DIR__ . '/../models/sidebarinfo.php';


class DistrictVolunteerDirectoryController {
    public static function ShowDistrictDirectory()  {

        $city = $_GET['City'] ?? null;

        $Districtlinks = VolunteerManagement::getDistrictDirectory($city);
        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);


        view('district_volunteer_directory', [
            'City' => $city,
            'Districtlinks' => $Districtlinks,
            "sidebarinfo" => $sidebarData
        ]);
    }
}