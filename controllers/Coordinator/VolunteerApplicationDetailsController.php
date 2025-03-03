<?php

require_once __DIR__ . '/../../models/Sidebarinfo.php';
require_once __DIR__ . '/../../models/Application.php';

class VolunteerApplicationDetails
{

    public static function ShowVolunteerApplicationDetails()
    {
        session_start();

        // Retrieve the session_id from GET or POST request
        $session_id = $_GET['token'] ?? '';

        // Check if the session exists for the given session_id
        // if (!isset($_SESSION['sessions'][$session_id])) {
        //     redirect('/login');
        // }

        // Fetch user session data
        $userSession = $_SESSION['sessions'][$session_id];
        $email = $userSession['email'];
        $role = $userSession['role'];

        $application_id = $_POST['application_id'];

        $sidebarData = SidebarInfo::getSidebarInfo($email, $role);
        $applicationDetails = Application::reviewApplicationDetails($application_id);
        $applicationInfo = Application::getinfoApplication($email);

        view('volunteer/volunteer_application_details', [
            'role' => $role,
            'applicationId' => $application_id,
            'applicationInfo' => $applicationInfo,
            'applicationDetails' => $applicationDetails,
            'coordinator_info' => $sidebarData
        ]);
    }

    public static function PendingSubmissionProceed()
    {
        try {
            $db = Database::getConnection();

            // Ensure the request is POST and has application_id
            if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['application_id']) || empty($_POST['application_id'])) {
                throw new Exception("Invalid request.");
            }

            $application_id = $_POST['application_id'];
            $token = $_POST['token'];

            $db->beginTransaction();
            // Correct SQL syntax (fix table name if necessary)
            $stmt = $db->prepare('UPDATE APPLICATION_INFO SET STATUS = :status WHERE APPLICATION_ID = :application_id');
            $stmt->execute([
                ':status' => 'Under Review',
                ':application_id' => $application_id
            ]);

            $db->commit();
            redirect('/under_review_submissions?token=' . urlencode($token));
        } catch (PDOException $e) {
            $db->rollBack();
            error_log('Error deleting application: ' . $e->getMessage());
        } catch (Exception $e) {
            error_log('Validation error: ' . $e->getMessage());
        }
    }

    public static function UnderReviewSubmissionApproved()
    {
        try {

            $db = Database::getConnection();

            // Ensure the request is POST and has application_id
            if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['application_id']) || empty($_POST['application_id'])) {
                throw new Exception("Invalid request.");
            }

            $application_id = $_POST['application_id'];
            $email = $_POST['email'];
            $token = $_POST['token'];

            $db->beginTransaction();

            $selectstmt = $db->prepare('SELECT USERNAME FROM ACCOUNTS WHERE EMAIL = :email');
            $selectstmt->execute([':email' => $email]);
            $selectedAccounts = $selectstmt->fetch(PDO::FETCH_ASSOC);

            $username = $selectedAccounts['USERNAME'];

            // Correct SQL syntax (fix table name if necessary)
            $stmt = $db->prepare('UPDATE APPLICATION_INFO SET STATUS = :status WHERE APPLICATION_ID = :application_id');
            $stmt->execute([
                ':status' => 'Requesting for Approval',
                ':application_id' => $application_id
            ]);

            $description = 'Your application has been approved by your parish coordinator and forwarded to the parish admin for final approval. The process may take up to a day. Please wait for further updates. Check your registration status here: ';
            $created_at = date("F j, Y h:i:s");

            $activity = $db->prepare('INSERT INTO ACTIVITIES (USERNAME, EMAIL, DESCRIPTION, CREATED_AT)
             VALUES (:username, :email, :description, :created_at)');
            $activity->execute([
                ':username' => $username,
                ':email' => $email,
                ':description' => $description,
                ':created_at' => $created_at
            ]);

            $db->commit();
            redirect('/approved_submissions?token=' . urlencode($token));
        } catch (PDOException $e) {
            $db->rollBack();
            error_log('Error deleting application: ' . $e->getMessage());
        } catch (Exception $e) {
            error_log('Validation error: ' . $e->getMessage());
        }
    }
}