<?php

require_once __DIR__ . '/../../models/VolunteerManagement.php';
require_once __DIR__ . '/../../models/Sidebarinfo.php';


class DistrictVolunteerDirectoryController
{
    public static function ShowDistrictDirectory()
    {

        session_start();

        // Retrieve the session_id from GET or POST request
        $session_id = $_GET['token'] ?? '';

        // Check if the session exists for the given session_id
        if (!isset($_SESSION['sessions'][$session_id])) {
            redirect('/login');
        }

        // Fetch user session data
        $userSession = $_SESSION['sessions'][$session_id];
        $email = $userSession['email'];
        $role = $userSession['role'];

        $sidebarData = SidebarInfo::getSidebarInfo($email, $role);

        $city = $_GET['City'] ?? null;

        $Districtlinks = VolunteerManagement::getDistrictDirectory($city, $session_id);


        view('Coordinator/district_volunteer_directory', [
            'coordinator_info' => $sidebarData,
            'City' => $city,
            'Districtlinks' => $Districtlinks,
            "sidebarinfo" => $sidebarData
        ]);
    }
}