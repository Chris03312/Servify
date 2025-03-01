<?php
require_once __DIR__ . '/../configuration/Database.php';

class Registrationstatus
{
    public static function registrationstatus()
    {
        try {
            $email = $_SESSION['email'];
            $db = Database::getConnection();

            // Order by DATE_APPLIED descending (make sure your table has this column)
            $stmt = $db->prepare("SELECT * FROM APPLICATION_INFO WHERE EMAIL = :email ORDER BY APPLICATION_DATE DESC");
            $stmt->execute([':email' => $email]);
            $registrationstatus = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // If no registration data is found, return default values
            if (!$registrationstatus) {
                return [
                    'ERROR' => "This user has no existing application",
                    'REGISTRATION_NO' => ' ',
                    'FIRST_NAME' => ' ',
                    'MIDDLE_NAME' => ' ',
                    'SURNAME' => ' ',
                    'STATUS' => ' ',  // Default status
                    'PROGRESS' => 0     // Default progress
                ];
            }

            // Update progress for the latest record (first element)
            if (!empty($registrationstatus)) {
                $latestStatus = $registrationstatus[0];

                if (isset($latestStatus['STATUS'])) {
                    $status = $latestStatus['STATUS'];
                    $progressPercentage = 0; // Default progress is 0%

                    // Determine progress based on the status value
                    if ($status === 'Pending') {
                        $progressPercentage = 3;
                    } elseif ($status === 'Under Review') {
                        $progressPercentage = 20;
                    } elseif ($status === 'Requesting for Approval') {
                        $progressPercentage = 20; //20
                    } elseif ($status === 'Approved') {
                        $progressPercentage = 37;
                    } elseif ($status === 'Approved/Complete') {
                        $progressPercentage = 90;
                    }

                    // Update the progress for the latest record
                    $registrationstatus[0]['PROGRESS'] = $progressPercentage;
                } else {
                    error_log('No STATUS key found in the latest record.');
                }
            }

            return $registrationstatus;
        } catch (PDOException $e) {
            error_log('Registration status error: ' . $e->getMessage());
            return [
                'ERROR' => "This user has no existing application",
                'REGISTRATION_NO' => ' ',
                'FIRST_NAME' => ' ',
                'MIDDLE_NAME' => ' ',
                'SURNAME' => ' ',
                'STATUS' => ' ',  // Default status for error
                'PROGRESS' => 0     // Default progress for error
            ];
        }
    }
}
