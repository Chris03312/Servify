<?php

require_once __DIR__ . '/../configuration/Database.php';

class AdminDirectory {

    public static function getCitiesDirectory() {
        try {
            $db = Database::getConnection();

            $stmt = $db->prepare('SELECT DISTINCT `MUNICIPALITY/CITY` FROM PRECINCT_TABLE');
            $stmt->execute();
            $citiesDirectory = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $citiesDirectory;
        }catch (PDOException $e){
            error_log('Error in getting Cities DIrectory in admin'. $e->getMessage());
        }
    }
}