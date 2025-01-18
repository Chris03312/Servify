<?php 

require_once __DIR__ . '/../models/application.php';
require_once __DIR__ . '/../models/Notification.php';


class VolunteerNewApplicationController {

    public static function VolunteerNewApplication() {
        if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
            redirect('/login');
        }

        $sidebarinfo = Sidebarinfo::getsidebarinfo();
        $notifications = Notification::getNotification();
        $userInfo = Dashboard::getinfodashboard();


        view('volunteer_new_application', [
            'email' => $_SESSION['email'],
            'sidebarinfo' => $sidebarinfo,
            'userInfo' => $userInfo,
            'notifications' => $notifications['notifications'],  // List of notifications
            'unread_count' => $notifications['unread_count']
        ]);
    }

    public static function NewApplication(){
        require_once __DIR__ . '/../configuration/Database.php'; // Include the Database class
        
        try {
            $email = $_SESSION['email'];
        
            $db = Database::getConnection();
        
            // First query: Retrieve the registration ID based on the email
            $stmt = $db->prepare("SELECT REGISTRATION_ID FROM REGISTRATION WHERE EMAIL = :email");
            $stmt->execute(['email' => $email]);
        
            // Fetch the result and store the registration_id in a variable
            $registration = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($registration) {
                $registration_id = $registration['REGISTRATION_ID']; // Store the registration_id in a variable
                $parish = "Sto. Rosario parsih";
                $role = "Volunteer";
                // Declare your other input fields (replace these with your actual field names)
                $precinctNumber = $_POST['precinctNumber']; // Replace 'inputField1' with actual field name
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
                $email = $_POST['email'];
                $mobileNumber = $_POST['mobileNumber'];
                $telNumber = $_POST['telNumber'];
                $status = "For evaluation";
                // Replace 'inputField2' with actual field name
                // ... add more fields as needed
        
                // Second query: Insert the registration_id and other input fields into another table
                $stmt = $db->prepare("INSERT INTO APPLICATION_INFO 
                (
                REGISTRATION_ID, 
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
                STATUS,
                ) VALUES 
                    (
                    :registration_id, 
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
                    :email,
                    :mobileNumbe,
                    :telNumber,
                    :status
                    )");
                
                // Execute the second query with the registration_id and other input field values
                $stmt->execute([
                    ':registration_id' => $precinctNumber,
                    ':parish' => $parish,
                    ':role' =>  $role,
                    ':firstName' => $firstName,
                    ':middleName' => $middleName,
                    ':surname' => $surname,
                    ':suffix' => $suffix,
                    ':gender' => $gender,
                    ':nickname' => $nickname,
                    ':civilStatus' =>  $civilStatus,
                    ':birthDate' => $birthDate,
                    ':birthMonth' => $birthMonth,
                    ':birthYear' => $birthYear,
                    ':age' => $age,
                    ':citizenship' => $citizenship,
                    ':occupation' =>  $occupation,
                    ':companyName' => $companyName,
                    ':streetAddress' => $streetAddress,
                    ':city' => $city,
                    ':email' => $email,
                    ':mobileNumbe' => $mobileNumber,
                    ':telNumber' => $telNumber,
                    ':statua' => $status
                    // ... add more fields as needed
                ]);
                
                $application_id = $db->lastInsertId();
                $parish_org_membership = $_POST['parish_org_membership'];
                $previous_exp_date = $_POST['prevExperienceDate'];
                $previous_exp_month = $_POST['prevExperienceMonth'];
                $previous_exp_year = $_POST['prevExperienceYear'];
                $previous_exp_years = $_POST['yearOfService'];
                $previous_ppcrv_vol_ass = $_POST['prevPpcrvVolAss'];
                $previous_ppcrv_precinct = $_POST['prevPrecinct'];
                $preferred_ppcrv_vol_ass = $_POST['prefPpcrvVolAss'];
                // Third query: Insert data into a third table
                $stmt = $db->prepare("INSERT INTO APPLICATION_ADD_INFO
                ( 
                APPLICATION_ID,
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
                    :preferred_ppcrv_vol_ass,
                    )");
                
                // Execute the third query with the registration_id and other fields
                $stmt->execute([
                    ':application_id' => $application_id,
                    ':parish_org_membership' => $parish_org_membership,
                    ':previous_exp_date' => $previous_exp_date,
                    ':previous_exp_month' => $previous_exp_month,
                    ':previous_exp_year' => $previous_exp_year,
                    ':previous_exp_years' => $previous_exp_years,
                    ':previous_ppcrv_vol_ass' => $previous_ppcrv_vol_ass,
                    ':previous_ppcrv_precinct' => $previous_ppcrv_precinct,
                    ':preferred_ppcrv_vol_ass' => $preferred_ppcrv_vol_ass
                    // ... add more fields as needed
                ]);
        
            } else {
                // Handle case when no registration is found
                echo "Registration not found for the provided email.";
            }
            
        } catch (PDOException $e) {
            // Log any database errors
            error_log('New application submission error ' . $e->getMessage());
            echo "An error occurred. Please try again later.";
        }
        
    }
}