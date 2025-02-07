<?php 

require_once __DIR__ . '/../models/volunteerManagement.php';


class UnderReviewSubmissionsController {

    public static function ShowUnderReviewSubmissions() {
    

        $underreviewApplications = VolunteerManagement::getApplicationByStatus('Under review');
        $countApplications = VolunteerManagement::countApplicationsByStatuses(['Pending', 'Under review', 'Approved', 'Cancelled']);


        view('under_review_submissions', [
            'underreviewApplications' => $underreviewApplications,
            'pendingCount' => $countApplications['Pending'] ?? 0,
            'underReviewCount' => $countApplications['Under review'] ?? 0,
            'approvedCount' => $countApplications['Approved'] ?? 0,
            'cancelledCount' => $countApplications['Cancelled'] ?? 0
        ]);
    }

    public static function DeleteUnderreviewSubmissions() {
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
            redirect('/under_review_submissions');
        } catch (PDOException $e) {
            $db->rollBack();
            error_log('Error deleting application: ' . $e->getMessage());
        } catch (Exception $e) {
            error_log('Validation error: ' . $e->getMessage());
        }
    }
}