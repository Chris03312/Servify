<?php 

require_once __DIR__ . '/../models/Dashboard.php';
require_once __DIR__ . '/../models/Sidebarinfo.php';
require_once __DIR__ . '/../models/Notification.php';


class VolunteerDashboardController {

    public static function VolunteerDashboard() {

        LoginController::checkRememberMe();

        // If not logged in, redirect to login
        if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
            redirect('/login');
        }

        // Get countdown data
        $countdown = Dashboard::CountDownElectionDay();
        // Get other data
        $notifications = Notification::getNotification();
        $activities = Dashboard::getActivityLog();
        $sidebarinfo = Sidebarinfo::getsidebarinfo();
        $userInfo = Dashboard::getinfodashboard();
        $currentDate = date('F j, Y');
        $timelines = Dashboard::MyTimeline();

        // Render the dashboard and pass all the necessary data
        view('volunteer_dashboard', [
            'username' => $_SESSION['username'] ?? 'Guest',
            'userInfo' => $userInfo,
            'sidebarinfo' => $sidebarinfo,
            'activities' => $activities,
            'currentDate' => $currentDate,
            'days' => $countdown['days'],
            'hours' => $countdown['hours'],
            'minutes' => $countdown['minutes'],
            'seconds' => $countdown['seconds'],
            'timelines' => $timelines,
            'notifications' => $notifications['notifications'],  // List of notifications
            'unread_count' => $notifications['unread_count']
        ]);
    }
}
