<?php 

require_once __DIR__ . '/../models/sidebarinfo.php';

class ReportsController {

    public static function ShowReports() {

        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);

        view('reports', [
            'sidebarinfo' => $sidebarData
        ]);
    }
}