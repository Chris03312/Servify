<?php

require_once __DIR__ . '/../../models/Sidebarinfo.php';
require_once __DIR__ . '/../../models/Application.php';

class AdminApprovalApplicationDetails
{

    public static function ShowApprovalApplicationDetails()
    {
        session_start();

        // Retrieve the session_id from GET or POST request
        $session_id = $_GET['token'] ?? '';

        // Check if the session exists for the given session_id
        if (!isset($_SESSION['sessions'][$session_id])) {
            redirect('/login');
        }

        // Fetch user session data
        $userSession = $_SESSION['sessions'][$session_id];
        $email = $userSession['email'];
        $role = $userSession['role'];

        $application_id = $_POST['application_id'];

        $sidebarData = SidebarInfo::getSidebarInfo($email, $role);
        $applicationDetails = Application::reviewApplicationDetails($application_id);
        $applicationInfo = Application::getinfoApplication($email);

        view('admin/volunteer_application_details', [
            'email' => $email,
            'role' => $role,
            'applicationId' => $application_id,
            'applicationInfo' => $applicationInfo,
            'applicationDetails' => $applicationDetails,
            'adminsidebarinfo' => $sidebarData
        ]);
    }

    public static function ApprovedRequest()
    {
        try {
            $db = Database::getConnection();

            if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_POST['application_id'])) {
                throw new Exception("Invalid request.");
            }

            $application_id = $_POST['application_id'];

            $selectstmt = $db->prepare('
                SELECT 
                    ai.*, aai.*
                FROM APPLICATION_INFO AS ai
                INNER JOIN APPLICATION_ADD_INFO AS aai
                ON ai.APPLICATION_ID = aai.APPLICATION_ADD_ID
                WHERE ai.APPLICATION_ID = :application_id
            ');

            $selectstmt->execute([':application_id' => $application_id]);
            $selectedData = $selectstmt->fetch(PDO::FETCH_ASSOC);

            if (!$selectedData) {
                throw new Exception("Application not found.");
            }

            $account_id = $selectedData['VPROFILE_ID'];
            $onexone = $selectedData['1BY1']; // Ensure this column exists
            $role = $selectedData['ROLE'];
            $assigned_assignment = $selectedData['PREFERRED_PPCRV_VOL_ASS'];
            $assigned_polling_place = $selectedData['PREVIOUS_PPCRV_PRECINCT'];
            $parish = $selectedData['PARISH'];
            $precinct_no = $selectedData['PRECINCT_NO'];
            $firstname = $selectedData['FIRST_NAME'];
            $middle_name = $selectedData['MIDDLE_NAME'];
            $surname = $selectedData['SURNAME'];
            $suffix = $selectedData['NAME_SUFFIX'];
            $gender = $selectedData['GENDER'];
            $nickname = $selectedData['NICKNAME'];
            $civil_status = $selectedData['CIVIL_STATUS'];
            $birthmonth = $selectedData['BIRTHMONTH'];
            $birthday = $selectedData['BIRTHDATE'];
            $birthyear = $selectedData['BIRTHYEAR'];
            $age = $selectedData['AGE'];
            $citizenship = $selectedData['CITIZENSHIP'];
            $occupation = $selectedData['OCCUPATION'];
            $company_name = $selectedData['COMPANY_NAME'];
            $streetaddress = $selectedData['STREETADDRESS'];
            $district = $selectedData['DISTRICT'];
            $city = $selectedData['CITY'];
            $barangay = $selectedData['BARANGAY'];
            $zipcode = $selectedData['ZIPCODE'];
            $email = $selectedData['EMAIL'];
            $mobile_number = $selectedData['MOBILE_NUMBER'];
            $telephone_number = $selectedData['TEL_NUMBER'];
            $prev_org_membership = $selectedData['PARISH_ORG_MEMBERSHIP'];
            $prev_ppcrv_exp_date = $selectedData['PREVIOUS_EXP_MONTH'];
            $prev_ppcrv_exp_month = $selectedData['PREVIOUS_EXP_MONTH'];
            $prev_ppcrv_exp_year = $selectedData['PREVIOUS_EXP_YEAR'];
            $prev_ppcrv_exp_yrs = $selectedData['PREVIOUS_EXP_YRS'];
            $prev_precinct = $selectedData['PREVIOUS_PPCRV_VOL_ASS'];
            $pref_ppcrv_vol_ass = $selectedData['PREFERRED_PPCRV_VOL_ASS'];
            $date_registered = $selectedData['APPLICATION_DATE'];
            $date_approved = date('F j, Y');

            $db->beginTransaction();

            try {
                $insertstmt = $db->prepare('
                    INSERT INTO VOLUNTEERS_TBL (
                        ACCOUNT_ID,
                        `1BY1PICTURE`,
                        ROLE,
                        ASSIGNED_ASSIGNMENT,
                        ASSIGNED_POLLING_PLACE,
                        PARISH,
                        PRECINCT_NO,
                        FIRST_NAME,
                        MIDDLE_NAME,
                        SURNAME,
                        NAME_SUFFIX,
                        GENDER,
                        NICKNAME,
                        CIVIL_STATUS,
                        BIRTHMONTH,
                        BIRTHDAY,
                        BIRTHYEAR,
                        AGE,
                        CITIZENSHIP,
                        OCCUPATION,
                        COMPANY_NAME,
                        STREETADDRESS,
                        DISTRICT,
                        CITY,
                        BARANGAY,
                        ZIPCODE,
                        EMAIL,
                        MOBILE_NUMBER,
                        TELEPHONE_NUMBER,
                        PARISH_ORG_MEM,
                        PREV_PPCRV_EXP_DATE,
                        PREV_PPCRV_EXP_MONTH,
                        PREV_PPCRV_EXP_YEAR,
                        PREV_PPCRV_EXP_YEARS_OF_SERV,
                        PREV_PPCRV_VOL_ASS,
                        PREV_PRECINCT,
                        PREF_PPCRV_VOL_ASS,
                        DATE_REGISTERED,
                        DATE_APPROVED
                    ) VALUES (
                        :account_id,
                        :onexone,
                        :role,
                        :assigned_assignment,
                        :assigned_polling_place,
                        :parish,
                        :precinct_no,
                        :firstname,
                        :middle_name,
                        :surname,
                        :suffix,
                        :gender,
                        :nickname,
                        :civil_status,
                        :birthmonth,
                        :birthday,
                        :birthyear,
                        :age,
                        :citizenship,
                        :occupation,
                        :company_name,
                        :streetaddress,
                        :district,
                        :city,
                        :barangay,
                        :zipcode,
                        :email,
                        :mobile_number,
                        :telephone_number,
                        :parish_org_mem,
                        :prev_ppcrv_exp_date,
                        :prev_ppcrv_exp_month,
                        :prev_ppcrv_exp_year,
                        :prev_ppcrv_exp_yrs,
                        :prev_ppcrv_vol_ass,
                        :prev_precinct,
                        :pref_ppcrv_vol_ass,
                        :date_registered,
                        :date_approved
                    )
                ');

                $insertstmt->execute([
                    ':account_id' => $account_id,
                    ':onexone' => $onexone,
                    ':role' => $role,
                    ':assigned_assignment' => $assigned_assignment,
                    ':assigned_polling_place' => $assigned_polling_place,
                    ':parish' => $parish,
                    ':precinct_no' => $precinct_no,
                    ':firstname' => $firstname,
                    ':middle_name' => $middle_name,
                    ':surname' => $surname,
                    ':suffix' => $suffix,
                    ':gender' => $gender,
                    ':nickname' => $nickname,
                    ':civil_status' => $civil_status,
                    ':birthmonth' => $birthmonth,
                    ':birthday' => $birthday,
                    ':birthyear' => $birthyear,
                    ':age' => $age,
                    ':citizenship' => $citizenship,
                    ':occupation' => $occupation,
                    ':company_name' => $company_name,
                    ':streetaddress' => $streetaddress,
                    ':district' => $district,
                    ':city' => $city,
                    ':barangay' => $barangay,
                    ':zipcode' => $zipcode,
                    ':email' => $email,
                    ':mobile_number' => $mobile_number,
                    ':telephone_number' => $telephone_number,
                    ':parish_org_mem' => $prev_org_membership,
                    ':prev_ppcrv_exp_date' => $prev_ppcrv_exp_date,
                    ':prev_ppcrv_exp_month' => $prev_ppcrv_exp_month,
                    ':prev_ppcrv_exp_year' => $prev_ppcrv_exp_year,
                    ':prev_ppcrv_exp_yrs' => $prev_ppcrv_exp_yrs,
                    ':prev_ppcrv_vol_ass' => $prev_precinct,
                    ':prev_precinct' => $prev_precinct,
                    ':pref_ppcrv_vol_ass' => $pref_ppcrv_vol_ass,
                    ':date_registered' => $date_registered,
                    ':date_approved' => $date_approved
                ]);

                $updatestmt = $db->prepare('UPDATE APPLICATION_INFO SET STATUS = :status, REMARKS = :remarks WHERE APPLICATION_ID = :application_id');
                $updatestmt->execute([
                    ':status' => 'Approved',
                    ':remarks' => 'Approved for Assignment',
                    ':application_id' => $application_id
                ]);

                $selectstmt = $db->prepare('SELECT USERNAME FROM ACCOUNTS WHERE EMAIL = :email');
                $selectstmt->execute([':email' => $email]);
                $selectedAccounts = $selectstmt->fetch(PDO::FETCH_ASSOC);

                $username = $selectedAccounts['USERNAME'];

                $description = 'Your application is approved your preferred assignment is ' . $assigned_assignment . ' at the ' . $assigned_polling_place . '. Check your registration status here: ';
                $created_at = date("F j, Y h:i:s");

                $activity = $db->prepare('INSERT INTO ACTIVITIES (USERNAME, EMAIL, DESCRIPTION, CREATED_AT)
                 VALUES (:username, :email, :description, :created_at)');
                $activity->execute([
                    ':username' => $username,
                    ':email' => $email,
                    ':description' => $description,
                    ':created_at' => $created_at
                ]);


                $db->commit();
                redirect('/admin_volunteer_management?token=' . urlencode($_GET['token']));
            } catch (PDOException $e) {
                $db->rollBack();
                error_log('Error in inserting into the volunteers table: ' . $e->getMessage());
            }
        } catch (Exception $e) {
            error_log('Validation error: ' . $e->getMessage());
        }
    }


}