<?php 

require_once __DIR__ . '/../models/Sidebarinfo.php';
require_once __DIR__ . '/../models/Application.php';
require_once __DIR__ . '/../models/Notification.php';


class VolunteerNewApplicationController {

    public static function VolunteerNewApplication() {
        if (!isset($_SESSION['email']) || !$_SESSION['email']) {
            redirect('/login');
        }

        $sidebarinfo = Sidebarinfo::getsidebarinfo();
        $notifications = Notification::getNotification();
        $userInfo = Dashboard::getinfodashboard();
        $validId = Dashboard::getvalidId();


        view('volunteer_new_application', [
            'email' => $_SESSION['email'],
            'sidebarinfo' => $sidebarinfo,
            'userInfo' => $userInfo,
            'validId' => $validId,
            'notifications' => $notifications['notifications'],  // List of notifications
            'unread_count' => $notifications['unread_count']
        ]);
    }

    public static function NewApplication() {
        require_once __DIR__ . '/../configuration/Database.php'; // Include the Database class
    
        try {
            $email = $_SESSION['email'];
    
            $db = Database::getConnection();
    
            // First query: Retrieve the registration ID based on the email
            $stmt = $db->prepare("SELECT * FROM VPROFILE_TABLE WHERE EMAIL = :email");
            $stmt->execute(['email' => $email]);
    
            // Fetch the result and store the registration_id in a variable
            $vprofile = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($vprofile) {
                $vprofile_id = $vprofile['vprofile']; // Store the registration_id in a variable
                $parish = $vprofile['PARISH'];
                $role = "Volunteer";
    
                // Declare your input fields
                $precinctNumber = $_POST['precinctNumber'];
                $firstName = $_POST['firstName'];
                $middleName = $_POST['middleName'];
                $surname = $_POST['surname'];
                $suffix = $_POST['suffix'];
                $gender = $_POST['sex'];
                $nickname = $_POST['Nickname'];
                $civilStatus = $_POST['civilStatus'];
                $birthDate = $_POST['birthDate'];
                $birthMonth = $_POST['birthMonth'];
                $birthYear = $_POST['birthYear'];
                $age = $_POST['age'];
                $citizenship = $_POST['citizenship'];
                $occupation = $_POST['occupation'];
                $companyName = $_POST['companyName'];
                $streetAddress = $_POST['streetAddress'];
                $city = $_POST['city'];
                $barangay = $_POST['barangay'];
                $zipcode = $_POST['zipcode'];
                $email = $_POST['email'];
                $mobileNumber = $_POST['mobileNumber'];
                $telNumber = $_POST['telNumber'];
                $status = "For evaluation";
    
                $validID = __DIR__ . '/../validID/'; // Path for storing uploaded files
    
                if (!is_dir($validID)) {
                    mkdir($validID, 0755, true);
                }
                // File upload handling
                $nameofFile = $surname.'_'.$firstName;
                $validId = $_FILES['validId']; // Corrected from $_POST to $_FILES
                $nameofId = $_POST['nameofId']; // Name of the ID
    
                $fileExtension = pathinfo($validId['name'], PATHINFO_EXTENSION);
                $newFileName = $nameofFile.'_'.$nameofId . '.' . $fileExtension;
                $destinationPath = $validID . $newFileName; // Corrected the variable to use $validID
    
                // Move the uploaded file and check for errors
                if (move_uploaded_file($validId['tmp_name'], $destinationPath)) {
                    echo "File uploaded successfully as: $newFileName";
                } else {
                    $error_message = "Error: Could not move the uploaded file. File: " . $validId['name'];
                    error_log($error_message);
                    echo "Error: Could not save the file.";
                    return; // Exit the function if file upload fails
                }
    
                // Second query: Insert the registration_id and other input fields into the APPLICATION_INFO table
                $stmt = $db->prepare("INSERT INTO APPLICATION_INFO 
                    (
                    VPROFILE_ID,
                    PRECINCT_NO, 
                    PARISH, 
                    ROLE,
                    FIRST_NAME,
                    MIDDLE_NAME,
                    SURNAME,
                    NAME_SUFFIX,
                    GENDER,
                    NICKNAME,
                    CIVIL_STATUS,
                    BIRTHDATE,
                    BIRTHMONTH,
                    BIRTHYEAR,
                    AGE,
                    CITIZENSHIP,
                    OCCUPATION,
                    COMPANY_NAME,
                    STREETADDRESS,
                    CITY,
                    BARANGAY,
                    ZIPCODE,
                    EMAIL,
                    MOBILE_NUMBER,
                    TEL_NUMBER,
                    VALID_ID,
                    STATUS
                    ) VALUES 
                        (
                        :vprofile_id, 
                        :precinctNo,
                        :parish, 
                        :role,
                        :firstName,
                        :middleName,
                        :surname,
                        :suffix,
                        :gender,
                        :nickname,
                        :civilStatus,
                        :birthDate,
                        :birthMonth,
                        :birthYear,
                        :age,
                        :citizenship,
                        :occupation,
                        :companyName,
                        :streetAddress,
                        :city,
                        :barangay,
                        :zipcode,
                        :email,
                        :mobileNumber,
                        :telNumber,
                        :validId,
                        :status
                        )");
    
                $stmt->execute([
                    ':vprofile_id' => $vprofile_id,
                    ':precinctNo' => $precinctNumber,
                    ':parish' => $parish,
                    ':role' => $role,
                    ':firstName' => $firstName,
                    ':middleName' => $middleName,
                    ':surname' => $surname,
                    ':suffix' => $suffix,
                    ':gender' => $gender,
                    ':nickname' => $nickname,
                    ':civilStatus' => $civilStatus,
                    ':birthDate' => $birthDate,
                    ':birthMonth' => $birthMonth,
                    ':birthYear' => $birthYear,
                    ':age' => $age,
                    ':citizenship' => $citizenship,
                    ':occupation' => $occupation,
                    ':companyName' => $companyName,
                    ':streetAddress' => $streetAddress,
                    ':city' => $city,
                    ':barangay' => $barangay,
                    ':zipcode' => $zipcode,
                    ':email' => $email,
                    ':mobileNumber' => $mobileNumber,
                    ':telNumber' => $telNumber,
                    ':validId' => $newFileName, // Store the file name in the DB
                    ':status' => $status,
                ]);
    
                // Get the last inserted application ID
                $application_id = $db->lastInsertId();
    
                // Additional data for the third query
                $parish_org_membership = $_POST['parish_org_membership'];
                $previous_exp_date = $_POST['prevExperienceDate'];
                $previous_exp_month = $_POST['prevExperienceMonth'];
                $previous_exp_year = $_POST['prevExperienceYear'];
                $previous_exp_years = $_POST['yearOfService'];
                $previous_ppcrv_vol_ass = $_POST['prevPpcrvVolAss'];
                $previous_ppcrv_precinct = $_POST['prevPrecinct'];
                $preferred_ppcrv_vol_ass = $_POST['prefPpcrvVolAss'];
    
                // Third query: Insert data into the APPLICATION_ADD_INFO table
                $stmt = $db->prepare("INSERT INTO APPLICATION_ADD_INFO
                    ( 
                    APPLICATION_ADD_ID,
                    PARISH_ORG_MEMBERSHIP,
                    PREVIOUS_EXP_DATE,
                    PREVIOUS_EXP_MONTH,
                    PREVIOUS_EXP_YEAR,
                    PREVIOUS_EXP_YRS,
                    PREVIOUS_PPCRV_VOL_ASS,
                    PREVIOUS_PPCRV_PRECINCT,
                    PREFERRED_PPCRV_VOL_ASS
                    ) VALUES 
                        (
                        :application_id, 
                        :parish_org_membership, 
                        :previous_exp_date,
                        :previous_exp_month,
                        :previous_exp_year,
                        :previous_exp_years,
                        :previous_ppcrv_vol_ass,
                        :previous_ppcrv_precinct,
                        :preferred_ppcrv_vol_ass
                        )");
    
                $stmt->execute([
                    ':application_id' => $application_id,
                    ':parish_org_membership' => $parish_org_membership,
                    ':previous_exp_date' => $previous_exp_date,
                    ':previous_exp_month' => $previous_exp_month,
                    ':previous_exp_year' => $previous_exp_year,
                    ':previous_exp_years' => $previous_exp_years,
                    ':previous_ppcrv_vol_ass' => $previous_ppcrv_vol_ass,
                    ':previous_ppcrv_precinct' => $previous_ppcrv_precinct,
                    ':preferred_ppcrv_vol_ass' => $preferred_ppcrv_vol_ass,
                ]);

                $stmt = $db->prepare('SELECT USERNAME FROM ACCOUNTS WHERE EMAIL = :email');
                $stmt->execute([':email' => $email]);
                $account = $stmt->fetch(PDO::FETCH_ASSOC);
            
                if ($account) {
                    $username = $account['USERNAME'];
                    $currentDate = date('F j, Y H:i:s');
                    $description = 'You submitted an application form. Click here to check the status of your registration.';
            
                    // Insert activity into the ACTIVITES table
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
                    
    
                // Redirect to volunteer registration status page
                redirect('/volunteer_registration_status');
            } else {
                echo "Registration not found for the provided email.";
            }
    
        } catch (PDOException $e) {
            error_log('New application submission error ' . $e->getMessage());
            echo "An error occurred. Please try again later.";
        }
    }
    
}