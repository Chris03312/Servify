<?php 

require_once __DIR__ . '/../models/sidebarinfo.php';

class CoordinatorProfileSettingsController {

    public static function CoordinatorProfileSettings() {

        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);


        view('coordinator_profile_settings', [
            'sidebarinfo' => $sidebarData
        ]);
    }
}