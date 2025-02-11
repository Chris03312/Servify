<?php 

require_once __DIR__ . '/../configuration/Database.php';

class SidebarInfo {
    public static function getSidebarInfo($email, $role) { // Accept email and role as arguments
        try {
            $db = Database::getConnection();

            // Define the table based on the role
            switch ($role) {
                case 'Volunteer':
                    $stmt = $db->prepare('SELECT * FROM VOLUNTEERS_TBL WHERE EMAIL = :email');
                    break;
                case 'Coordinator':
                    $stmt = $db->prepare('
                        SELECT a.account_id, a.role, c.surname, c.first_name
                        FROM accounts a
                        JOIN cprofile_table c ON a.account_id = c.account_id
                        WHERE a.email = :email
                    ');
                    break;
                case 'Admin':
                    $stmt = $db->prepare('SELECT * FROM ADMIN WHERE EMAIL = :email');
                    break;
                default:
                    throw new Exception("Invalid role.");
            }

            $stmt->execute(['email' => $email]);
            return $stmt->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            error_log("Database error in SidebarInfo: " . $e->getMessage());
            return [];
        } catch (Exception $e) {
            error_log("General error in SidebarInfo: " . $e->getMessage());
            return [];
        }
    }
}
