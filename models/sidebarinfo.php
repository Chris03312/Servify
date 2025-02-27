<?php

require_once __DIR__ . '/../configuration/Database.php';

class SidebarInfo
{
    public static function getSidebarInfo($email, $role)
    {
        try {
            $db = Database::getConnection();

            switch ($role) {
                case 'Volunteer':
                    // Check if email exists in VPROFILE_TABLE first
                    $stmt = $db->prepare('SELECT * FROM VPROFILE_TABLE WHERE EMAIL = :email');
                    $stmt->execute(['email' => $email]);
                    $vprofile = $stmt->fetch(PDO::FETCH_ASSOC);

                    if ($vprofile) {
                        // If found in VPROFILE_TABLE, check VOLUNTEERS_TBL
                        $stmt = $db->prepare('SELECT * FROM VOLUNTEERS_TBL WHERE EMAIL = :email');
                        $stmt->execute(['email' => $email]);
                        $volunteer = $stmt->fetch(PDO::FETCH_ASSOC);

                        if ($volunteer) {
                            return $volunteer; // Return volunteer data if found
                        } else {
                            return $vprofile; // Return VPROFILE data if no volunteer record exists
                        }
                    }
                    return []; // Return empty array if email not found in VPROFILE_TABLE

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
            return $stmt->fetch(PDO::FETCH_ASSOC) ?: []; // Return data or empty array

        } catch (PDOException $e) {
            error_log("Database error in SidebarInfo: " . $e->getMessage());
            return [];
        } catch (Exception $e) {
            error_log("General error in SidebarInfo: " . $e->getMessage());
            return [];
        }
    }
}
