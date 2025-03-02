<?php

require_once __DIR__ . '/../../models/Sidebarinfo.php';
require_once __DIR__ . '/../../models/AdminDirectory.php';

class CitiesDirectoryController
{

    public static function ShowCitiesDirectory()
    {

        $City = $_GET['City'];

        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);
        $getParish = AdminDirectory::getParish($City);


        view('Admin/cities_directory', [
            'role' => $_SESSION['role'],
            'adminsidebarinfo' => $sidebarData,
            'listofparish' => $getParish
        ]);
    }
}

?>