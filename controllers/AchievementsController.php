<?php 

require_once __DIR__ . '/../models/Sidebarinfo.php';
require_once __DIR__ . '/../models/Notification.php';
require_once __DIR__ . '/../models/achievements.php';
class AchievementsController {
    public static function Achievements(): void{

        if (!isset($_SESSION['email']) || !$_SESSION['email']) {
            redirect('/login');
        }

        $sidebarinfo = Sidebarinfo::getsidebarinfo();
        $getAchievements = Achievements::getAchievements();
        $notifications = Notification::getNotification();

        view('achievements', [
            'email' => $_SESSION['email'],
            'sidebarinfo' => $sidebarinfo,
            'notifications' => $notifications['notifications'],  // List of notifications
            'unread_count' => $notifications['unread_count'],
            'years_of_service' => $getAchievements['YEARS_OF_SERVICE'],
            'date_approved' => $getAchievements['DATE_APPROVED'],
            'attendance_count' => $getAchievements['ATTENDANCE_COUNT']
        ]);
    }
}