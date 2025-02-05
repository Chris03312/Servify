<?php
// district
require_once __DIR__ . '/../configuration/Database.php';

class VolunteerManagement {

    public static function DistrictList() {
        try {
            // Get the database connection
            $db = Database::getConnection();

            // Fetch distinct districts where the column is not NULL
            $stmt = $db->prepare('SELECT DISTINCT DISTRICT FROM PRECINCT_TABLE WHERE DISTRICT IS NOT NULL');
            $stmt->execute();
            $districts = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // If no districts are found, return an empty array
            if (empty($districts)) {
                return [];
            }

            // Generate links for each district
            $districtLinks = [];
            foreach ($districts as $district) {
                $districtName = $district['DISTRICT'];
                $districtLinks[] = [
                    'name' => $districtName,
                    'link' => '/barangay_volunteer_directory?District=' . urlencode($districtName),
                ];
            }

            // Return the district links
            return $districtLinks;

        } catch (PDOException $e) {
            // Log the error
            error_log('Error in getting District List: ' . $e->getMessage());
            return [];
        }
    }
}
