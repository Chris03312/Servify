<?php

require_once __DIR__ . '/../../models/Sidebarinfo.php';

class CoordinatorInquiryController
{

    public static function ShowCoordinatorInquiry()
    {

        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);

        view('Coordinator/coordinator_inquiries', [
            'coordinator_info' => $sidebarData,
        ]);
    }
}