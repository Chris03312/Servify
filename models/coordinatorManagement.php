<?php

require_once __DIR__ . '/../configuration/Database.php';

class CoordinatorManagement {

    public static function getCoordinatorManagement() {
        try {

            $db = Database::getConnection();

            $stmt = $db->prepare('SELECT * FROM CPROFILE_TABLE');
            $stmt->execute();
            $coordinatorManagement = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $coordinatorManagement;
        }catch (PDOException $e) {
            error_log('Error in getting coordinator management data'. $e->getMessage());
        }

    }
}