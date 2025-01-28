<?php
// polling area
class PollingAreaDirectory {

    public static function getPollingPlace($district, $barangay) {
        try {
            $db = Database::getConnection();
    
            // Start with the base query
            $query = 'SELECT DISTINCT DISTINCT POLLING_PLACE, BARANGAY_NAME FROM PRECINCT_TABLE';
    
            // If a district is provided, add a WHERE clause to filter by district
            if ($district) {
                $query .= ' WHERE DISTRICT = :district';
            }
            
            // If a barangay is provided, add a WHERE clause to filter by barangay
            if ($barangay) {
                $query .= ' AND BARANGAY_NAME = :barangay';
            }
    
            // Prepare the SQL statement
            $stmt = $db->prepare($query);
    
            // Execute the query, passing the district and barangay parameters if they are set
            $params = [];
            if ($district) {
                $params[':district'] = $district;
            }
            if ($barangay) {
                $params[':barangay'] = $barangay;
            }
            $stmt->execute($params);
    
            // Fetch the result as an associative array
            $barangayDirectory = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            // If no barangays are found, return an empty array
            if (empty($barangayDirectory)) {
                return [];
            }
    
            // Generate links for each barangay
            $pollingLinks = [];
            foreach ($barangayDirectory as $barangay) {
                $barangayName = $barangay['BARANGAY_NAME'];
                $pollingPlace = $barangay['POLLING_PLACE']; // Fetch polling place here
                $pollingLinks[] = [
                    'name' => $pollingPlace,
                    'link' => '/list_of_volunteer?District=' . urlencode($district) . '&Barangay=' . urlencode($barangayName) . '&PollingPlace=' . urlencode($pollingPlace),
                ];
            }
    
            $stmt = $db->prepare('SELECT FROM');
            // Return the barangay links
            return $pollingLinks;
    
        } catch (PDOException $e) {
            // Log any error that occurs while fetching the directory
            error_log('Error in getting the barangay directory: ' . $e->getMessage());
            return [];
        }
    }
}