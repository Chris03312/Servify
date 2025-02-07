<?php 

require_once __DIR__ . '/../models/VolunteerManagement.php';

class DistrictVolunteerDirectoryController {
    public static function ShowDistrictDirectory()  {

        $city = $_GET['City'] ?? null;

        $Districtlinks = VolunteerManagement::getDistrictDirectory($city);

        view('district_volunteer_directory', [
            'Districtlinks' => $Districtlinks
        ]);
    }
}