<?php

require_once __DIR__ . '/../models/VolunteerManagement.php';


class CoordinatorVolunteerManagementController {

    public static function ShowVolunteerManagement() {

        $Citylinks = VolunteerManagement::getCityList();
        $parishes = VolunteerManagement::getParishes();

        view('coordinator_volunteer_management', [
            'Citylinks' => $Citylinks,
            'parishes' => $parishes
        ]);
    }
}