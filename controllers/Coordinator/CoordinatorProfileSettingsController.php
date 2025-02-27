<?php

require_once __DIR__ . '/../../models/Sidebarinfo.php';

class CoordinatorProfileSettingsController
{

    public static function CoordinatorProfileSettings()
    {

        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);


        view('Coordinator/coordinator_profile_settings', [
            'sidebarinfo' => $sidebarData
        ]);
    }
}