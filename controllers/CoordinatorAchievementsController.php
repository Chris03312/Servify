<?php 

require_once __DIR__ . '/../models/sidebarinfo.php';
class CoordinatorAchievementsController {

    public static function ShowCoordinatorAchievements() {

        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);
        
        view('coordinator_achievements', [
            'sidebarinfo' => $sidebarData
        ]);
    }
}