<?php 

require_once __DIR__ . '/../models/VolunteerManagement.php';

class PollingAreaController {

    public static function ShowPollingArea() {

        $city = $_GET['City'] ?? null;
        $district = $_GET['District'] ?? null;
        $barangay = $_GET['Barangay'] ?? null;  

        $districturl = '?City=' . urlencode($city);
        $barangayurl = '?City=' . urlencode($city) . '&District=' . urlencode($district);

        $getPollingDirectory = VolunteerManagement::getPollingPlace($city, $district, $barangay);
        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);


        view('polling_area', [
            'barangay' => $barangay,
            'districturl' => $districturl,
            'barangayurl' => $barangayurl,
            'pollingLinks' => $getPollingDirectory,
            'sidebarinfo' => $sidebarData
        ]);
    }
}