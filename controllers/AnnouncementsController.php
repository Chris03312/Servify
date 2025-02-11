<?php

require_once __DIR__ . '/../models/sidebarinfo.php';
require_once __DIR__ . '/../models/notification.php';

class AnnouncementsController {
    public static function ShowAnnouncements() {

        if (!isset($_SESSION['email']) || !$_SESSION['email']) {
            redirect('/login');
        }

        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);

        $notifications = Notification::getNotification();

        view('announcements', [
            'email' => $_SESSION['email'],
            'sidebarinfo' => $sidebarData,
            'notifications' => $notifications['notifications'],  // List of notifications
            'unread_count' => $notifications['unread_count']
        ]);
    }
}