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
        $sql = "SELECT vprofile_id, first_name, surname, email, city, district, parish FROM vprofile_table";

        $stmt = $conn->prepare($sql); // ✅ Use `prepare()` instead of `query()`
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC); // ✅ Correct PDO syntax
    }


    // Fetch a single volunteer by ID
    public static function getVolunteerById($id)
    {
        $conn = self::getConnection();
        $sql = "SELECT * FROM vprofile_table WHERE vprofile_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}
?>