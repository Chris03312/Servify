<?php

require_once __DIR__ . '/../../models/VolunteerManagement.php';
require_once __DIR__ . '/../../models/Sidebarinfo.php';

class PendingSubmissionsController
{

    public static function ShowPendingSubmissions()
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
        $pendingApplications = VolunteerManagement::getApplicationByStatus('Pending');
        $countApplications = VolunteerManagement::countApplicationsByStatuses(['Pending', 'Under review', 'Approved', 'Cancelled', 'Requesting for Approval']);

        view('Coordinator/pending_submissions', [
            'session_id' => $session_id,
            'pendingApplications' => $pendingApplications,
            'pendingCount' => $countApplications['Pending'] ?? 0,
            'underReviewCount' => $countApplications['Under review'] ?? 0,
            'approvedCount' => $countApplications['Approved'] ?? 0,
            'cancelledCount' => $countApplications['Cancelled'] ?? 0,
            'coordinator_info' => $sidebarData
        ]);
    }

    public static function deletePendingSubmissions()
    {
        try {
            $db = Database::getConnection();

            // Ensure the request is POST and has application_id
            if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['application_id']) || empty($_POST['application_id'])) {
                throw new Exception("Invalid request.");
            }

            $application_id = $_POST['application_id'];

            $db->beginTransaction();
            // Correct SQL syntax (fix table name if necessary)
            $stmt = $db->prepare('UPDATE APPLICATION_INFO SET STATUS = :status WHERE APPLICATION_ID = :application_id');
            $stmt->execute([
                ':status' => 'Reject',
                ':application_id' => $application_id
            ]);

            // Commit the transaction
            $db->commit();

            // Redirect after deletion
            redirect('/pending_submissions');
        } catch (PDOException $e) {
            $db->rollBack();
            error_log('Error deleting application: ' . $e->getMessage());
        } catch (Exception $e) {
            error_log('Validation error: ' . $e->getMessage());
        }
    }


}