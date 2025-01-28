<?php 
// barangay
require_once __DIR__ . '/../configuration/Database.php';

class BarangayVolunteerDirectory {

    public static function getBarangayDirectory($district) {
        try {
            $db = Database::getConnection();
    
            // Start with the base query
            $query = 'SELECT DISTINCT BARANGAY_NAME FROM PRECINCT_TABLE';
    
            // If a district is provided, add a WHERE clause to filter by district
            if ($district) {
                $query .= ' WHERE DISTRICT = :district';
            }
    
            // Prepare the SQL statement
            $stmt = $db->prepare($query);
    
            // Execute the query, passing the district parameter if it's set
            if ($district) {
                $stmt->execute([':district' => $district]);
            } else {
                $stmt->execute(); // Execute without parameters if no district is provided
            }
    
            // Fetch the result as an associative array
            $barangayDirectory = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            // If no barangays are found, return an empty array
            if (empty($barangayDirectory)) {
                return [];
            }
    
            // Generate links for each barangay
            $barangayLinks = [];
            foreach ($barangayDirectory as $barangay) {
                $barangayName = $barangay['BARANGAY_NAME'];
                $barangayLinks[] = [
                    'name' => $barangayName,
                    'link' => '/polling_area?District=' . urlencode($district) . '&Barangay='. urlencode($barangayName)
                ];
            }
    
            // Return the barangay links
            return $barangayLinks;
    
        } catch (PDOException $e) {
            // Log any error that occurs while fetching the directory
            error_log('Error in getting the barangay directory: ' . $e->getMessage());
            return [];
        }
    }
    
}
