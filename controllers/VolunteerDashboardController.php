<?php

require_once __DIR__ . '/../models/Dashboard.php';
require_once __DIR__ . '/../models/Sidebarinfo.php';
require_once __DIR__ . '/../models/Notification.php';
require_once __DIR__ . '/../models/activityLog.php';



class VolunteerDashboardController
{

    public static function VolunteerDashboard()
    {

        // If not logged in, redirect to login
        if (!isset($_SESSION['email']) || !$_SESSION['email']) {
            redirect('/login');
        }

        $volunteerActivities = getActivityLog($_SESSION['email'], $_SESSION['username']);
        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);


        // Get countdown data
        $countdown = Dashboard::CountDownElectionDay();
        $notifications = Notification::getNotification();
        $userInfo = Dashboard::getinfodashboard();
        $currentDate = date('F j, Y');
        $timelines = Dashboard::MyTimeline();
        $locations = Dashboard::mapOverview();

        // Render the dashboard and pass all the necessary data
        view('volunteer_dashboard', [
            'email' => $_SESSION['email'],
            'username' => $_SESSION['username'] ?? 'Guest',
            'userInfo' => $userInfo,
            'activities' => $volunteerActivities,
            'currentDate' => $currentDate,
            'timelines' => $timelines,
            'sidebarinfo' => $sidebarData,
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
