<?php 

require_once __DIR__ . '/../configuration/Database.php';


class Signup {

    public static function barangays($city = null) {
        try {
            $db = Database::getConnection();
            
            // Modify query to optionally filter barangays by city
            $query = 'SELECT BARANGAY_NAME, MUNICIPALITY FROM BARANGAYS';
            if ($city) {
                $query .= ' WHERE MUNICIPALITY = :city';
            }
            
            $stmt = $db->prepare($query);
            if ($city) {
                $stmt->bindParam(':city', $city);
            }
            $stmt->execute();
            
            $barangays = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $barangays;
        } catch (PDOException $e) {
            error_log('Error: ' . $e->getMessage());
            return [];  // Return an empty array on error
        }
    }
    
    public static function cities() {
        try {
            $db = Database::getConnection();
            $stmt = $db->prepare('SELECT DISTINCT MUNICIPALITY FROM BARANGAYS');
            $stmt->execute();
            $cities = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $cities;
        } catch (PDOException $e) {
            error_log('Error: ' . $e->getMessage());
            return [];  // Return an empty array on error
        }
    }

}