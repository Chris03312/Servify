<?php

require_once __DIR__ . '/../../models/VolunteerManagement.php';
require_once __DIR__ . '/../../models/Sidebarinfo.php';



class PendingSubmissionsController
{

    public static function ShowPendingSubmissions()
    {

        $pendingApplications = VolunteerManagement::getApplicationByStatus('Pending');
        $countApplications = VolunteerManagement::countApplicationsByStatuses(['Pending', 'Under review', 'Approved', 'Cancelled']);
        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);

        view('Coordinator/pending_submissions', [
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
            $stmt = $db->prepare('DELETE FROM APPLICATION_INFO WHERE APPLICATION_ID = :application_id');
            $stmt->execute([':application_id' => $application_id]);

            $stmt = $db->prepare('DELETE FROM APPLICATION_ADD_INFO WHERE APPLICATION_ADD_ID = :application_id');
            $stmt->execute([':application_id' => $application_id]);

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

    public static function ReviewApplicationDetails()
    {
        try {
            // Ensure the request is POST and has application_id
            if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['application_id']) || empty($_POST['application_id'])) {
                throw new Exception("Invalid request.");
            }
            $application_id = $_POST['application_id'];

            $_SESSION['application_id'] = $application_id;
            // Redirect after deletion
            redirect('/volunteer_application_details');
        } catch (PDOException $e) {
            error_log('Error deleting application: ' . $e->getMessage());
        } catch (Exception $e) {
            error_log('Validation error: ' . $e->getMessage());
        }
    }

}