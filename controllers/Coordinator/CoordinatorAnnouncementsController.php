<?php
require_once __DIR__ . '/../../models/Sidebarinfo.php';
class CoordinatorAnnouncementsController
{


    // SHOWING ANNOUNCEMENT PAGE
    public static function ShowAnnouncements()
    {

        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);

        view('Coordinator/coordinator_announcements', [
            'coordinator_info' => $sidebarData
        ]);
    }
    // CREATING ANNOUNCEMENTS
    public static function ShowCreateAnnouncements()
    {
        require_once __DIR__ . '/../../configuration/database.php';


        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['post-announcement-btn'])) {
            try {
                // Connect to the database
                $db = Database::getConnection();

                // Retrieve and sanitize inputs
                $announcement_author = htmlspecialchars($_POST['announcement_author'] ?? '');
                $announcement_recipients = htmlspecialchars($_POST['announcement_recipients'] ?? '');
                $announcement_title = htmlspecialchars($_POST['announcement_title'] ?? '');
                $announcement_content = $_POST['announcement_content']; // Preserve raw HTML

                // Validate required fields
                if (empty($announcement_recipients) || empty($announcement_title)) {
                    throw new Exception("All fields are required.");
                }

                // Ensure announcement_content is not empty
                if (empty(trim(strip_tags($announcement_content)))) {
                    throw new Exception("Announcement body cannot be empty.");
                }

                // Prepare SQL statement
                $stmt = $db->prepare("INSERT INTO announcements (announcement_author, announcement_recipients, announcement_title, announcement_content, created_at) VALUES (?, ?, ?, ?, NOW())");

                // Execute query
                $stmt->execute([$announcement_author, $announcement_recipients, $announcement_title, $announcement_content]);

                // Success message
                $_SESSION['success_message'] = "Announcement posted successfully!";
                header('Location: /coordinator_announcements');
                exit;
            } catch (Exception $e) {
                $_SESSION['error_message'] = "Error: " . $e->getMessage();
                header('Location: /coordinator_announcements');
            }
        }
    }




    // UPDATING ANNOUNCEMENTS
    public static function ShowUpdateAnnouncements()
    {
        require_once __DIR__ . '/../../configuration/Database.php';

        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit-announcement-btn'])) {
            try {
                // Connect to the database
                $db = Database::getConnection();

                // Retrieve and sanitize inputs
                $announcement_id = $_POST['announcement_id'] ?? null;
                $announcement_author = htmlspecialchars($_POST['edit_announcement_author'] ?? '');
                $announcement_recipients = htmlspecialchars($_POST['edit_announcement_recipients'] ?? '');
                $announcement_title = htmlspecialchars($_POST['edit_announcement_title'] ?? '');
                $announcement_content = $_POST['edit_announcement_content'] ?? ''; // Preserve HTML

                // Validate required fields
                if (empty($announcement_id) || empty($announcement_recipients) || empty($announcement_title)) {
                    throw new Exception("All fields are required.");
                }

                // Ensure announcement_content is not empty
                if (empty(trim(strip_tags($announcement_content)))) {
                    throw new Exception("Announcement body cannot be empty.");
                }

                // Fetch current data to check if there are changes
                $stmt = $db->prepare("SELECT * FROM announcements WHERE announcement_id = ?");
                $stmt->execute([$announcement_id]);
                $existingAnnouncement = $stmt->fetch(PDO::FETCH_ASSOC);

                if (!$existingAnnouncement) {
                    throw new Exception("Announcement not found.");
                }

                // Check if values have changed
                if (
                    $existingAnnouncement['announcement_author'] === $announcement_author &&
                    $existingAnnouncement['announcement_recipients'] === $announcement_recipients &&
                    $existingAnnouncement['announcement_title'] === $announcement_title &&
                    $existingAnnouncement['announcement_content'] === $announcement_content
                ) {
                    throw new Exception("No changes detected.");
                }

                // Prepare SQL statement for update
                $stmt = $db->prepare("UPDATE announcements SET 
                    announcement_author = ?,
                    announcement_recipients = ?, 
                    announcement_title = ?, 
                    announcement_content = ? 
                    WHERE announcement_id = ?");

                // Execute query
                $stmt->execute([$announcement_author, $announcement_recipients, $announcement_title, $announcement_content, $announcement_id]);

                // Success message
                $_SESSION['success_message'] = "Announcement updated successfully!";
                header('Location: /coordinator_announcements');
                exit;
            } catch (Exception $e) {
                $_SESSION['error_message'] = "Error: " . $e->getMessage();
                header('Location: /coordinator_announcements');
            }
        }
    }



    // DELETING ANNOUNCEMENTS
    public static function ShowDeleteAnnouncements()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['del-announcement-btn'])) {
            try {
                // Get the announcement ID to delete
                $announcement_id = $_POST['announcement_id'] ?? null;
                if (!$announcement_id) {
                    throw new Exception("Announcement ID is missing.");
                }

                // Connect to the database
                $db = Database::getConnection();

                // Prepare SQL statement to delete the announcement
                $stmt = $db->prepare("DELETE FROM announcements WHERE announcement_id = ?");
                $stmt->execute([$announcement_id]);

                // Check if any row was affected
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
}
