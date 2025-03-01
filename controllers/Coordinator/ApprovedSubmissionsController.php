<?php

require_once __DIR__ . '/../../models/VolunteerManagement.php';
require_once __DIR__ . '/../../models/Sidebarinfo.php';


class ApprovedSubmissionsController
{

    public static function ShowApprovedSubmissions()
    {

        $approvedApplications = VolunteerManagement::getApplicationByStatus(['Requesting for Approval', 'Approved']);
        $countApplications = VolunteerManagement::countApplicationsByStatuses(['Pending', 'Under review', 'Approved', 'Cancelled', 'Requesting for Approval']);
        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);

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
            $stmt = $db->prepare('UPDATE APPLICATION_INFO SET STATUS = :status WHERE APPLICATION_ID = :application_id');
            $stmt->execute([
                ':status' => 'Request for Approval',
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


}