<?php

require_once __DIR__ . '/../../models/Sidebarinfo.php';
require_once __DIR__ . '/../../models/Adminreports.php';

class AdminReportsController
{

    public static function ShowAdminReports()
    {
        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);
        $volunteersList = Adminreports::getVolunteerList();
        $numberofVolunteers = Adminreports::numberofVolunteerPerYear();
        $numberofVolunteersGraphs = Adminreports::numberofVolunteerPerYearGraphs();
        $ageData = Adminreports::ageGroups(); // Get age group data

        view('Admin/admin_reports', [
            'adminsidebarinfo' => $sidebarData,
            'numberofVolunteers' => $numberofVolunteers,
            'numberofVolunteersGraphs' => $numberofVolunteersGraphs,
            'volunteersList' => $volunteersList['volunteersList'],
            'ageData' => $ageData,
            'role' => $_SESSION['role']
        ]);
    }
}