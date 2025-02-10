<?php

class AdminDashboard implements DashboardInterface {
    private $db;

    public function __construct(Database $database) {
        $this->db = $database->getConnection(); // Inject the database connection
    }

    public function getVolunteersPerParish() {
        try {
            $stmt = $this->db->prepare('
                SELECT
                    v.VOLUNTEERS_ID,
                    v.ROLE,
                    v.PRECINCT_NO,
                    CONCAT(v.FIRST_NAME, " ", COALESCE(v.MIDDLE_NAME, ""), " ", v.SURNAME) AS VOLUNTEERS_NAME,
                    CONCAT(c.FIRST_NAME, " ", COALESCE(c.MIDDLE_NAME, ""), " ", c.SURNAME) AS CPROFILE_NAME
                FROM VOLUNTEERS_TBL AS v
                INNER JOIN CPROFILE_TABLE AS c 
                ON v.PARISH = c.PARISH
            ');
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Get volunteer per parish error: " . $e->getMessage());
            return [];
        }
    }
}
