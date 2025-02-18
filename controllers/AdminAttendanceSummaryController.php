<?php

require_once __DIR__ . '/../models/sidebarinfo.php';
require_once __DIR__ . '/../models/coordinatorManagement.php';


class AdminAttendanceSummaryController{
    
    public static function ShowAdminAttendanceSummary(){

        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);
        $coordinatorManagement = CoordinatorManagement::getCoordinatorManagement();

        view('admin_attendance_summary',[
            'role' => $_SESSION['role'],
            'coordinatorManagement' => $coordinatorManagement,
            'adminsidebarinfo' => $sidebarData
        ]);
    }
}

?>