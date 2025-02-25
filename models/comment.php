<?php
require_once __DIR__ . '/../configuration/Database.php';
class Comment
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Method to create a new comment in the database
    public function createComment($announcementId, $authorId, $content)
    {
        try {
            $sql = "INSERT INTO comments (announcement_id, content) 
                    VALUES (:announcement_id, :author_id, :content)";
            $stmt = $this->pdo->prepare($sql);
            
            // Bind values to the SQL query
            $stmt->bindParam(':announcement_id', $announcementId);
            $stmt->bindParam(':author_id', $authorId);
            $stmt->bindParam(':content', $content);

            // Execute the query and return the result
            if ($stmt->execute()) {
                return true;
            } else {
                throw new Exception("Failed to insert comment into the database.");
            }
        } catch (Exception $e) {
            error_log("Error in createComment: " . $e->getMessage());
            return false;
        }
    }

    // Method to get all comments for a specific announcement
    public function getCommentsWithAnnouncement($announcementId)
    {
        try {
            $sql = "SELECT * FROM comments WHERE announcement_id = :announcement_id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':announcement_id', $announcementId);
            
            $stmt->execute();
            
            // Fetch all the comments as an associative array
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Error in getCommentsWithAnnouncement: " . $e->getMessage());
            return [];
        }
    }
}


