<?php

require_once __DIR__ . '/../models/sidebarinfo.php';
require_once __DIR__ . '/../models/adminreports.php';

class ReportsController
{

    public static function ShowReports()
    {

        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);
        $volunteersList = Adminreports::getVolunteerList();
        $numberofVolunteers = Adminreports::numberofVolunteerPerYear();
        $numberofVolunteersGraphs = Adminreports::numberofVolunteerPerYearGraphs();
        $ageData = Adminreports::ageGroups(); // Get age group data

        view('reports', [
            'coordinator_info' => $sidebarData,
            'numberofVolunteers' => $numberofVolunteers,
            'numberofVolunteersGraphs' => $numberofVolunteersGraphs,
            'volunteersList' => $volunteersList['volunteersList'],
            'ageData' => $ageData,
            'role' => $_SESSION['role']
        ]);
    }
}