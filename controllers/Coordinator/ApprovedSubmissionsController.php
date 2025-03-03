<?php

require_once __DIR__ . '/../../models/VolunteerManagement.php';
require_once __DIR__ . '/../../models/Sidebarinfo.php';


class ApprovedSubmissionsController
{

    public static function ShowApprovedSubmissions()
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
        $approvedApplications = VolunteerManagement::getApplicationByStatus(['Requesting for Approval', 'Approved']);
        $countApplications = VolunteerManagement::countApplicationsByStatuses(['Pending', 'Under review', 'Approved', 'Cancelled', 'Requesting for Approval']);

        view('Coordinator/approved_submissions', [
            'approvedApplications' => $approvedApplications,
            'pendingCount' => $countApplications['Pending'] ?? 0,
            'underReviewCount' => $countApplications['Under review'] ?? 0,
            'approvedCount' => $countApplications['Approved'] ?? 0,
            'cancelledCount' => $countApplications['Cancelled'] ?? 0,
            'coordinator_info' => $sidebarData

        ]);
    }

    public static function RequestApprovalSubmissions()
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
            $stmt = $db->prepare('UPDATE APPLICATION_INFO SET STATUS = :status, REMARKS = :remarks WHERE APPLICATION_ID = :application_id');
            $stmt->execute([
                ':status' => 'Request for Approval',
                ':remarks' => 'Waiting for Approval',
                ':application_id' => $application_id
            ]);

            $db->commit();
            redirect('/approved_submissions');
        } catch (PDOException $e) {
            $db->rollBack();
            error_log('Error deleting application: ' . $e->getMessage());
        } catch (Exception $e) {
            error_log('Validation error: ' . $e->getMessage());
        }
    }

    public static function updateRemarks()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $applicationId = $_POST['application_id'] ?? null;
            $remarks = $_POST['remarks'] ?? '';

            if (!$applicationId || empty($remarks)) {
                echo json_encode(['error' => 'Invalid data received.']);
                exit;
            }

            // Update remarks in the database
            $db = Database::getConnection();
            $stmt = $db->prepare("UPDATE APPLICATION_INFO SET REMARKS = :remarks WHERE APPLICATION_ID = :application_id");
            $result = $stmt->execute([
                ':remarks' => $remarks,
                ':application_id' => $applicationId
            ]);

            if ($result) {
                echo json_encode(['message' => 'Remarks updated successfully!', 'redirect' => '/approved_submissions']);
            } else {
                echo json_encode(['error' => 'Failed to update remarks']);
            }
            exit;
        }
    }


}