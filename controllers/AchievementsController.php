<?php 

require_once __DIR__ . '/../models/Sidebarinfo.php';
require_once __DIR__ . '/../models/Notification.php';
require_once __DIR__ . '/../models/Achievements.php';
require_once __DIR__ . '/../models/Dashboard.php';



class AchievementsController {
    public static function Achievements() {
        if (!isset($_SESSION['email']) || !$_SESSION['email']) {
            redirect('/login');
        }

        $getBadges = Achievements::getBadges();
        $timelines = Dashboard::MyTimeline();
        $userData = Dashboard::getinfodashboard();
        $sidebarinfo = Sidebarinfo::getsidebarinfo();
        $notifications = Notification::getNotification();
        $getAchievements = Achievements::getAchievements();
        $badge = Achievements::getBadgeByAttendance($getAchievements['ATTENDANCE_COUNT']);
        $getAchievementList = Achievements::getAchievementList();

        // Get user email and ID
        $username = $_SESSION['username'];
        $email = $_SESSION['email'];
        $volunteer_id = $userData['VOLUNTEERS_ID']; // Adjust based on your session structure
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

        view('achievements', [
            'email' => $email,
            'sidebarinfo' => $sidebarinfo,
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
