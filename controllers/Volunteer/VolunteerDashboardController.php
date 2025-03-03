<?php

require_once __DIR__ . '/../../models/Dashboard.php';
require_once __DIR__ . '/../../models/Accounts.php';
require_once __DIR__ . '/../../models/Sidebarinfo.php';
require_once __DIR__ . '/../../models/Notification.php';
require_once __DIR__ . '/../../models/ActivityLog.php';

class VolunteerDashboardController
{
    public static function VolunteerDashboard()
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
        $username = $userSession['username'];
        $role = $userSession['role'];

        // Fetch dashboard data
        $volunteerActivities = getActivityLog($email, $username);
        $sidebarData = SidebarInfo::getSidebarInfo($email, $role);
        $accountsData = Accounts::getAccounts($email);
        $countdown = Dashboard::CountDownElectionDay();
        $notifications = Notification::getNotification($email);
        $userInfo = Dashboard::getinfodashboard($email);
        $currentDate = date('F j, Y');
        $timelines = Dashboard::MyTimeline($email);
        $locations = Dashboard::mapOverview($email);

        // Render the dashboard with session-specific data
        view('Volunteer/volunteer_dashboard', [
            'token' => $session_id,
            'email' => $email,
            'userInfo' => $userInfo,
            'activities' => $volunteerActivities,
            'currentDate' => $currentDate,
            'timelines' => $timelines,
            'sidebarinfo' => $sidebarData,
            'location' => $locations,
            'accountsData' => $accountsData,
            'days' => $countdown['days'],
            'hours' => $countdown['hours'],
            'minutes' => $countdown['minutes'],
            'seconds' => $countdown['seconds'],
            'notifications' => $notifications['notifications'],
            'unread_count' => $notifications['unread_count']
        ]);
    }
}
