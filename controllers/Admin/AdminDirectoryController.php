<?php

require_once __DIR__ . '/../../models/Sidebarinfo.php';
require_once __DIR__ . '/../../models/AdminDirectory.php';


class AdminDirectoryController
{

    public static function ShowAdminDirectory()
    {

        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);
        $citiesDirectory = AdminDirectory::getCitiesDirectory();

        view('Admin/admin_directory', [
            'role' => $_SESSION['role'],
            'citiesDirectory' => $citiesDirectory,
            'adminsidebarinfo' => $sidebarData
        ]);
    }
}