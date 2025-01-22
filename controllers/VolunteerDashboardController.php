<?php 

require_once __DIR__ . '/../models/Dashboard.php';
require_once __DIR__ . '/../models/Sidebarinfo.php';
require_once __DIR__ . '/../models/Notification.php';


class VolunteerDashboardController {

    public static function VolunteerDashboard() {

        LoginController::checkRememberMe();

        // If not logged in, redirect to login
        if (!isset($_SESSION['email']) || !$_SESSION['email']) {
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
        $locations = Dashboard::mapOverview();

        // Render the dashboard and pass all the necessary data
        view('volunteer_dashboard', [
            'email' => $_SESSION['email'],
            'username' => $_SESSION['username'] ?? 'Guest',
            'userInfo' => $userInfo,
            'activities' => $activities,
            'currentDate' => $currentDate,
            'timelines' => $timelines,
            'sidebarinfo' => $sidebarinfo,
            'location' => $locations,
            'days' => $countdown['days'],
            'hours' => $countdown['hours'],
            'minutes' => $countdown['minutes'],
            'seconds' => $countdown['seconds'],
            'notifications' => $notifications['notifications'],  // List of notifications
            'unread_count' => $notifications['unread_count']
        ]);
    }
}
