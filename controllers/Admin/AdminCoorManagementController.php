<?php

require_once __DIR__ . '/../../models/Sidebarinfo.php';
require_once __DIR__ . '/../../models/CoordinatorManagement.php';


class AdminCoorManagementController
{

    public static function ShowAdminCoorManagement()
    {

        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);
        $coordinatorManagement = CoordinatorManagement::getCoordinatorManagement();

        view('Admin/admin_coordinator_management', [
            'role' => $_SESSION['role'],
            'coordinatorManagement' => $coordinatorManagement,
            'adminsidebarinfo' => $sidebarData
        ]);
    }
}

?>