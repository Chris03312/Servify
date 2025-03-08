<?php

require_once __DIR__ . '/../../models/VolunteerManagement.php';
require_once __DIR__ . '/../../models/Sidebarinfo.php';

class RenewalSubmissionsController
{

    public static function ShowRenewalSubmissions()
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



        // Check if the "Save" button was clicked
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['saveRenewalDate'])) {
            self::SetRenewalPeriod();
        }

        $sidebarData = SidebarInfo::getSidebarInfo($email, $role);
        view('Coordinator/renewals_submission', [
            'session_id' => $session_id,
            'coordinator_info' => $sidebarData
        ]);
    }




    public static function SetRenewalPeriod()
    {
        require_once __DIR__ . '/../../configuration/database.php'; // Ensure correct path

        $conn = Database::getConnection(); // Get PDO connection

        $renewal_from = $_POST['renewal_from'] ?? '';
        $renewal_to = $_POST['renewal_to'] ?? '';

        // Convert string dates to DateTime objects for accurate comparison
        $fromDate = DateTime::createFromFormat('F j, Y', $renewal_from);
        $toDate = DateTime::createFromFormat('F j, Y', $renewal_to);

        // Validate input
        if (empty($renewal_from) || empty($renewal_to)) {
            $_SESSION['error'] = "Both dates are required.";
            $token = isset($_GET['token']) ? urlencode($_GET['token']) : '';
            redirect('/renewals_submission?token=' . $token);
            exit();
        }
        if (!$fromDate || !$toDate) {
            $_SESSION['error'] = "Invalid date format. Please select valid dates.";
            $token = isset($_GET['token']) ? urlencode($_GET['token']) : '';
            redirect('/renewals_submission?token=' . $token);
            exit();
        }

        // Ensure "renewal_from" is not later than "renewal_to"
        if ($fromDate > $toDate) {
            $_SESSION['error'] = "Start date cannot be later than end date.";
            $token = isset($_GET['token']) ? urlencode($_GET['token']) : '';
            redirect('/renewals_submission?token=' . $token);
            exit();
        }


        try {
            // Check if a renewal period already exists
            $stmt = $conn->query("SELECT COUNT(*) FROM events");
            $count = $stmt->fetchColumn(); // Fetch the count

            if ($count > 0) {
                // Update existing renewal period
                $updateQuery = "UPDATE events SET renewal_from = :renewal_from, renewal_to = :renewal_to WHERE event_id = 1";
                $stmt = $conn->prepare($updateQuery);
            } else {
                // Insert new renewal period
                $insertQuery = "INSERT INTO events (renewal_from, renewal_to) VALUES (:renewal_from, :renewal_to)";
                $stmt = $conn->prepare($insertQuery);
            }

            // Bind parameters
            $stmt->bindParam(':renewal_from', $renewal_from);
            $stmt->bindParam(':renewal_to', $renewal_to);

            // Execute the query
            if ($stmt->execute()) {
                $_SESSION['success'] = "Renewal period has been set successfully!";
            } else {
                $_SESSION['error'] = "Failed to set renewal period. Please try again.";
            }
        } catch (PDOException $e) {
            $_SESSION['error'] = "Database error: " . $e->getMessage();
        }

        $token = isset($_GET['token']) ? urlencode($_GET['token']) : '';
        redirect('/renewals_submission?token=' . $token);
        exit();
    }
}
