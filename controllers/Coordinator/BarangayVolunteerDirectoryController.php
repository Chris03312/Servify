<?php

require_once __DIR__ . '/../../models/VolunteerManagement.php';
require_once __DIR__ . '/../../models/Sidebarinfo.php';


class BarangayVolunteerDirectoryController
{

    public static function ShowBarangayDirectory()
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
        // Get district from URL query string, default to null if not set
        $city = $_GET['City'] ?? null;
        $district = $_GET['District'] ?? null;
        // Fetch the volunteer directory with the district filter if provided
        $districturl = '?token=' . urlencode($session_id) . 'City=' . urlencode($city);

        $getBarangayDirectory = VolunteerManagement::getBarangayDirectory($district, $city, $session_id);
        // Render the view with the volunteer directory data
        view('Coordinator/barangay_volunteer_directory', [
            'coordinator_info' => $sidebarData,
            'district' => $district,
            'districturl' => $districturl,
            'barangayLinks' => $getBarangayDirectory,
            'sidebarinfo' => $sidebarData
        ]);
    }
}
