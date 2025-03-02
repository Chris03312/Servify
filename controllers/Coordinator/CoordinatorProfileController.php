<?php

require_once __DIR__ . '/../../models/Signup.php';
require_once __DIR__ . '/../../configuration/Database.php';

class CoordinatorProfileController
{

    public static function showConfirmProfile()
    {
        try {
            $cities = Signup::cities();
            $barangays = Signup::barangays(); // Get all barangays initially

            // If a city is selected, fetch the barangays for that city
            $selectedCity = $_GET['city'] ?? null;
            if ($selectedCity) {
                $barangays = Signup::barangays($selectedCity); // Filter by city
            }

            // Pass data to the view
            view('Coordinator/coordinator_profile', [
                'barangays' => $barangays,
                'cities' => $cities
            ]);
        } catch (PDOException $e) {
            error_log('Error in showing comfirm profile section' . $e->getMessage());
        }
    }

    public static function ConfirmProfile()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $db = Database::getConnection();
            $municipality = $_POST['municipality'];
            $district_no = $_POST['districtNumber'];
            $parish_name = $_POST['parishName'];
            $surname = $_POST['surname'];
            $firstName = $_POST['firstName'];
            $middleName = $_POST['middleName'];
            $suffix = $_POST['suffix'];
            $birthDate = $_POST['birthDate'];
            $birthMonth = $_POST['birthMonth'];
            $birthYear = $_POST['birthYear'];
            $street = $_POST['street'];
            $city = $_POST['municipality'];
            $barangay = $_POST['barangay'];
            $zipcode = $_POST['zipcode'];

            if (isset($_POST['orgMembership'])) {
                $orgMembership = $_POST['orgMembership'];
            } else {
                $orgMembership = $_POST['other'];
            }
            $prevExperienceDate = $_POST['prevExperienceDate'];
            $prevExperienceMonth = $_POST['prevExperienceMonth'];
            $prevExperienceYear = $_POST['prevExperienceYear'];
            $yearOfService = $_POST['yearOfService'];
            $email = $_POST['email'];

            $stmt = $db->prepare('SELECT EMAIL FROM ACCOUNTS WHERE EMAIL = :email');
            $stmt->execute(['email' => $email]);
            $emailExist = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($emailExist) {
                try {

                    $db->beginTransaction();

                    $stmt = $db->prepare('
                        INSERT INTO CPROFILE_TABLE
                        (
                            MUNICIPALITY, 
                            DISTRICT, 
                            PARISH, 
                            SURNAME, 
                            FIRST_NAME, 
                            MIDDLE_NAME, 
                            SUFFIX, 
                            BIRTH_DATE, 
                            BIRTH_MONTH, 
                            BIRTH_YEAR, 
                            STREEADDRESS, 
                            `MUNICIPALITY/CITY`, 
                            BARANGAY, 
                            ZIPCODE, 
                            ORG_MEMBERSHIP,
                            PREVIOUSE_PPCRV_EXP_DATE,
                            PREFERRED_PPCRV_EXP_MONTH,
                            PREFERRED_PPCRV_EXP_YEAR,
                            YEARS_SERVICE
                        ) VALUES 
                        (
                            :municipality,
                            :district_no,
                            :parish_name,
                            :surname,
                            :firstName,
                            :middleName,
                            :suffix,
                            :birthDate,
                            :birthMonth,
                            :birthYear,
                            :street,
                            :city,
                            :barangay,
                            :zipcode,
                            :orgMembership,
                            :prevExperienceDate,
                            :prevExperienceMonth,
                            :prevExperienceYear,
                            :yearsOfService
                        )');

                    $stmt->execute([
                        'municipality' => $municipality,
                        'district_no' => $district_no,
                        'parish_name' => $parish_name,
                        'surname' => $surname,
                        'firstName' => $firstName,
                        'middleName' => $middleName,
                        'suffix' => $suffix,
                        'birthDate' => $birthDate,
                        'birthMonth' => $birthMonth,
                        'birthYear' => $birthYear,
                        'street' => $street,
                        'city' => $city,
                        'barangay' => $barangay,
                        'zipcode' => $zipcode,
                        'orgMembership' => $orgMembership,
                        'prevExperienceDate' => $prevExperienceDate,
                        'prevExperienceMonth' => $prevExperienceMonth,
                        'prevExperienceYear' => $prevExperienceYear,
                        "yearsOfService" => $yearOfService
                    ]);

                    $db->commit();


                } catch (PDOException $e) {
                    $db->rollBack(); // Rollback on error
                    error_log('Error in submitting the Confirm form' . $e->getMessage());
                }
            } else {

            }
        }
    }
}