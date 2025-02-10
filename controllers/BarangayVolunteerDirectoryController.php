<?php 

require_once __DIR__ . '/../models/VolunteerManagement.php';
require_once __DIR__ . '/../models/sidebarinfo.php';


class BarangayVolunteerDirectoryController {

    public static function ShowBarangayDirectory() {
        // Get district from URL query string, default to null if not set
        $city = $_GET['City'] ?? null;
        $district = $_GET['District'] ?? null;
        // Fetch the volunteer directory with the district filter if provided
        $districturl = '?City=' . urlencode($city);

        $getBarangayDirectory = VolunteerManagement::getBarangayDirectory($district, $city);
        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);

        // Render the view with the volunteer directory data
        view('barangay_volunteer_directory', [
            'district' => $district,
            'districturl' => $districturl,
            'barangayLinks' => $getBarangayDirectory,
            'sidebarinfo' => $sidebarData
        ]);
    }
}
