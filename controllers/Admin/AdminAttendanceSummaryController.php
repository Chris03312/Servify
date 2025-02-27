<?php

require_once __DIR__ . '/../../models/Sidebarinfo.php';
require_once __DIR__ . '/../../models/CoordinatorManagement.php';


class AdminAttendanceSummaryController
{

    public static function ShowAdminAttendanceSummary()
    {

        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);
        $coordinatorManagement = CoordinatorManagement::getCoordinatorManagement();

        view('Admin/admin_attendance_summary', [
            'role' => $_SESSION['role'],
            'coordinatorManagement' => $coordinatorManagement,
            'adminsidebarinfo' => $sidebarData
        ]);
    }
}

?>