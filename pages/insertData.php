<form action="insert_volunteer.php" method="POST" enctype="multipart/form-data">
    <label>Account ID:</label>
    <input type="text" name="account_id" required><br>

    <label>Profile Picture:</label>
    <input type="file" name="iby_picture"><br>

    <label>Role:</label>
    <input type="text" name="role"><br>

    <label>Assigned Assignment:</label>
    <input type="text" name="assigned_assignment"><br>

    <label>Assigned Polling Place:</label>
    <input type="text" name="assigned_polling_place"><br>

    <label>Parish:</label>
    <input type="text" name="parish"><br>

    <label>Precinct No:</label>
    <input type="text" name="precinct_no"><br>

    <label>First Name:</label>
    <input type="text" name="first_name" required><br>

    <label>Middle Name:</label>
    <input type="text" name="middle_name"><br>

    <label>Surname:</label>
    <input type="text" name="surname" required><br>

    <label>Name Suffix:</label>
    <input type="text" name="name_suffix"><br>

    <label>Gender:</label>
    <select name="gender">
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select><br>

    <label>Nickname:</label>
    <input type="text" name="nickname"><br>

    <label>Civil Status:</label>
    <input type="text" name="civil_status"><br>

    <!-- Birthdate (Separated Fields) -->
    <label>Birthdate:</label>
    <select name="birthmonth">
        <option value="January">January</option>
        <option value="February">February</option>
        <option value="March">March</option>
        <option value="April">April</option>
        <option value="May">May</option>
        <option value="June">June</option>
        <option value="July">July</option>
        <option value="August">August</option>
        <option value="September">September</option>
        <option value="October">October</option>
        <option value="November">November</option>
        <option value="December">December</option>
    </select>
    <input type="number" name="birthday" min="1" max="31" placeholder="Day">
    <input type="number" name="birthyear" min="1900" placeholder="Year"><br>

    <label>Age:</label>
    <input type="number" name="age" min="0"><br>

    <label>Citizenship:</label>
    <input type="text" name="citizenship"><br>

    <label>Occupation:</label>
    <input type="text" name="occupation"><br>

    <label>Company Name:</label>
    <input type="text" name="company_name"><br>

    <label>Street Address:</label>
    <input type="text" name="streetaddress"><br>

    <label>District:</label>
    <input type="text" name="district"><br>

    <label>City:</label>
    <input type="text" name="city"><br>

    <label>Barangay:</label>
    <input type="text" name="barangay"><br>

    <label>Zipcode:</label>
    <input type="text" name="zipcode"><br>

    <label>Email:</label>
    <input type="email" name="email" required><br>

    <label>Mobile Number:</label>
    <input type="text" name="mobile_number" required><br>

    <label>Telephone Number:</label>
    <input type="text" name="telephone_number"><br>

    <label>Parish Org Member:</label>
    <select name="parish_org_mem">
        <option value="Yes">Yes</option>
        <option value="No">No</option>
    </select><br>

    <!-- Previous PPCRV Experience Date (Separated Fields) -->
    <label>Previous PPCRV Experience:</label>
    <select name="prev_ppcrv_exp_month">
        <option value="January">January</option>
        <option value="February">February</option>
        <option value="March">March</option>
        <option value="April">April</option>
        <option value="May">May</option>
        <option value="June">June</option>
        <option value="July">July</option>
        <option value="August">August</option>
        <option value="September">September</option>
        <option value="October">October</option>
        <option value="November">November</option>
        <option value="December">December</option>
    </select>
    <input type="number" name="prev_ppcrv_exp_date" min="1" max="31" placeholder="Day">
    <input type="number" name="prev_ppcrv_exp_year" min="1900" placeholder="Year"><br>

    <label>Previous PPCRV Years of Service:</label>
    <input type="number" name="prev_ppcrv_exp_years_of_serv"><br>

    <label>Previous PPCRV Volunteer Assignment:</label>
    <input type="text" name="prev_ppcrv_vol_ass"><br>

    <label>Previous Precinct:</label>
    <input type="text" name="prev_precinct"><br>

    <label>Preferred PPCRV Volunteer Assignment:</label>
    <input type="text" name="pref_ppcrv_vol_ass"><br>

    <!-- Date Registered (Separated Fields) -->
    <label>Date Registered:</label>
    <select name="date_registered_month">
        <option value="January">January</option>
        <option value="February">February</option>
        <option value="March">March</option>
        <option value="April">April</option>
        <option value="May">May</option>
        <option value="June">June</option>
        <option value="July">July</option>
        <option value="August">August</option>
        <option value="September">September</option>
        <option value="October">October</option>
        <option value="November">November</option>
        <option value="December">December</option>
    </select>
    <input type="number" name="date_registered_day" min="1" max="31" placeholder="Day">
    <input type="number" name="date_registered_year" min="1900" placeholder="Year"><br>

    <!-- Date Approved (Separated Fields) -->
    <label>Date Approved:</label>
    <select name="date_approved_month">
        <option value="January">January</option>
        <option value="February">February</option>
        <option value="March">March</option>
        <option value="April">April</option>
        <option value="May">May</option>
        <option value="June">June</option>
        <option value="July">July</option>
        <option value="August">August</option>
        <option value="September">September</option>
        <option value="October">October</option>
        <option value="November">November</option>
        <option value="December">December</option>
    </select>
    <input type="number" name="date_approved_day" min="1" max="31" placeholder="Day">
    <input type="number" name="date_approved_year" min="1900" placeholder="Year"><br>

    <button type="submit">Submit</button>
</form>

<?php
// Database Connection
$host = "localhost"; // Change if needed
$username = "root";  // Change if needed
$password = "";      // Change if needed
$database = "dppam"; // Change to your actual database

$conn = new mysqli($host, $username, $password, $database);

// Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve POST Data
$account_id = $_POST['account_id'];
$role = $_POST['role'];
$assigned_assignment = $_POST['assigned_assignment'];
$assigned_polling_place = $_POST['assigned_polling_place'];
$parish = $_POST['parish'];
$precinct_no = $_POST['precinct_no'];
$first_name = $_POST['first_name'];
$middle_name = $_POST['middle_name'];
$surname = $_POST['surname'];
$name_suffix = $_POST['name_suffix'];
$gender = $_POST['gender'];
$nickname = $_POST['nickname'];
$civil_status = $_POST['civil_status'];
$age = $_POST['age'];
$citizenship = $_POST['citizenship'];
$occupation = $_POST['occupation'];
$company_name = $_POST['company_name'];
$streetaddress = $_POST['streetaddress'];
$district = $_POST['district'];
$city = $_POST['city'];
$barangay = $_POST['barangay'];
$zipcode = $_POST['zipcode'];
$email = $_POST['email'];
$mobile_number = $_POST['mobile_number'];
$telephone_number = $_POST['telephone_number'];
$parish_org_mem = $_POST['parish_org_mem'];
$prev_ppcrv_exp_years_of_serv = $_POST['prev_ppcrv_exp_years_of_serv'];
$prev_ppcrv_vol_ass = $_POST['prev_ppcrv_vol_ass'];
$prev_precinct = $_POST['prev_precinct'];
$pref_ppcrv_vol_ass = $_POST['pref_ppcrv_vol_ass'];

// Handling Date Fields
$birthdate = $_POST['birthyear'] . '-' . $_POST['birthmonth'] . '-' . $_POST['birthday'];
$prev_ppcrv_exp_date = $_POST['prev_ppcrv_exp_year'] . '-' . $_POST['prev_ppcrv_exp_month'] . '-' . $_POST['prev_ppcrv_exp_date'];
$date_registered = $_POST['date_registered_year'] . '-' . $_POST['date_registered_month'] . '-' . $_POST['date_registered_day'];
$date_approved = $_POST['date_approved_year'] . '-' . $_POST['date_approved_month'] . '-' . $_POST['date_approved_day'];

// Handling File Upload
$iby_picture = "";
if (isset($_FILES['iby_picture']) && $_FILES['iby_picture']['error'] == 0) {
    $upload_dir = "uploads/"; // Change this to your actual upload directory
    $iby_picture = $upload_dir . basename($_FILES['iby_picture']['name']);
    move_uploaded_file($_FILES['iby_picture']['tmp_name'], $iby_picture);
}

// SQL Insert Query
$sql = "INSERT INTO volunteers_tbl (
            ACCOUNT_ID, ROLE, ASSIGNED_ASSIGNMENT, ASSIGNED_POLLING_PLACE, PARISH, PRECINCT_NO,
            FIRST_NAME, MIDDLE_NAME, SURNAME, NAME_SUFFIX, GENDER, NICKNAME, CIVIL_STATUS, 
            BIRTHMONTH, BIRTHDAY, BIRTHYEAR, AGE, CITIZENSHIP, OCCUPATION, COMPANY_NAME, 
            STREETADDRESS, DISTRICT, CITY, BARANGAY, ZIPCODE, EMAIL, MOBILE_NUMBER, TELEPHONE_NUMBER,
            PARISH_ORG_MEM, PREV_PPCRV_EXP_DATE, PREV_PPCRV_EXP_MONTH, PREV_PPCRV_EXP_YEAR, 
            PREV_PPCRV_EXP_YEARS_OF_SERV, PREV_PPCRV_VOL_ASS, PREV_PRECINCT, PREF_PPCRV_VOL_ASS, 
            DATE_REGISTERED, DATE_APPROVED, IBYPICTURE
        ) VALUES (
            ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
        )";

// Prepare Statement
$stmt = $conn->prepare($sql);
$stmt->bind_param(
    "ssssssssssssssssssssssssssssssssssss",
    $account_id, $role, $assigned_assignment, $assigned_polling_place, $parish, $precinct_no,
    $first_name, $middle_name, $surname, $name_suffix, $gender, $nickname, $civil_status,
    $_POST['birthmonth'], $_POST['birthday'], $_POST['birthyear'], $age, $citizenship, $occupation, $company_name,
    $streetaddress, $district, $city, $barangay, $zipcode, $email, $mobile_number, $telephone_number,
    $parish_org_mem, $_POST['prev_ppcrv_exp_date'], $_POST['prev_ppcrv_exp_month'], $_POST['prev_ppcrv_exp_year'],
    $prev_ppcrv_exp_years_of_serv, $prev_ppcrv_vol_ass, $prev_precinct, $pref_ppcrv_vol_ass,
    $date_registered, $date_approved, $iby_picture
);

// Execute Query
if ($stmt->execute()) {
    echo "Volunteer record inserted successfully.";
} else {
    echo "Error: " . $stmt->error;
}

// Close Connection
$stmt->close();
$conn->close();
?>
