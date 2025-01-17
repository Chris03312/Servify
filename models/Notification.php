<?php 

require_once __DIR__ . '/../configuration/Database.php';

class Notification {

    public static function getNotification(){
        try {
            $email = $_SESSION['email'];
    
            $db = Database::getConnection();
    
            // Query to fetch notifications without the unread count
            $stmt = $db->prepare('
                SELECT `FROM`, DATE_SENT, TIME_SENT, MESSAGE 
                FROM notifications 
                WHERE `TO` = :email
            ');
            $stmt->execute([':email' => $email]);
    
            // Fetch notifications
            $notifications = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            // Query to get unread count
            $stmtCount = $db->prepare('
                SELECT COUNT(status) AS UNREAD_COUNT 
                FROM notifications 
                WHERE `TO` = :email AND status = "unread"
            ');
            $stmtCount->execute([':email' => $email]);
    
            // Fetch the unread count
            $unreadCount = $stmtCount->fetch(PDO::FETCH_ASSOC)['UNREAD_COUNT'];
    
            // Format date and time for each notification
            foreach ($notifications as &$notif) {
                // Combine DATE_SENT and TIME_SENT to form a complete datetime
                $dateTime = $notif['DATE_SENT'] . ' ' . $notif['TIME_SENT'];
                
                // Create a DateTime object and format the datetime
                $date = new DateTime($dateTime);
                $notif['FORMATTED_DATE'] = $date->format('D, h:i A'); // Format as needed
            }
    
            return [
                'notifications' => $notifications, // Return notifications
                'unread_count' => $unreadCount // Return unread count separately
            ];
        } catch (PDOException $e) {
            error_log('Notification Error '. $e->getMessage());
            return []; // Return empty array in case of error
        }
    }
}