<?php

require_once __DIR__ . '/../../models/Sidebarinfo.php';
require_once __DIR__ . '/../../models/CoordinatorManagement.php';


class AdminAchievementsController
{

    public static function ShowAdminAchievements()
    {

        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);
        $coordinatorManagement = CoordinatorManagement::getCoordinatorManagement();

        view('Admin/admin_achievements', [
            'role' => $_SESSION['role'],
            'coordinatorManagement' => $coordinatorManagement,
            'adminsidebarinfo' => $sidebarData
        ]);
    }
}

?>