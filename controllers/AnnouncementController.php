<?php

require_once __DIR__ . '/../configuration/Database.php';
require_once __DIR__ . '/../models/announcement.php';

class AnnouncementController
{

    public static function ShowAnnouncements()
    {

        $announcements = Announcement::getAnnouncement();
        $comments = Announcement::getComment();

        view('Announcements', [
            'announcements' => $announcements,
            'comments' => $comments
        ]);
    }

    public static function Comments()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (isset($_POST["comment"], $_POST["announcement_id"]) && !empty($_POST["comment"])) {
                $comment = trim($_POST["comment"]);
                $announcement_id = intval($_POST["announcement_id"]);
                $username = $_SESSION["username"] ?? 0; // Ensure user ID is retrieved

                try {
                    $db = Database::getConnection();
                    $stmt = $db->prepare("INSERT INTO comments (announcement_id, username, content) VALUES (?, ?, ?)");
                    $stmt->execute([$announcement_id, $username, $comment]);

                    // Return success response
                    echo json_encode(["success" => true, "message" => "Comment submitted successfully."]);
                    exit;
                } catch (PDOException $e) {
                    echo json_encode(["success" => false, "error" => $e->getMessage()]);
                    exit;
                }
            } else {
                echo json_encode(["success" => false, "error" => "Invalid input."]);
                exit;
            }
        } else {
            echo json_encode(["success" => false, "error" => "Invalid request method."]);
            exit;
        }
    }
}







