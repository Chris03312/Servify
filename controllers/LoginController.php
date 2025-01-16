<?php 

require_once __DIR__ . '/../core/helpers.php'; 

class LoginController {

    public static function ShowLoginForm() {

        view('login'); // Ensure this helper correctly renders the view
    }
    
    
    public static function login() {
        require_once __DIR__ . '/../configuration/Database.php';

    }
}