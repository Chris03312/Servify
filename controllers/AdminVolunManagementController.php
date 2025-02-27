<?php
require_once __DIR__ . '/../models/sidebarinfo.php';
require_once __DIR__ . '/../models/admin_volunteer_management.php';

class AdminVolunManagementController
{
    public static function ShowAdminVolunManagement()
    {
        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);
        $volunteers = VolunteerModel::getAllVolunteers(); // Now using a function instead of a class

        view('admin_volunteer_management', [
            'role' => $_SESSION['role'],
            'adminsidebarinfo' => $sidebarData,
            'volunteers' => $volunteers // Now correctly passed to the view
        ]);
    }
}


?>