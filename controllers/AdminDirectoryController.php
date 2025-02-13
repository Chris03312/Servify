<?php

require_once __DIR__ . '/../models/sidebarinfo.php';
require_once __DIR__ . '/../models/adminDirectory.php';


class AdminDirectoryController{
    
    public static function ShowAdminDirectory(){

        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);
        $citiesDirectory = AdminDirectory::getCitiesDirectory();

        view('admin_directory', [
            'role' => $_SESSION['role'],
            'citiesDirectory' => $citiesDirectory,
            'adminsidebarinfo' => $sidebarData
        ]);
    }
}