<?php

require_once __DIR__ . '/../models/adminsidebarinfo.php';

class AdminCoorManagementController{
    
    public static function ShowAdminCoorManagement(){

        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);
        

        view('admin_coordinator_management',[
            'role' => $_SESSION['role'],
            'adminsidebarinfo' => $sidebarData,
        ]);
    }
}

?>