<?php

require_once __DIR__ . '/../../models/Sidebarinfo.php';

class VolFeedbackController
{

    public static function ShowVolFeedback()
    {

        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);


        view('Volunteer/volunteer_feedback', [
            'sidebarinfo' => $sidebarData
        ]);
    }
}

?>