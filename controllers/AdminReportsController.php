<?php 

require_once __DIR__ . '/../models/sidebarinfo.php';

class AdminReportsController {

    public static function ShowAdminReports() {

        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);

        view('admin_reports', [
            'sidebarinfo' => $sidebarData
        ]);
    }
}