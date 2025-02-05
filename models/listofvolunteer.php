<?php 

class Listofvolunteer {

    public static function gelistofVolunteer() {
        try{
            $db = Database::getConnection();

            $stmt = $db->prepare('SELECT
                m.mission_name,
                COUNT(v.volunteer_id) AS volunteer_count,
                v.*
                FROM VOLUNTEER_TBL AS v
                INNER JOIN MISSION AS m
                ON v.ASSIGNED_MISSION = m.MISSION_NAME
            ');
            $stmt->execute();
            $listofvolunteers = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $listofvolunteers;
        }catch (PDOException $e) {
            error_log('Error in getting list of volunteer'. $e->getMessage());
        }
    }
}