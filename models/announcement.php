<?php

require_once __DIR__ . '/../configuration/Database.php';
class Announcement
{
    public static function getAnnouncement()
    {
        try {
            $db = Database::getConnection();
            $query = $db->prepare('SELECT * FROM announcements');
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return $result;

        } catch (PDOException $e) {
            error_log('error in getting announcement' . $e->getMessage());
            return [];
        }
    }

    public static function getComment()
    {
        $db = Database::getConnection();
        $query = $db->query("SELECT comments.comments_id, comments.announcement_id, comments.content, comments.created_at, accounts.username 
                             FROM comments 
                             JOIN accounts ON comments.username = accounts.username");
        $getComment = $query->fetchAll(PDO::FETCH_ASSOC);
        return $getComment;
    }

}