<?php

class ValidateFormsController {

    public static function ShowValidation() {
        view('volunteer_new_application');

    }
   public static function validateForms() {

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $input = array_merge($_POST, [
                'applicationDate' => date('F j, Y'),
                'status' => "Pending",
                'validId' => $_FILES['validId'],
            ]);

            $errors = self::validateForms($input);
            if (!empty($errors)) {
                error_log("Validation errors: " . json_encode($errors));
                echo json_encode(['status' => 'error', 'errors' => $errors]);
                return;
            }
        
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
        if (empty($input['validId'])) $errors['validId'] = 'Please upload the ID here.';
        if (empty($input['checkPledge'])) $errors['checkPledge'] = 'You must agree before submitting.';

        return $errors;
        }
    }
}
