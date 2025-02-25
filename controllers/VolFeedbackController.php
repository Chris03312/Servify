<?php 

require_once __DIR__ . '/../models/sidebarinfo.php';

class VolFeedbackController {

    public static function ShowVolFeedback() {

        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);

        
        view('volunteer_feedback', [
            'sidebarinfo' => $sidebarData
        ]);
    }
}

?>