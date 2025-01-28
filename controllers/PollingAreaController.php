<?php 

require_once __DIR__ . '/../models/pollingareaDirectory.php';

class PollingAreaController {

    public static function ShowPollingArea() {

        $district = $_GET['District'] ?? null;
        $barangay = $_GET['Barangay'] ?? null;

        $districtParam = $district ? '?District=' . urlencode($district) : '';

        $getPollingDirectory = PollingareaDirectory::getPollingPlace($district, $barangay);

        view('polling_area', [
            'barangay' => $barangay,
            'districturl' => $districtParam,
            'pollingLinks' => $getPollingDirectory
        ]);
    }
}