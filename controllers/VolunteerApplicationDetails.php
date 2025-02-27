<?php

require_once __DIR__ . '/../models/sidebarinfo.php';
require_once __DIR__ . '/../models/application.php';

class VolunteerApplicationDetails
{

    public static function ShowVolunteerApplicationDetails()
    {

        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);
        $applicationDetails = Application::reviewApplicationDetails($_SESSION['application_id']);
        $applicationInfo = Application::getinfoApplication();

        view('volunteer_application_details', [
            'role' => $_SESSION['role'],
            'applicationId' => $_SESSION['application_id'],
            'applicationInfo' => $applicationInfo,
            'applicationDetails' => $applicationDetails,
            'coordinator_info' => $sidebarData
        ]);
    }


}