<?php

require_once __DIR__ . '/../../models/Sidebarinfo.php';
class CoordinatorAchievementsController
{

    public static function ShowCoordinatorAchievements()
    {

        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);

        view('Coordinator/coordinator_achievements', [
            'coordinator_info' => $sidebarData,
        ]);
    }
}