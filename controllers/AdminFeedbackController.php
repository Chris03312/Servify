<?php

require_once __DIR__ . '/../models/sidebarinfo.php';

class AdminFeedbackController
{

    public static function ShowAdminFeedback()
    {

        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);

        view('admin_feedback', [
            'adminsidebarinfo' => $sidebarData,
            'role' => $_SESSION['role']
        ]);
    }
}