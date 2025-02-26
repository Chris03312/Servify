<?php 

class LogoutController {
    public static function Logout() {
        session_unset();
        session_destroy();
    
        // Clear the remember me cookie
        if (isset($_COOKIE['remember_token'])) {
            setcookie('remember_token', '', time() - 3600, '/', '', true, true);
        }
    
        redirect('/login');
    }
    
}