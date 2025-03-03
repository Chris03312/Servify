<?php

require_once __DIR__ . '/../configuration/Database.php';

class CoordinatorDetails
{
    public static function ViewCoordinatorDetails($coordinator_id)
    {
        try {
            $db = Database::getConnection();

            $stmt = $db->prepare('SELECT * FROM CPROFILE_TABLE WHERE CPROFILE_ID = :coordinator_id');
            $stmt->execute(['coordinator_id' => $coordinator_id]);

            $coordinator = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$coordinator) {
                error_log("No coordinator found with ID: " . $coordinator_id);
                return null; // Return null if no data found
            }

            return $coordinator;
        } catch (PDOException $e) {
            error_log('Error in viewing the Coordinator Details: ' . $e->getMessage());
            return null;
        }
    }

}