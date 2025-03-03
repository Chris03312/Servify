<?php

require_once __DIR__ . '/../../models/Sidebarinfo.php';
require_once __DIR__ . '/../../models/CoordinatorDetails.php';


class ViewCoordinatorDetailsController
{

    public static function ShowViewCoordinatorDetails()
    {


        session_start();

        // Retrieve the session_id from GET or POST request
        $session_id = $_GET['token'] ?? '';

        // Check if the session exists for the given session_id
        // if (!isset($_SESSION['sessions'][$session_id])) {
        //     redirect('/login');
        // }

        // Fetch user session data
        $userSession = $_SESSION['sessions'][$session_id];
        $email = $userSession['email'];
        $role = $userSession['role'];

        $coordinator_id = $_POST['coordinator_id'];

        $coordinatorData = CoordinatorDetails::ViewCoordinatorDetails($coordinator_id);
        $sidebarData = SidebarInfo::getSidebarInfo($email, $role);

        view('Admin/view_coordinator_details', [
            'coordinatorData' => $coordinatorData,
            'adminsidebarinfo' => $sidebarData,
            'role' => $role,
        ]);
    }

}