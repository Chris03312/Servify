<?php 

require_once __DIR__ . '/../models/BarangayVolunteerDirectory.php';

class BarangayVolunteerDirectoryController {

    public static function ShowBarangayDirectory() {
        // Get district from URL query string, default to null if not set
        $district = $_GET['District'] ?? null;
        // Fetch the volunteer directory with the district filter if provided
        $getBarangayDirectory = BarangayVolunteerDirectory::getBarangayDirectory($district);

        // Render the view with the volunteer directory data
        view('barangay_volunteer_directory', [
            'district' => $district,
            'barangayLinks' => $getBarangayDirectory
        ]);
    }
}
