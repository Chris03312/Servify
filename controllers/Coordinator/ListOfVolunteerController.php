<?php

require_once __DIR__ . '/../../models/VolunteerManagement.php';

class ListOfVolunteerController
{

    public static function ShowListOfVolunteer()
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

        $city = $_GET['City'];
        $district = $_GET['District'] ?? null;
        $barangay = $_GET['Barangay'] ?? null;
        $pollingplace = $_GET['PollingPlace'];

        $districturl = '?token=' . urlencode($session_id) . '&City=' . urlencode($city);
        $barangayurl = '?token=' . urlencode($session_id) . '&City=' . urlencode($city) . '&District=' . urlencode($district);
        $pollingplaceurl = '?token=' . urlencode($session_id) . '&City=' . urlencode($city) . '&District=' . urlencode($district) . '&Barangay=' . urlencode($barangay);

        $listofvolunteers = VolunteerManagement::getlistofVolunteer($city, $district, $barangay, $pollingplace);

        view('Coordinator/list_of_volunteers', [
            'coordinator_info' => $sidebarData,
            'listofvolunteers' => $listofvolunteers,
            'pollingplace' => $pollingplace,
            'pollingplaceurl' => $pollingplaceurl,
            'districturl' => $districturl,
            'barangayurl' => $barangayurl
        ]);
    }
}