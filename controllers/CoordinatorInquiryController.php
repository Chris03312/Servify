<?php 

require_once __DIR__ . '/../models/sidebarinfo.php';

class CoordinatorInquiryController {

    public static function ShowCoordinatorInquiry() {
        
        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);

        view('coordinator_inquiries', [
            'sidebarinfo' => $sidebarData
        ]);
    }
}