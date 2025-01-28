<?php

require_once __DIR__ . '/../models/VolunteerManagement.php';


class CoordinatorVolunteerManagementController {

    public static function ShowVolunteerManagement() {

        $district = VolunteerManagement::DistrictList();

        view('coordinator_volunteer_management');
    }
}