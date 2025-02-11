<?php 

require_once __DIR__ . '/../models/registrationstatus.php';
require_once __DIR__ . '/../models/application.php';
require_once __DIR__ . '/../models/dashboard.php';
require_once __DIR__ . '/../models/sidebarinfo.php';
require_once __DIR__ . '/../models/notification.php';

class VolunteerRegistrationStatusController {
    public static function VolunteerRegistrationStatus() {
        if (!isset($_SESSION['email']) || !$_SESSION['email']) {
            redirect('/login');
        }
        
        // Get necessary data
        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);
        $notifications = Notification::getNotification();
        $userInfo = Dashboard::getinfodashboard();
        $statusInfo = Registrationstatus::registrationstatus(); // Fetch all registration data

        // Pass data to the view in a single variable
        view('volunteer_registration_status', [
            'email' => $_SESSION['email'],
            'sidebarinfo' => $sidebarData,
            'userInfo' => $userInfo,
            'statusInfo' => $statusInfo, // Make sure this variable is correctly passed
            'notifications' => $notifications['notifications'],
            'unread_count' => $notifications['unread_count']
        ]);
        
    }
}
