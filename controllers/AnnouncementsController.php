<?php

require_once __DIR__ . '/../models/Sidebarinfo.php';
require_once __DIR__ . '/../models/Notification.php';

class AnnouncementsController {
    public static function Announcements() {

        if (!isset($_SESSION['email']) || !$_SESSION['email']) {
            redirect('/login');
        }

        $sidebarinfo = Sidebarinfo::getsidebarinfo();
        $notifications = Notification::getNotification();

        view('announcements', [
            'email' => $_SESSION['email'],
            'sidebarinfo' => $sidebarinfo,
            'notifications' => $notifications['notifications'],  // List of notifications
            'unread_count' => $notifications['unread_count']
        ]);
    }
}