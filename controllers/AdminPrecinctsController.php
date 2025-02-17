<?php

require_once __DIR__ . '/../models/sidebarinfo.php';
require_once __DIR__ . '/../models/coordinatorManagement.php';


class AdminPrecinctsController{
    
    public static function ShowAdminPrecincts(){

        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);
        $coordinatorManagement = CoordinatorManagement::getCoordinatorManagement();

        view('precincts',[
            'role' => $_SESSION['role'],
            'coordinatorManagement' => $coordinatorManagement,
            'adminsidebarinfo' => $sidebarData
        ]);
    }
}

?>