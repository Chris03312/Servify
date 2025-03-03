<?php

require_once __DIR__ . '/../../models/Sidebarinfo.php';
require_once __DIR__ . '/../../models/Announcement.php';
require_once __DIR__ . '/../../configuration/Database.php';

class AnnouncementController
{
    public static function ShowAnnouncements()
    {
        session_start();

        // Retrieve the session_id from GET or POST request
        $session_id = $_GET['token'] ?? '';

        // Check if the session exists for the given session_id
        if (!isset($_SESSION['sessions'][$session_id])) {
            redirect('/login');
        }

        // Fetch user session data
        $userSession = $_SESSION['sessions'][$session_id];
        $email = $userSession['email'];
        $role = $userSession['role'];

        $sidebarData = SidebarInfo::getSidebarInfo($email, $role);

        // Fetch announcements and comments
        $notifications = Notification::getNotification($email);
        $announcement = Announcement::getAnnouncement();
        $getComments = Announcement::getComment();

        // Fixed the typo in 'announcements'
        view('Volunteer/announcements', [
            'email' => $email,
            'sidebarinfo' => $sidebarData,
            'announcements' => $announcement, // Fixed the space here
            'comments' => $getComments,
            'notifications' => $notifications['notifications'],  // List of notifications
            'unread_count' => $notifications['unread_count']
        ]);
    }

    // CREATE ANNOUNCEMENT
    public static function CreateAnnouncements()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['post-announcement-btn'])) {
            try {
                $db = Database::getConnection();

                $announcement_recipients = htmlspecialchars($_POST['announcement_recipients'] ?? '');
                $announcement_title = htmlspecialchars($_POST['announcement_title'] ?? '');
                $announcement_content = $_POST['announcement_content']; // Preserve raw HTML

                if (empty($announcement_recipients) || empty($announcement_title)) {
                    throw new Exception("All fields are required.");
                }

                // Check if content is not empty
                if (empty(trim(strip_tags($announcement_content)))) {
                    throw new Exception("Announcement body cannot be empty.");
                }

                $stmt = $db->prepare("INSERT INTO announcements (announcement_recipients, announcement_title, announcement_content, created_at) VALUES (?, ?, ?, NOW())");
                $stmt->execute([$announcement_recipients, $announcement_title, $announcement_content]);

                $_SESSION['success_message'] = "Announcement posted successfully!";
                header('Location: /coordinator_announcements');
                exit;
            } catch (Exception $e) {
                $_SESSION['error_message'] = "Error: " . $e->getMessage();
                header('Location: /coordinator_announcements');
            }
        }
    }

    // UPDATE ANNOUNCEMENT
    public static function UpdateAnnouncements()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit-announcement-btn'])) {
            try {
                $db = Database::getConnection();

                $announcement_id = $_POST['announcement_id'] ?? null;
                $announcement_recipients = htmlspecialchars($_POST['edit_announcement_recipients'] ?? '');
                $announcement_title = htmlspecialchars($_POST['edit_announcement_title'] ?? '');
                $announcement_content = $_POST['edit_announcement_content'] ?? ''; // Preserve HTML

                if (empty($announcement_id) || empty($announcement_recipients) || empty($announcement_title)) {
                    throw new Exception("All fields are required.");
                }

                // Check if content is not empty
                if (empty(trim(strip_tags($announcement_content)))) {
                    throw new Exception("Announcement body cannot be empty.");
                }

                $stmt = $db->prepare("SELECT * FROM announcements WHERE announcement_id = ?");
                $stmt->execute([$announcement_id]);
                $existingAnnouncement = $stmt->fetch(PDO::FETCH_ASSOC);

                if (!$existingAnnouncement) {
                    throw new Exception("Announcement not found.");
                }

                if (
                    $existingAnnouncement['announcement_recipients'] === $announcement_recipients &&
                    $existingAnnouncement['announcement_title'] === $announcement_title &&
                    $existingAnnouncement['announcement_content'] === $announcement_content
                ) {
                    throw new Exception("No changes detected.");
                }

                $stmt = $db->prepare("UPDATE announcements SET 
                    announcement_recipients = ?, 
                    announcement_title = ?, 
                    announcement_content = ?, 
                    WHERE announcement_id = ?");
                $stmt->execute([$announcement_recipients, $announcement_title, $announcement_content, $announcement_id]);

                $_SESSION['success_message'] = "Announcement updated successfully!";
                header('Location: /coordinator_announcements');
                exit;
            } catch (Exception $e) {
                $_SESSION['error_message'] = "Error: " . $e->getMessage();
                header('Location: /coordinator_announcements');
            }
        }
    }

    // DELETE ANNOUNCEMENT
    public static function DeleteAnnouncements()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['del-announcement-btn'])) {
            try {
                $announcement_id = $_POST['announcement_id'] ?? null;
                if (!$announcement_id) {
                    throw new Exception("Announcement ID is missing.");
                }

                $db = Database::getConnection();
                $stmt = $db->prepare("DELETE FROM announcements WHERE announcement_id = ?");
                $stmt->execute([$announcement_id]);

                if ($stmt->rowCount() > 0) {
                    $_SESSION['success_message'] = "Announcement deleted successfully!";
                } else {
                    $_SESSION['error_message'] = "Announcement not found or already deleted.";
                }

                header('Location: /coordinator_announcements');
                exit;
            } catch (Exception $e) {
                $_SESSION['error_message'] = "Error: " . $e->getMessage();
                header('Location: /coordinator_announcements');
            }
        }
    }

    // ADD COMMENTS TO ANNOUNCEMENTS
    public static function AddComment()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (isset($_POST["comment"], $_POST["announcement_id"]) && !empty($_POST["comment"])) {
                $comment = trim($_POST["comment"]);
                $announcement_id = intval($_POST["announcement_id"]);
                $username = $_SESSION["username"] ?? ''; // Ensure username is retrieved

                if (empty($username)) {
                    echo json_encode(["success" => false, "error" => "User not logged in."]);
                    exit;
                }

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

