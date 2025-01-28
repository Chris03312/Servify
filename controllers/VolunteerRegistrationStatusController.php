<?php 

require_once __DIR__ . '/../models/Registrationstatus.php';
require_once __DIR__ . '/../models/Application.php';
require_once __DIR__ . '/../models/Dashboard.php';
require_once __DIR__ . '/../models/Sidebarinfo.php';
require_once __DIR__ . '/../models/Notification.php';

class VolunteerRegistrationStatusController {
    public static function VolunteerRegistrationStatus() {
        if (!isset($_SESSION['email']) || !$_SESSION['email']) {
            redirect('/login');
        }
        
        // Get necessary data
        $sidebarinfo = Sidebarinfo::getsidebarinfo();
        $notifications = Notification::getNotification();
        $userInfo = Dashboard::getinfodashboard();
        $statusInfo = Registrationstatus::registrationstatus(); // Fetch all registration data

        // Pass data to the view in a single variable
        view('volunteer_registration_status', [
            'email' => $_SESSION['email'],
            'sidebarinfo' => $sidebarinfo,
            'userInfo' => $userInfo,
            'statusInfo' => $statusInfo, // Make sure this variable is correctly passed
            'notifications' => $notifications['notifications'],
            'unread_count' => $notifications['unread_count']
        ]);
        
    }
}
