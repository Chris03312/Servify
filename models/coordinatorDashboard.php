<?php 

require_once __DIR__ . '/../configuration/Database.php';


class CoordinatorDashboard {

    public static function PendingApp() {
        try {
            $status = 'For evaluation';
    
            $db = Database::getConnection();
            
            $stmt = $db->prepare('SELECT COUNT(APPLICATION_ID) AS count FROM APPLICATION_INFO WHERE STATUS = :status');
            $stmt->execute(['status' => $status]);
            $pendingApp = $stmt->fetch(PDO::FETCH_ASSOC);
    
            return $pendingApp['count']; // Return the scalar value directly
        } catch (PDOException $e) {
            error_log('Error in pendingApp: ' . $e->getMessage());
            return 0; // Return a default value in case of error
        }
    }


    public static function getVolunteers($cityFilter = '') {
        // Connect to the database
        $db = Database::getConnection();

        // Base query
        $query = '
            SELECT 
                v.VOLUNTEERS_ID,
                v.PRECINCT_NO,
                v.FIRST_NAME,
                v.MIDDLE_NAME,
                v.SURNAME,
                v.ROLE,
                p.POLLING_PLACE
            FROM 
                VOLUNTEERS_TBL v
            INNER JOIN 
                (
                    SELECT DISTINCT PRECINCT_NO, POLLING_PLACE, `MUNICIPALITY/CITY`
                    FROM PRECINCT_TABLE
                ) p
            ON 
                v.PRECINCT_NO = p.PRECINCT_NO
                AND v.`CITY` = p.`MUNICIPALITY/CITY`';

        // Add WHERE clause if city filter is set
        if ($cityFilter) {
            $query .= ' WHERE p.`MUNICIPALITY/CITY` LIKE :city';
        }

        $stmt = $db->prepare($query);

        // Bind parameter if city filter is set
        if ($cityFilter) {
            $stmt->bindParam(':city', $cityFilter, PDO::PARAM_STR);
        }

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public static function getTotalCities() {
        try {
            $db = Database::getConnection();
    
            // SQL to count each city
            $stmt = $db->prepare('
                SELECT 
                    assigned_polling_place,
                    SUM(CASE WHEN CITY = :caloocanCity THEN 1 ELSE 0 END) AS caloocan_count,
                    SUM(CASE WHEN CITY = :malabonCity THEN 1 ELSE 0 END) AS malabon_count,
                    SUM(CASE WHEN CITY = :navotasCity THEN 1 ELSE 0 END) AS navotas_count
                FROM VOLUNTEERS_TBL
            ');
    
            // Bind the city values
            $stmt->execute([
                ':caloocanCity' => 'Caloocan city',
                ':malabonCity' => 'Malabon city',
                ':navotasCity' => 'Navotas city',
            ]);
    
            $totalCities = $stmt->fetch(PDO::FETCH_ASSOC);
    
            return $totalCities; // Returns an associative array with counts for each city
        } catch (PDOException $e) {
            error_log('Error getting the total cities: ' . $e->getMessage());
            return [];
        }
    }
    
    public static function getDropdownG2() {
        try {
            $db = Database::getConnection();

            // Get distinct cities
            $stmtCity = $db->prepare('SELECT DISTINCT `MUNICIPALITY/CITY` AS city FROM PRECINCT_TABLE');
            $stmtCity->execute();
            $cities = $stmtCity->fetchAll(PDO::FETCH_ASSOC);
    
            // Get distinct districts
            $stmtDistrict = $db->prepare('SELECT DISTINCT DISTRICT AS district FROM PRECINCT_TABLE');
            $stmtDistrict->execute();
            $districts = $stmtDistrict->fetchAll(PDO::FETCH_ASSOC);
    
            // Get distinct barangays
            $stmtBarangay = $db->prepare('SELECT DISTINCT BARANGAY_NAME AS barangay FROM PRECINCT_TABLE');
            $stmtBarangay->execute();
            $barangays = $stmtBarangay->fetchAll(PDO::FETCH_ASSOC);
    
            // Get distinct polling places
            $stmtParish = $db->prepare('SELECT PARISH_NAME AS parish FROM PARISHES');
            $stmtParish->execute();
            $parishes = $stmtParish->fetchAll(PDO::FETCH_ASSOC);

            $stmtPollingPlace = $db->prepare('SELECT DISTINCT POLLING_PLACE AS polling_place FROM PRECINCT_TABLE');
            $stmtPollingPlace->execute();
            $pollingPlaces = $stmtPollingPlace->fetchAll(PDO::FETCH_ASSOC);
    
            return [
                'cities' => $cities,
                'districts' => $districts,
                'barangays' => $barangays,
                'parishes' => $parishes,
                'pollingPlaces' => $pollingPlaces
            ];
        } catch (PDOException $e) {
            error_log('Error getting the filter dropdown for volunteers: ' . $e->getMessage());
            return [];
        }
    }
    

 public static function chartsData() {
    try {
        $db = Database::getConnection();

        // SQL query to count volunteers by polling place
        $query = '
            SELECT 
                p.polling_place, 
                COUNT(v.volunteers_id) AS volunteers
            FROM 
                VOLUNTEERS_TBL AS v
            INNER JOIN 
                PRECINCT_TABLE AS p
            ON 
                v.assigned_polling_place = p.polling_place
            GROUP BY 
                p.polling_place
        ';

        // Prepare and execute the query
        $stmt = $db->prepare($query);
        $stmt->execute();

        // Fetch the results as an associative array
        $chartsData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $chartsData;
    } catch (PDOException $e) {
        // Log the error and return an empty array
        error_log('Error in getting chart data: ' . $e->getMessage());
        return [];
    }
}


}