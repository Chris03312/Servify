<?php

require_once __DIR__ . '/../../configuration/Database.php';

class ContactUsController
{

    public static function ShowContactUs()
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

        view('Volunteer/contact_us', [
            'sidebarinfo' => $sidebarData
        ]);
    }
    public static function ContactUs()
    {

        try {
            $db = Database::getConnection();

            $name = $_POST['name'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];
            $email = $_SESSION['email'];
            $stmt = $db->prepare('INSERT INTO contact_us (name, subject, message, email) VALUES (:name, :subject, :message, :email)');

            $stmt->execute([
                ':name' => $name,
                ':subject' => $subject,
                ':message' => $message,
                ':email' => $email
            ]);

            redirect('/ContactUs');

            return true;

        } catch (PDOException $e) {
            error_log("Save message error: " . $e->getMessage());
            return false;
        }
    }
}