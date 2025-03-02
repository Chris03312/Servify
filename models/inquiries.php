<?php

require_once __DIR__ . '/../configuration/Database.php'; // Adjust if needed

class Inquiry
{
    public static function getAllInquiries()
    {
        // Get the database connection
        $db = Database::getConnection();

        // Query to get all the inquiries
        $stmt = $db->prepare('SELECT * FROM contact_us ORDER BY created_at DESC');
        $stmt->execute();

        // Fetch all inquiries
        $inquiries = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $inquiries; // Return the fetched inquiries
    }
}
