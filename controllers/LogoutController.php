<?php

class LogoutController
{

    public static function Logout()
    {
        session_start();
        $session_id = $_GET['token'] ?? '';

        if (isset($_SESSION['sessions'][$session_id])) {
            unset($_SESSION['sessions'][$session_id]); // Remove only this user's session

            error_log($session_id);
            redirect('/login');

        } else {
            echo json_encode(['error' => 'Session not found']);
        }
    }

}