<?php 
require_once __DIR__ . '/../configuration/Database.php';

class Achievements {

    public static function getAchievements() {
        try {
            $db = Database::getConnection();

            $stmt = $db->prepare('
            SELECT 
                v.DATE_APPROVED, 
                COUNT(a.DATE) AS YEARS_OF_SERVICE,
                COUNT(a.EMAIL) AS ATTENDANCE_COUNT
            FROM 
                VOLUNTEERS_TBL AS v 
            INNER JOIN 
                ATTENDANCES AS a 
            ON 
                v.VOLUNTEERS_ID = a.VOLUNTEER_ID 
            WHERE 
                v.EMAIL = :email 
            GROUP BY 
                v.DATE_APPROVED;
            ');

            $stmt->execute(['email' => $_SESSION['email']]);
            $getAchievements = $stmt->fetch(PDO::FETCH_ASSOC);

            if($getAchievements) {

                $achievementBadge = $getAchievements['ATTENDANCE_COUNT'];
                $currentYear = date('Y');
                $sinceYear = date('Y', strtotime($getAchievements['DATE_APPROVED']));

                if($sinceYear){
                    $yearsofService = $currentYear - $sinceYear;
                }
            }
            return [
                'DATE_APPROVED' => $sinceYear,
                'YEARS_OF_SERVICE' => $yearsofService,
                'ATTENDANCE_COUNT' => $achievementBadge
            ];
        } catch (PDOException $e) {
            echo 'Error in getting the achievements: ' . $e->getMessage();
        }
    }
}