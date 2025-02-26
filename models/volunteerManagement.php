<?php
// district
require_once __DIR__ . '/../configuration/Database.php';

class VolunteerManagement {

    public static function getCityList() {
        try {
            // Get the database connection
            $db = Database::getConnection();

            // Fetch distinct districts where the column is not NULL
            $stmt = $db->prepare('SELECT DISTINCT `MUNICIPALITY/CITY` FROM PRECINCT_TABLE');
            $stmt->execute();
            $Cities = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // If no districts are found, return an empty array
            if (empty($Cities)) {
                return [];
            }

            // Generate links for each district
            $Citylinks = [];
            foreach ($Cities as $city) {
                $CityName = $city['MUNICIPALITY/CITY'];
                $Citylinks[] = [
                    'name' => $CityName,
                    'link' => '/district_volunteer_directory?City=' . urlencode($CityName),
                ];
            }

            // Return the district links
            return $Citylinks;

        } catch (PDOException $e) {
            // Log the error
            error_log('Error in getting City List: ' . $e->getMessage());
            return [];
        }
    }

    public static function getDistrictDirectory($city) {
        try {
            $db = Database::getConnection();
    
            // Start with the base query
            $query = 'SELECT DISTINCT DISTRICT FROM PRECINCT_TABLE';
    
            // If a city is provided, add a WHERE clause to filter by city
            if ($city) {
                $query .= ' WHERE `MUNICIPALITY/CITY` = :city';
            }
    
            // Prepare the SQL statement
            $stmt = $db->prepare($query);
    
            // Execute the query, passing the city parameter if it's set
            if ($city) {
                $stmt->execute([':city' => $city]);
            } else {
                $stmt->execute(); // Execute without parameters if no city is provided
            }
    
            // Fetch the result as an associative array
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
                    'link' => '/barangay_volunteer_directory?City=' . urlencode($city) . '&District=' . urlencode($districtName)
                ];
            }
    
            // Return the district links
            return $districtLinks;
    
        } catch (PDOException $e) {
            // Log any error that occurs while fetching the directory
            error_log('Error in getting the barangay directory: ' . $e->getMessage());
            return [];
        }
    }

    public static function getBarangayDirectory($district, $city) {
        try {
            $db = Database::getConnection();
    
            // Start with the base query
            $query = 'SELECT DISTINCT BARANGAY_NAME FROM PRECINCT_TABLE';

            // Add conditions for district and city if provided
            $conditions = [];
            $params = [];
            
            if ($district) {
                $conditions[] = 'DISTRICT = :district';
                $params[':district'] = $district;
            }
            
            if ($city) {
                $conditions[] = '`MUNICIPALITY/CITY` = :city';  // Ensure column name is correct
                $params[':city'] = $city;
            }
            
            // If there are conditions, append them to the query
            if (!empty($conditions)) {
                $query .= ' WHERE ' . implode(' AND ', $conditions);
            }            
    
            // Prepare the SQL statement
            $stmt = $db->prepare($query);
    
            // Execute the query with the provided parameters
            $stmt->execute($params);
    
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
                    'link' => '/polling_area?City=' . urlencode($city) . '&District=' . urlencode($district) . '&Barangay=' . urlencode($barangayName)
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
    

    public static function getPollingPlace($city, $district, $barangay) {
        try {
            $db = Database::getConnection();

            // Start with the base query
            $query = 'SELECT DISTINCT POLLING_PLACE, BARANGAY_NAME FROM PRECINCT_TABLE';
    
            // If a district is provided, add a WHERE clause to filter by district
            if ($district) {
                $query .= ' WHERE DISTRICT = :district';
            }
            
            // If a barangay is provided, add a WHERE clause to filter by barangay
            if ($barangay) {
                $query .= ' AND BARANGAY_NAME = :barangay';
            }
            if ($barangay) {
                $query .= ' AND `MUNICIPALITY/CITY` = :city';
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
            if ($city) {
                $params[':city'] = $city;
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
                    'link' => '/list_of_volunteer?City='.urlencode($city).'&District=' . urlencode($district) . '&Barangay=' . urlencode($barangayName) . '&PollingPlace=' . urlencode($pollingPlace),
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

    public static function getlistofVolunteer($city, $district, $barangay, $pollingplace) {
        try{
            $db = Database::getConnection();

            $stmt = $db->prepare('SELECT
                m.mission_name,
                COUNT(v.volunteer_id) AS volunteer_count,
                v.*
                FROM VOLUNTEER_TBL AS v
                INNER JOIN MISSION AS m
                ON v.ASSIGNED_MISSION = m.MISSION_NAME
                WHERE DISTRICT = :district AND BARANGAY = :barangay
            ');
            $stmt->execute();
            $listofvolunteers = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $listofvolunteers;
        }catch (PDOException $e) {
            error_log('Error in getting list of volunteer'. $e->getMessage());
        }
    }


    public static function getApplicationByStatus($status) {
        try {
            $db = Database::getConnection();
    
            // Use a prepared statement with a status filter
            $stmt = $db->prepare('SELECT * FROM APPLICATION_INFO WHERE status = :status'); 
            $stmt->execute([':status' => $status]); 
            $applications = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            return $applications; // Return the filtered applications
    
        } catch (PDOException $e) {
            error_log('Error in getting applications: ' . $e->getMessage());
            return []; // Return an empty array on error
        }
    }

    public static function countApplicationsByStatuses(array $statuses) {
        try {
            $db = Database::getConnection();
    
            $counts = [];
            foreach ($statuses as $status) {
                // Use a SQL COUNT query to get the total number of applications with the specified status
                $stmt = $db->prepare('SELECT COUNT(*) as total FROM APPLICATION_INFO WHERE status = :status');
                $stmt->execute([':status' => $status]);
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $counts[$status] = $result['total'];
            }
    
            return $counts; // Return the counts for each status
    
        } catch (PDOException $e) {
            error_log('Error in counting applications: ' . $e->getMessage());
            return []; // Return an empty array on error
        }
    }
    
    public static function deleteApplications($application_id) {
        try {
            $db = Database::getConnection();
            
            // Prepare and execute the delete query
            $stmt = $db->prepare('DELETE FROM APPLICATION_INFO WHERE APPLICATION_ID = :application_id');
            $stmt->execute([':application_id' => $application_id]);

            // Return true if at least one row was affected
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            error_log('Error in deleting application: ' . $e->getMessage());
            return false;
        }
    }

    public static function getParishes() {
        try {
            $db = Database::getConnection();
            $stmt = $db->prepare('SELECT * FROM PARISHES');
            $stmt->execute();
            $parishes = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $parishes;
        }catch (PDOEXception $e) {
            error_log('Error in getting parish: ' . $e->getMessage());
            return [];
        }

    }


}
