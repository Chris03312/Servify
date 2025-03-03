<?php
require_once __DIR__ . '/../configuration/Database.php';

class Registrationstatus
{
    public static function registrationstatus($email)
    {
        try {

            $db = Database::getConnection();

            // Order by APPLICATION_DATE descending (latest first)
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
                    'STATUS' => ' ',
                    'PROGRESS' => 0
                ];
            }

            // Update progress for the latest record (first element)
            if (!empty($registrationstatus)) {
                $latestStatus = $registrationstatus[0];
                $status = $latestStatus['STATUS'] ?? '';
                $remarks = isset($latestStatus['REMARKS']) ? explode(',', $latestStatus['REMARKS']) : [];
                $remarks = array_map('trim', $remarks); // Trim spaces
                $progressPercentage = 0; // Default progress

                // Determine progress based on STATUS
                if ($status === 'Pending') {
                    $progressPercentage = 3;
                } elseif ($status === 'Under Review') {
                    $progressPercentage = 20;
                } elseif ($status === 'Requesting for Approval') {
                    $progressPercentage = 20;
                } elseif ($status === 'Approved') {
                    $progressPercentage = 37;

                    // Additional progress conditions based on REMARKS
                    if (in_array('Generate ID', $remarks)) {
                        $progressPercentage = 53.5;
                    }
                    if (in_array('Orientation and Training', $remarks)) {
                        $progressPercentage = 69.5;
                    }
                    if (in_array('Generate Certificate', $remarks)) {
                        $progressPercentage = 90;
                    }
                } elseif ($status === 'Approved/Complete') {
                    $progressPercentage = 100;
                }

                // Update the progress for the latest record
                $registrationstatus[0]['PROGRESS'] = $progressPercentage;
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
                'STATUS' => ' ',
                'PROGRESS' => 0
            ];
        }
    }
}
