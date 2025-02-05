<?php
require_once __DIR__ . '/../configuration/Database.php';
require_once __DIR__ . '/../models/Comment.php';

class CommentController
{
    public function Comment() {
        echo "This is the comment method.";
    }
    private $commentModel;

    public function __construct($pdo)
    {
        if (!$pdo) {
            die(json_encode(['status' => 'error', 'message' => 'Database connection failed']));
        }
        $this->commentModel = new Comment($pdo);
    }

    // Method to fetch comments for a specific announcement
    public function getComments($announcementId)
    {
        header('Content-Type: application/json');

        if (!empty($announcementId)) {
            $commentsWithAnnouncement = $this->commentModel->getCommentsWithAnnouncement($announcementId);
            echo json_encode(['status' => 'success', 'data' => $commentsWithAnnouncement]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Announcement ID is required']);
        }
    }

    // Method to submit a new comment
    public function submitComment()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $announcementId = $_POST['announcement_id'] ?? null;
                $authorId = $_POST['author_id'] ?? null;
                $content = $_POST['comment'] ?? null;

                // Check if all fields are provided
                if (!empty($announcementId) && !empty($authorId) && !empty($content)) {
                    $result = $this->commentModel->createComment($announcementId, $authorId, $content);

                    if ($result) {
                        echo json_encode(['status' => 'success', 'message' => 'Comment submitted successfully']);
                    } else {
                        throw new Exception("Failed to insert comment into the database.");
                    }
                } else {
                    throw new Exception("All fields are required.");
                }
            }
        } catch (Exception $e) {
            error_log("Comment submission error: " . $e->getMessage());
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
