<?php

require_once __DIR__ . '/../models/listofvolunteer.php';

class ListOfVolunteerController {

    public static function ShowListOfVolunteer() {

        $district = $_GET['District'] ?? null;
        $barangay = $_GET['Barangay'] ?? null;
        $pollingplace = $_GET['PollingPlace'];

        $districtParam = $district ? '?District=' . urlencode($district) : '';
        $barangayParam = $barangay ? '?District=' . urlencode($district).'&Barangay='. urlencode($barangay) : '';

        $listofvolunteers = Listofvolunteer::getlistofVolunteer($district, $barangay, $pollingplace);

        view('list_of_volunteers', [
            'listofvolunteers' => $listofvolunteers,
            'pollingplace' => $pollingplace,
            'districturl' => $districtParam,
            'barangayurl' => $barangayParam
        ]);
    }
}