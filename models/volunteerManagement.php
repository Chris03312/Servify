<?php 

require_once __DIR__ . '/../configuration/Database.php';

class VolunteerManagement {

    public static function DistrictList() {
        try {

            $db = Database::getConnection();

            $stmt  = $db->prepare('SELECT DISTINCT DISTRICT FROM PRECINCT_TABLE');
            $stmt->execute();
            $districts = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $districts;
        }catch (PDOException $e) {
            error_log('Error in getting Barangay List');
        }
    }
}