<?php 

require_once __DIR__ . '/../configuration/Database.php';

class Registrationstatus {

    public static function registrationstatus() {
        try {
            $email = $_SESSION['email'];
    
            $db = Database::getConnection();
            
            $stmt = $db->prepare("SELECT * FROM APPLICATION_INFO WHERE EMAIL = :email");
            $stmt->execute([':email' => $email]);
            $registrationstatus = $stmt->fetch(PDO::FETCH_ASSOC);
    
            // If no registration data is found, display error and return default values
            if (!$registrationstatus) {
                // Return default values and halt further processing
                return [
                    'ERROR' => "This user has no existing application",
                    'REGISTRATION_NO' => ' ',
                    'FIRST_NAME' => ' ',
                    'MIDDLE_NAME' => ' ',
                    'SURNAME' => ' ',
                    'STATUS' => ' ',  // Set default status
                    'PROGRESS' => 0               // Default progress
                ];
            }
    
            // If data is found, process and return the registration status
            if (isset($registrationstatus['STATUS'])) {
                $status = $registrationstatus['STATUS'];
                $progressPercentage = 0; // Default progress is 0%
    
                // Determine progress based on the status
                if ($status === 'For evaluation') {
                    $progressPercentage = 20;
                } elseif ($status === 'Approved') {
                    $progressPercentage = 37;
                } elseif ($status === 'Submit additional requirements') {
                    $progressPercentage = 53;
                } elseif ($status === 'Orientation and Training') {
                    $progressPercentage = 70;
                } elseif ($status === 'Registered volunteer') {
                    $progressPercentage = 100;
                }
    
                // Add progress percentage to the returned data
                $registrationstatus['PROGRESS'] = $progressPercentage;
            } else {
                error_log('No Data or STATUS key missing');
            }
    
            return $registrationstatus; // Return the whole registration status data array
        } catch (PDOException $e) {
            error_log('Registration status error: ' . $e->getMessage());
            return [
                'ERROR' => "This user has no existing application",
                'REGISTRATION_NO' => ' ',
                'FIRST_NAME' => ' ',
                'MIDDLE_NAME' => ' ',
                'SURNAME' => ' ',
                'STATUS' => ' ',  // Default status for error
                'PROGRESS' => 0  // Default progress for error
            ];
        }
    }
}

