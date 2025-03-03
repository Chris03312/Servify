<?php

require_once __DIR__ . '/../../models/Sidebarinfo.php';

class CoordinatorProfileSettingsController
{

    public static function CoordinatorProfileSettings()
    {

        session_start();

        // Retrieve the session_id from GET or POST request
        $session_id = $_GET['token'] ?? '';

        // Check if the session exists for the given session_id
        if (!isset($_SESSION['sessions'][$session_id])) {
            redirect('/login');
        }

        // Fetch user session data
        $userSession = $_SESSION['sessions'][$session_id];
        $email = $userSession['email'];
        $role = $userSession['role'];

        $sidebarData = SidebarInfo::getSidebarInfo($email, $role);

        view('Coordinator/coordinator_profile_settings', [
            'sidebarinfo' => $sidebarData
        ]);
    }
}