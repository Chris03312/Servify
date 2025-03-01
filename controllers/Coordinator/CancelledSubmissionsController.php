<?php

require_once __DIR__ . '/../../models/VolunteerManagement.php';
require_once __DIR__ . '/../../models/Sidebarinfo.php';

class CancelledSubmissionsController
{

    public static function ShowCancelledSubmissions()
    {

        $cancelledApplications = VolunteerManagement::getApplicationByStatus(['Cancelled', 'Rejected']);
        $countApplications = VolunteerManagement::countApplicationsByStatuses(['Pending', 'Under review', 'Approved', 'Cancelled', 'Requesting for Approval']);
        $sidebarData = SidebarInfo::getSidebarInfo($_SESSION['email'], $_SESSION['role']);


        view('Coordinator/cancelled_submissions', [
            'cancelledApplications' => $cancelledApplications,
            'pendingCount' => $countApplications['Pending'] ?? 0,
            'underReviewCount' => $countApplications['Under review'] ?? 0,
            'approvedCount' => $countApplications['Approved'] ?? 0,
            'cancelledCount' => $countApplications['Cancelled'] ?? 0,
            'coordinator_info' => $sidebarData

        ]);
    }

    public static function DeleteCancelledSubmissions()
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

            // Redirect after deletion
            $db->commit();
            redirect('/cancelled_submissions');
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

    public static function ReassignApplication()
    {
        try {
            // Ensure the request is POST and has application_id
            if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['application_id']) || empty($_POST['application_id'])) {
                throw new Exception("Invalid request.");
            }
            $application_id = $_POST['application_id'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $barangay = $_POST['barangay'];
            $new_precinct = $_POST['new-precinct'];
            $new_role = $_POST['new-role'];
            $status = 'Pending';

            $db = Database::getConnection();

            $db->beginTransaction();

            $stmt = $db->prepare('
                UPDATE APPLICATION_INFO
                SET CITY = :city, BARANGAY = :barangay, DISTRICT = distict, STATUS = :status
                WHERE APPLICATION_ID = :application_id
            ');

            $stmt->execute([
                'application_id' => $application_id,
                'city' => $city,
                'barangay' => $barangay,
                'district' => $district,
                'status' => $status
            ]);

            // Redirect after deletion
            redirect('/pending_submissions');
        } catch (PDOException $e) {
            error_log('Error deleting application: ' . $e->getMessage());
        } catch (Exception $e) {
            error_log('Validation error: ' . $e->getMessage());
        }
    }

}