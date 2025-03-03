<?php
require_once __DIR__ . '/../configuration/Database.php';

class VolunteerModel
{
    private static $conn;

    // Get the database connection
    private static function getConnection()
    {
        if (!self::$conn) {
            self::$conn = Database::getConnection(); // Ensure Database.php has a getConnection() method
        }
        return self::$conn;
    }

    // Fetch all volunteers
    public static function getAllVolunteers()
    {
        $conn = self::getConnection();
        $sql = "SELECT VOLUNTEERS_ID, FIRST_NAME, SURNAME, EMAIL, CITY, DISTRICT, PARISH FROM VOLUNTEERS_TBL";

        $stmt = $conn->prepare($sql); // ✅ Use `prepare()` instead of `query()`
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC); // ✅ Correct PDO syntax
    }

    public static function getRequestingApproval()
    {

        $conn = self::getConnection();
        $sql = ' 
        SELECT ai.*, aai.*
            FROM APPLICATION_INFO ai
            INNER JOIN APPLICATION_ADD_INFO aai
                ON ai.APPLICATION_ID = aai.APPLICATION_ADD_ID
            WHERE ai.status = :status';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['status' => 'Requesting for Approval']);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>