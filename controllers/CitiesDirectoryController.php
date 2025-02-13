<?php

require_once __DIR__ . '/../models/sidebarinfo.php';

class CitiesDirectoryController{
    
    public static function ShowCitiesDirectory(){

        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);


        view('cities_directory', [
            'role' => $_SESSION['role'],
            'adminsidebarinfo' => $sidebarData
        ]);
    }
}

?>