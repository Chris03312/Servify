<?php

require_once __DIR__ . '/../configuration/Database.php';

class ContactUsController
{

    public static function ShowContactUs()
    {
        view('contact_us');
    }
    public static function ContactUs()
    {

        try {
            $db = Database::getConnection();

            $subject = $_POST['subject'];
            $message = $_POST['message'];
            $email = $_SESSION['email'];
            $stmt = $db->prepare('INSERT INTO contact_us (subject, message, email) VALUES (:subject, :message, :email)');

            $stmt->execute([
                ':subject' => $subject,
                ':message' => $message,
                ':email' => $email
            ]);
            return true;
        } catch (PDOException $e) {
            error_log("Save message error: " . $e->getMessage());
            return false;
        }
    }
}