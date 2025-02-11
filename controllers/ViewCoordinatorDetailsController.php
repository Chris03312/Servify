<?php 

require_once __DIR__ . '/../models/sidebarinfo.php';

class ViewCoordinatorDetailsController {

    public static function ShowViewCoordinatorDetails() {
        
        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);

        view('view_coordinator_details', [
            'sidebarinfo' => $sidebarData
        ]);
    }
}