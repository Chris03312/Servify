<?php 

require_once __DIR__ . '/../models/sidebarinfo.php';

class CoordinatorFeedbackController {

    public static function ShowCoordinatorFeedback() {

        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);

        
        view('coordinator_feedback', [
            'sidebarinfo' => $sidebarData
        ]);
    }
}




