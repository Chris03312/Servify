<?php

require_once __DIR__ . '/../configuration/Database.php';

class AdminDirectory
{

    public static function getCitiesDirectory($session_id)
    {
        try {
            $db = Database::getConnection();

            // Fetch all distinct cities from PRECINCT_TABLE
            $stmt = $db->prepare("SELECT DISTINCT `MUNICIPALITY/CITY` AS CityName FROM PRECINCT_TABLE");
            $stmt->execute();
            $citiesDirectories = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (empty($citiesDirectories)) {
                return [];
            }

            $citiesDirectory = [];
            foreach ($citiesDirectories as $city) {
                $CityName = $city['CityName'];

                // Get count of coordinators for the current city
                $countStmt = $db->prepare("SELECT COUNT(CPROFILE_ID) AS coordinator_count FROM CPROFILE_TABLE WHERE `MUNICIPALITY/CITY` = :city");
                $countStmt->execute([':city' => $CityName]);
                $countResult = $countStmt->fetch(PDO::FETCH_ASSOC);

                $citiesDirectory[] = [
                    'name' => $CityName,
                    'coordinator_count' => $countResult['coordinator_count'] ?? 0, // Default to 0 if NULL
                    'link' => '/cities_directory?token=' . urlencode($session_id) . '&City=' . urlencode($CityName),
                ];
            }

            return $citiesDirectory;
        } catch (PDOException $e) {
            error_log('Error in getting Cities Directory in admin: ' . $e->getMessage());
            return []; // Return empty array to prevent UI errors
        }
    }


    public static function getParish($City)
    {
        try {
            $db = Database::getConnection();

            $stmt = $db->prepare("
                SELECT 
                    p.*, 
                    COALESCE(CONCAT(c.FIRST_NAME, ' ', c.SURNAME), 'No Coordinator Assigned') AS CNAME,
                    COALESCE(c.PRECINCT_NO, 'No Precinct Assigned') AS PRECINCT
                FROM PARISHES AS p
                LEFT JOIN CPROFILE_TABLE AS c 
                    ON p.PARISH_NAME = c.PARISH
                WHERE p.CITY = :city            
            ");
            $stmt->execute([':city' => $City]);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            error_log("Error in getting the parish coordinator list: " . $e->getMessage());
            return []; // Return an empty array to avoid breaking the UI
        }
    }


}