<?php

require_once __DIR__ . '/../configuration/Database.php'; // Include the Database class
require_once __DIR__ . '/../models/Sidebarinfo.php';
require_once __DIR__ . '/../models/Application.php';
require_once __DIR__ . '/../models/Notification.php';
require_once __DIR__ . '/../models/Dashboard.php';

class VolunteerNewApplicationController {

    public static function VolunteerNewApplication() {
        if (!isset($_SESSION['email']) || !$_SESSION['email']) {
            redirect('/login');
        }

        $sidebarinfo = Sidebarinfo::getsidebarinfo();
        $notifications = Notification::getNotification();
        $applicationInfo = Application::getinfoApplication();
        $validId = Dashboard::getvalidId();

        view('volunteer_new_application', [
            'email' => $_SESSION['email'],
            'applicationInfo' => $applicationInfo,
            'sidebarinfo' => $sidebarinfo,
            'validId' => $validId,
            'notifications' => $notifications['notifications'],  // List of notifications
            'unread_count' => $notifications['unread_count'],
        ]);
    }
        public static function NewApplication() {
            require_once __DIR__ . '/../configuration/Database.php';
    
            try {
                $email = $_SESSION['email'];
                
                $db = Database::getConnection();
                
                // Retrieve the registration ID based on the email
                $stmt = $db->prepare("SELECT * FROM VPROFILE_TABLE WHERE EMAIL = :email");
                $stmt->execute(['email' => $email]);
                $vprofile = $stmt->fetch(PDO::FETCH_ASSOC);
                
                if (!$vprofile) {
                    echo json_encode(['status' => 'error', 'message' => 'Registration not found for the provided email.']);
                    return;
                }
                
                $vprofile_id = $vprofile['VPROFILE_ID'];
                $parish = $vprofile['PARISH'];
                $role = "Volunteer";
                
                $input = $_POST; // Copy all POST data

                // Add additional fields
                $input['applicationDate'] = date('F j, Y');
                $input['status'] = "Pending";
                
                // Ensure the file upload is handled correctly
                if (!empty($_FILES['validId']['name'])) {
                    $input['validId'] = $_FILES['validId']; // Keep the full file array for processing
                } else {
                    $input['validId'] = null; // Ensure it is always set
                }
                
                // Ensure checkbox is handled correctly
                $input['checkPledge'] = isset($_POST['checkPledge']) ? $_POST['checkPledge'] : 0; // Default to 0 if not checked
                
                // Debugging: Log received input
                error_log("Received Input: " . json_encode($input));
                
                // Validate input
                $errors = self::validateForms($input);
                if (!empty($errors)) {
                    error_log("Validation errors: " . json_encode($errors)); // Debugging
                    header("Content-Type: application/json");
                    echo json_encode(['status' => 'error', 'errors' => $errors]);
                    return;
                }
                
                // Handle file upload
                $validIDDir = __DIR__ . '/../validID/';
                if (!is_dir($validIDDir)) {
                    mkdir($validIDDir, 0755, true);
                }
                
                if ($input['validId'] !== null) {
                    $validid = $input['validId']; // File array
                
                    // Generate unique file name
                    $nameofFile = preg_replace('/[^A-Za-z0-9_-]/', '_', $input['surname'] . '_' . $input['firstName']); // Clean filename
                    $fileExtension = pathinfo($validid['name'], PATHINFO_EXTENSION);
                    $newFileName = $nameofFile . '_' . $input['nameofId'] . '.' . $fileExtension;
                    $destinationPath = $validIDDir . $newFileName;
                
                    // Move uploaded file
                    if (!move_uploaded_file($validid['tmp_name'], $destinationPath)) {
                        error_log("Error: Could not move uploaded file.");
                        echo json_encode(['status' => 'error', 'message' => 'Error: Could not save the file.']);
                        return;
                    }
                }
                
                $db->beginTransaction();
                // Insert into APPLICATION_INFO
                $stmt = $db->prepare("INSERT INTO APPLICATION_INFO (VPROFILE_ID, APPLICATION_DATE, PRECINCT_NO, PARISH, ROLE, 
                    FIRST_NAME, MIDDLE_NAME, SURNAME, NAME_SUFFIX, GENDER, NICKNAME, CIVIL_STATUS, BIRTHDATE, BIRTHMONTH, BIRTHYEAR, AGE, 
                    CITIZENSHIP, OCCUPATION, COMPANY_NAME, STREETADDRESS, CITY, BARANGAY, ZIPCODE, EMAIL, MOBILE_NUMBER, TEL_NUMBER, VALID_ID, STATUS)
                    VALUES (:vprofile_id, :applicationDate, :precinctNo, :parish, :role, :firstName, :middleName, :surname, :suffix, :gender, :nickname, 
                    :civilStatus, :birthDate, :birthMonth, :birthYear, :age, :citizenship, :occupation, :companyName, :streetAddress, :city, :barangay, 
                    :zipcode, :email, :mobileNumber, :telNumber, :validId, :status)");
                
                $stmt->execute([
                    ':vprofile_id' => $vprofile_id,
                    ':applicationDate' => $input['applicationDate'],
                    ':precinctNo' => $input['precinctNumber'],
                    ':parish' => $parish,
                    ':role' => $role,
                    ':firstName' => $input['firstName'],
                    ':middleName' => $input['middleName'],
                    ':surname' => $input['surname'],
                    ':suffix' => $input['suffix'],
                    ':gender' => $input['sex'],
                    ':nickname' => $input['Nickname'],
                    ':civilStatus' => $input['civilStatus'],
                    ':birthDate' => $input['birthDate'],
                    ':birthMonth' => $input['birthMonth'],
                    ':birthYear' => $input['birthYear'],
                    ':age' => $input['age'],
                    ':citizenship' => $input['citizenship'],
                    ':occupation' => $input['occupation'],
                    ':companyName' => $input['companyName'],
                    ':streetAddress' => $input['streetAddress'],
                    ':city' => $input['city'],
                    ':barangay' => $input['barangay'],
                    ':zipcode' => $input['zipcode'],
                    ':email' => $input['email'],
                    ':mobileNumber' => $input['mobileNumber'],
                    ':telNumber' => $input['telNumber'],
                    ':validId' => $newFileName,
                    ':status' => $input['status']
                ]);
    
                $application_id = $db->lastInsertId();
                
                // Insert into APPLICATION_ADD_INFO
                $stmt = $db->prepare("INSERT INTO APPLICATION_ADD_INFO (APPLICATION_ADD_ID, PARISH_ORG_MEMBERSHIP, PREVIOUS_EXP_DATE, PREVIOUS_EXP_MONTH, PREVIOUS_EXP_YEAR, 
                    PREVIOUS_EXP_YRS, PREVIOUS_PPCRV_VOL_ASS, PREVIOUS_PPCRV_PRECINCT, PREFERRED_PPCRV_VOL_ASS)
                    VALUES (:application_id, :parish_org_membership, :previous_exp_date, :previous_exp_month, :previous_exp_year, :previous_exp_years, 
                    :previous_ppcrv_vol_ass, :previous_ppcrv_precinct, :preferred_ppcrv_vol_ass)");
                
                $stmt->execute([
                    ':application_id' => $application_id,
                    ':parish_org_membership' => $input['parish_org_membership'],
                    ':previous_exp_date' => $input['prevExperienceDate'],
                    ':previous_exp_month' => $input['prevExperienceMonth'],
                    ':previous_exp_year' => $input['prevExperienceYear'],
                    ':previous_exp_years' => $input['yearOfService'],
                    ':previous_ppcrv_vol_ass' => $input['prevPpcrvVolAss'],
                    ':previous_ppcrv_precinct' => $input['prevPrecinct'],
                    ':preferred_ppcrv_vol_ass' => $input['prefPpcrvVolAss']
                ]);
                
                // Insert activity into the ACTIVITIES table
                $stmt = $db->prepare('SELECT USERNAME FROM ACCOUNTS WHERE EMAIL = :email');
                $stmt->execute([':email' => $email]);
                $account = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($account) {
                    $username = $account['USERNAME'];
                    $currentDate = date('F j, Y H:i:s');
                    $description = 'You submitted an application form with an Application ID of.'.' '.$application_id.' '.'Click here to check the status of your registration.';

                    $stmt = $db->prepare('INSERT INTO ACTIVITIES 
                    (
                        username, 
                        email, 
                        description,
                        created_at
                        ) VALUES 
                        (
                        :username, 
                        :email, 
                        :description,
                        :created_at
                        )');

                    $stmt->execute([
                        ':username' => $username,
                        ':email' => $email,
                        ':description' => $description,
                        ':created_at' => $currentDate
                    ]);
                } else {
                    error_log('Error: Email not found in ACCOUNTS. Activity not inserted.');
                }

                $db->commit();

                header("Content-Type: application/json");
                echo json_encode(['status' => 'success']);
                exit();
            } catch (PDOException $e) {
                $db->rollBack();
                error_log('New application submission error: ' . $e->getMessage());
                echo json_encode(['status' => 'error', 'message' => 'An error occurred. Please try again later.']);
            }
        }
    
        public static function validateForms($input) {
            $errors = [];
            if (empty($input['precinctNumber'])) $errors['precinctNumber'] = 'Precinct number is required';
            if (empty($input['sex'])) $errors['sex'] = 'Please select a Gender.';
            if (empty($input['Nickname'])) $errors['Nickname'] = 'Type N/A if none.';
            if (empty($input['civilStatus'])) $errors['civilStatus'] = 'Please select a Civil Status.';
            if (empty($input['occupation'])) $errors['occupation'] = 'Citizenship is required.';
            if (empty($input['citizenship'])) $errors['citizenship'] = 'Occupation is required, Type N/A if none.';
            if (empty($input['companyName'])) $errors['companyName'] = 'Company Name is required, Type N/A if none.';
            if (empty($input['mobileNumber'])) $errors['mobileNumber'] = 'Moblie Number is required.';
            if (empty($input['telNumber'])) $errors['telNumber'] = 'Telephone Number is required, Type N/A if none.';
            if (empty($input['parish_org_membership'])) $errors['parish_org_membership'] = 'Please select Parish Organization Membership.';
            if (empty($input['prevExperienceDate'])) $errors['prevExperienceDate'] = 'Previous PPCRV Experience Date is required.';
            if (empty($input['prevExperienceMonth'])) $errors['prevExperienceMonth'] = 'Please select Previous PPCRV Experience Month.';
            if (empty($input['prevExperienceYear'])) $errors['prevExperienceYear'] = 'Previous Experience PPCRV Year is required.';
            if (empty($input['prevPpcrvVolAss'])) $errors['prevPpcrvVolAss'] = 'Please select Previous PPCRV Volunteer Assignment.';
            if (empty($input['prevPrecinct'])) $errors['prevPrecinct'] = 'Previous Precinct is required.';
            if (empty($input['prefPpcrvVolAss'])) $errors['prefPpcrvVolAss'] = 'Please select Preferred PPCRV Volunteer Assignment.';
            if (empty($input['nameofId'])) $errors['nameofId'] = 'Please select Type of ID.';
            if(empty($input['IDNumber'])) $errors['IDNumber'] = 'ID Number is required.';
            if (empty($input['validId'])) $errors['validId'] = 'Please upload the ID here.';
            if (empty($input['checkPledge'])) $errors['checkPledge'] = 'Please check the box to confirm your acknowledgment and agreement before submitting.';
            
            return $errors;
        }

}