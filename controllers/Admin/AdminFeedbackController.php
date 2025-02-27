<?php

require_once __DIR__ . '/../../models/Sidebarinfo.php';

class AdminFeedbackController
{

    public static function ShowAdminFeedback()
    {

        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);

        view('Admin/admin_feedback', [
            'adminsidebarinfo' => $sidebarData,
            'role' => $_SESSION['role']
        ]);
    }
}