<?php

require_once __DIR__ . '/../../models/Sidebarinfo.php';

class CoordinatorFeedbackController
{

    public static function ShowCoordinatorFeedback()
    {

        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);


        view('Coordinator/coordinator_feedback', [
            'coordinator_info' => $sidebarData,
        ]);
    }
}

?>