<?php

require_once __DIR__ . '/../../models/Sidebarinfo.php';
require_once __DIR__ . '/../../models/Notification.php';
require_once __DIR__ . '/../../models/Achievements.php';
require_once __DIR__ . '/../../models/Dashboard.php';



class AchievementsController
{
    public static function Achievements()
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

        $getBadges = Achievements::getBadges();
        $timelines = Dashboard::MyTimeline($email);
        $userData = Dashboard::getinfodashboard($email);
        $notifications = Notification::getNotification($email);
        $getAchievements = Achievements::getAchievements();
        $badge = Achievements::getBadgeByAttendance($getAchievements['ATTENDANCE_COUNT']);
        $getAchievementList = Achievements::getAchievementList();

        // Get user email and ID
        $username = $_SESSION['username'];
        $email = $_SESSION['email'];
        $volunteer_id = $userData['VOLUNTEER_ID']; // Adjust based on your session structure
        $attendance_count = $getAchievements['ATTENDANCE_COUNT'];

        // Define achievement levels
        $achievements = [
            2 => "Bronze Badge",
            5 => "Silver Badge",
            7 => "Gold Badge",
            9 => "Platinum Badge"
        ];

        // Check which achievement should be inserted
        foreach ($achievements as $required_attendance => $badge_name) {
            if ($attendance_count >= $required_attendance) {
                Achievements::insertAchievement($volunteer_id, $email, $badge_name, $username);
            }
        }

        view('Volunteer/achievements', [
            'email' => $email,
            'sidebarinfo' => $sidebarData,
            'getAchievementList' => $getAchievementList,
            'timelines' => $timelines,
            'notifications' => $notifications['notifications'],
            'unread_count' => $notifications['unread_count'],
            'years_of_service' => $getAchievements['YEARS_OF_SERVICE'],
            'date_approved' => $getAchievements['DATE_APPROVED'],
            'attendance_count' => $attendance_count,
            'badges' => $getBadges,
            'badge' => $badge
        ]);
    }


}
