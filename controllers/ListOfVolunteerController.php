<?php

require_once __DIR__ . '/../models/volunteerManagement.php';

class ListOfVolunteerController
{

    public static function ShowListOfVolunteer()
    {

        $city = $_GET['City'];
        $district = $_GET['District'] ?? null;
        $barangay = $_GET['Barangay'] ?? null;
        $pollingplace = $_GET['PollingPlace'];

        $districturl = '?City=' . urlencode($city);
        $barangayurl = '?City=' . urlencode($city) . '&District=' . urlencode($district);
        $pollingplaceurl = '?City=' . urlencode($city) . '&District=' . urlencode($district) . '&Barangay=' . urlencode($barangay);


        $listofvolunteers = VolunteerManagement::getlistofVolunteer($city, $district, $barangay, $pollingplace);
        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);


        view('list_of_volunteers', [
            'sidebarinfo' => $sidebarData,
            'listofvolunteers' => $listofvolunteers,
            'pollingplace' => $pollingplace,
            'pollingplaceurl' => $pollingplaceurl,
            'districturl' => $districturl,
            'barangayurl' => $barangayurl
        ]);
    }
}