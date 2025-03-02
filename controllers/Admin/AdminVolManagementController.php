<?php

require_once __DIR__ . '/../../models/Sidebarinfo.php';

class AdminVolManagementController
{

    public static function ShowAdminVolManagement()
    {

        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);


        view('Admin/admin_volunteer_management', [
            'role' => $_SESSION['role'],
            'adminsidebarinfo' => $sidebarData,
        ]);
    }
}

?>