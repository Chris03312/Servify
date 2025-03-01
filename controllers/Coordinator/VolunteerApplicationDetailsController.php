<?php

require_once __DIR__ . '/../../models/Sidebarinfo.php';
require_once __DIR__ . '/../../models/Application.php';

class VolunteerApplicationDetails
{

    public static function ShowVolunteerApplicationDetails()
    {

        $application_id = $_POST['application_id'];

        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);
        $applicationDetails = Application::reviewApplicationDetails($application_id);
        $applicationInfo = Application::getinfoApplication();

        view('volunteer/volunteer_application_details', [
            'role' => $_SESSION['role'],
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

            $db->beginTransaction();
            // Correct SQL syntax (fix table name if necessary)
            $stmt = $db->prepare('UPDATE APPLICATION_INFO SET STATUS = :status WHERE APPLICATION_ID = :application_id');
            $stmt->execute([
                ':status' => 'Under Review',
                ':application_id' => $application_id
            ]);

            $db->commit();
            redirect('/under_review_submissions');
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

            $db->beginTransaction();
            // Correct SQL syntax (fix table name if necessary)
            $stmt = $db->prepare('UPDATE APPLICATION_INFO SET STATUS = :status WHERE APPLICATION_ID = :application_id');
            $stmt->execute([
                ':status' => 'Requesting for Approval',
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