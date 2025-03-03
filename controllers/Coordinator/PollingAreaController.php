<?php

require_once __DIR__ . '/../../models/VolunteerManagement.php';

class PollingAreaController
{

    public static function ShowPollingArea()
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
        $district = $_GET['District'] ?? null;
        $barangay = $_GET['Barangay'] ?? null;

        $districturl = '?token=' . urlencode($session_id) . '&City=' . urlencode($city);
        $barangayurl = '?token=' . urlencode($session_id) . '&City=' . urlencode($city) . '&District=' . urlencode($district);

        $getPollingDirectory = VolunteerManagement::getPollingPlace($session_id, $city, $district, $barangay);


        view('Coordinator/polling_area', [
            'coordinator_info' => $sidebarData,
            'barangay' => $barangay,
            'districturl' => $districturl,
            'barangayurl' => $barangayurl,
            'pollingLinks' => $getPollingDirectory,
            'sidebarinfo' => $sidebarData
        ]);
    }
}