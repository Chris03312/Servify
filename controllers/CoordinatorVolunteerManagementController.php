<?php

require_once __DIR__ . '/../models/VolunteerManagement.php';


class CoordinatorVolunteerManagementController {

    public static function ShowVolunteerManagement() {

        $districtLinks = VolunteerManagement::DistrictList();
        

        view('coordinator_volunteer_management', [
            'districtLinks' => $districtLinks
        ]);
    }
}