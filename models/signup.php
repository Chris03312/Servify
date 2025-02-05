<?php 

require_once __DIR__ . '/../configuration/Database.php';


class Signup {

    public static function barangays($city = null) {
        try {
            $db = Database::getConnection();
            
            // Modify query to optionally filter barangays by city
            $query = 'SELECT DISTINCT BARANGAY_NAME, `MUNICIPALITY/CITY` FROM PRECINCT_TABLE';
            if ($city) {
                $query .= ' WHERE MUNICIPALITY/CITY = :city';
            }
            
            $stmt = $db->prepare($query);
            if ($city) {
                $stmt->bindParam(':city', $city);
            }
            $stmt->execute();
            
            $barangays = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $barangays;
        } catch (PDOException $e) {
            error_log('Error: BARANGAYS ' . $e->getMessage());
            return [];  // Return an empty array on error
        }
    }
    
    public static function cities() {
        try {
            $db = Database::getConnection();
            $stmt = $db->prepare('SELECT DISTINCT `MUNICIPALITY/CITY` FROM PRECINCT_TABLE');
            $stmt->execute();
            $cities = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $cities;
        } catch (PDOException $e) {
            error_log('Error: CITIES ' . $e->getMessage());
            return [];  // Return an empty array on error
        }
    }

}