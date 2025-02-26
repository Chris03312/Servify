<?php


require_once __DIR__ . '/../models/sidebarinfo.php';

class AdminInquiryController
{

    public static function ShowAdminInquiry()
    {

        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);

        view('admin_inquiries', [
            'adminsidebarinfo' => $sidebarData,
            'role' => $_SESSION['role']
        ]);
    }
}