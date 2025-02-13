<?php 
require_once __DIR__ . '/../configuration/Database.php';

class Achievements {

    public static function getAchievements() {
        try {
            $email = $_SESSION['email'];
            $db = Database::getConnection();
    
            $stmt = $db->prepare('
                SELECT 
                    v.DATE_APPROVED, 
                    COUNT(a.DATE) AS YEARS_OF_SERVICE,
                    COUNT(a.EMAIL) AS ATTENDANCE_COUNT
                FROM 
                    VOLUNTEERS_TBL AS v 
                LEFT JOIN 
                    ATTENDANCES AS a 
                ON 
                    v.VOLUNTEERS_ID = a.VOLUNTEER_ID 
                WHERE 
                    v.EMAIL = :email 
                GROUP BY 
                    v.DATE_APPROVED;
            ');
    
            $stmt->execute(['email' => $email]);
            $getAchievements = $stmt->fetch(PDO::FETCH_ASSOC);
    
            // Default values if no attendance record exists
            if (!$getAchievements) {
                return [
                    'DATE_APPROVED' => null,
                    'YEARS_OF_SERVICE' => 0,
                    'ATTENDANCE_COUNT' => 0,
                    'BADGE' => null
                ];
            }
    
            // Calculate Years of Service
            $achievementBadge = $getAchievements['ATTENDANCE_COUNT'];
            $currentYear = date('Y');
            $sinceYear = date('Y', strtotime($getAchievements['DATE_APPROVED']));
            $yearsOfService = $sinceYear ? ($currentYear - $sinceYear) : 0;
    
            // Get the corresponding badge
            $badgeData = self::getBadgeByAttendance($achievementBadge);
            
            return [
                'DATE_APPROVED' => $sinceYear,
                'YEARS_OF_SERVICE' => $yearsOfService,
                'ATTENDANCE_COUNT' => $achievementBadge,
                'BADGE' => $badgeData
            ];
        } catch (PDOException $e) {
            error_log('Error in getAchievements: ' . $e->getMessage());
            return [
                'DATE_APPROVED' => null,
                'YEARS_OF_SERVICE' => 0,
                'ATTENDANCE_COUNT' => 0,
                'BADGE' => null
            ];
        }
    }
    

    public static function getBadges() {
        try {
            $db = Database::getConnection();
            $stmt = $db->query("SELECT * FROM badges ORDER BY count ASC");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error fetching badges: " . $e->getMessage();
        }
    }

    public static function getBadgeByAttendance($attendanceCount) {
        try {
            $db = Database::getConnection();
            
            $stmt = $db->prepare('
                SELECT * FROM badges 
                WHERE count <= :attendance_count 
                ORDER BY count DESC 
                LIMIT 1;
            ');
    
            $stmt->execute(['attendance_count' => $attendanceCount]);
            return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
        } catch (PDOException $e) {
            error_log('Error fetching badge: ' . $e->getMessage());
            return null;
        }
    }
    
    

    public static function insertAchievement($volunteer_id, $email, $badge_name, $username) {
            try {
            $db = Database::getConnection();

            $db->beginTransaction();
            // Check if the achievement already exists
            $query = "SELECT * FROM achievements WHERE volunteer_id = ? AND achievement_name = ?";
            $stmt = $db->prepare($query);
            $stmt->execute([$volunteer_id, $badge_name]);

            if ($stmt->rowCount() == 0) { // Insert only if it doesn't exist
                $description = "Congratulation you unlocked an Achievement: $badge_name";
                $created_at = date('F j, Y H:i:s');

                $insertQuery = "INSERT INTO ACHIEVEMENTS (volunteer_id, email, achievement_name, date_achieved) VALUES (?, ?, ?, NOW())";
                $insertStmt = $db->prepare($insertQuery);
                $insertStmt->execute([$volunteer_id, $email, $badge_name]);

                $stmt = $db->prepare('INSERT INTO ACTIVITIES (username, email, description, created_at) VALUES (?, ?, ?, ?)');
                $stmt->execute([$username, $email, $description, $created_at]);
            }

            $db->commit();
        } catch (PDOException $e) {
            $db->rollBack();
            error_log('Error in inserting achievements: ' . $e->getMessage());
        }
    }

    public static function getAchievementList() {
        try {
            $email = $_SESSION['email'];
            $db = Database::getConnection();
            $stmt = $db->prepare('SELECT * FROM ACHIEVEMENTS WHERE email = :email');
            $stmt->execute(['email' => $email]);
            $achievements = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $achievements;
        } catch (PDOException $e) {
            error_log('Error fetching achievements: ' . $e->getMessage());
            return [];
        }

    }

}