<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Coordinator Details</title>
    <link rel="stylesheet" href="../css/volunteer_application.css">
    <link rel="stylesheet" href="../css/volunteer_sidebar.css">

    <!--BOOTSTRAP CSS CDN LINK-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!--BOOTSTRAP CDN ICONS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!--Font awesome CDN ICONS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

</head>

<body>

    <?php
    include('includes/admin_sidebar.php');
    ?>


    <!--MAIN CONTENT-->
    <main class="container-fluid p-3">

        <div class="container-fluid">
            <form method="POST" action="" enctype="multipart/form-data">
                <!--FORM-->

                <div class="d-flex flex-row justify-content-between align-items-start mb-3">
                    <h4>Coordinator's Profile</h4>
                    <!--BUTTONS - EDIT, PRINT, DELETE-->
                    <div class="d-none d-md-flex flex-row justify-content-center align-items-center gap-2">
                        <button type="button" class="btn" data-bs-toggle="modal"
                            data-bs-target="#accessRestrictionModal">
                            <i class="bi bi-pen text-primary fs-5"></i>
                        </button>

                        <button type="button" class="btn"><i class="bi bi-printer text-primary fs-5"></i></button>
                        <button type="button" class="btn"><i class="bi bi-trash text-danger fs-5"></i></button>
                    </div>

                    <!--BUTTONS FOR SMALER SCREEN - EDIT, PRINT, DELETE-->

                    <div class="d-md-none d-flex flex-row justify-content-center align-items-center gap-2">
                        <div class="dropdown">
                            <button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false"><i
                                    class="bi bi-three-dots-vertical"></i></button>
                            </button>
                            <div class="dropdown-menu">
                                <div class="d-flex flex-column flex-row justify-content-center align-items-center">
                                    <button type="button" class="btn" data-bs-toggle="modal"
                                        data-bs-target="#accessRestrictionModal">
                                        <i class="bi bi-pen text-primary fs-5"></i>
                                    </button>
                                    <button type="button" class="btn"><i
                                            class="bi bi-printer text-primary fs-5"></i></button>
                                    <button type="button" class="btn"><i
                                            class="bi bi-trash text-danger fs-5"></i></button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>




                <!--MODAL - EDIT ACCESS RESTRICTIONS-->
                <div class="modal fade" id="accessRestrictionModal" tabindex="-1"
                    aria-labelledby="accessRestrictionModalLabel" aria-hidden="true" data-bs-backdrop="false">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-primary p-2">
                            </div>
                            <div class="modal-body">
                                <div class="d-flex flex-row justify-content-start align-items-center gap-2 mb-4">
                                    <i class="bi bi-calendar"></i>
                                    <span class="text-danger fs-4">Edit Access Restriction</span>
                                </div>

                                <div class="mb-3">
                                    <label for="datepicker" class="form-label mb-3">Select Date</label>

                                    <p><strong>From:</strong></p>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                                        <input type="text" id="datepicker" class="form-control">
                                    </div>

                                    <p><strong>To:</strong></p>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                                        <input type="text" id="datepicker" class="form-control">
                                    </div>
                                </div>

                                <div class="d-flex flex-row justify-content-around align-items-center gap-3">
                                    <button type="button" class="btn btn-outline-secondary px-5"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" name="yesSubmit" class="btn btn-primary px-5">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




                <!--VOLUNTEER INFO-->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="coor-profile-tab" data-bs-toggle="tab"
                            data-bs-target="#coor-profile-tab-pane" type="button" role="tab"
                            aria-controls="coor-profile-tab-pane" aria-selected="true">Coordinator's Profile</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="assigned-precinct-tab" data-bs-toggle="tab"
                            data-bs-target="#assigned-precinct-tab-pane" type="button" role="tab"
                            aria-controls="assigned-precinct-tab-pane" aria-selected="false">Assigned Precinct</button>
                    </li>
                </ul>


                <div class="tab-content border-start border-end border-bottom" id="myTabContent"
                    style="border-top: 10px solid blue;">


                    <!--COORDINATOR'S PROFILE TAB-->
                    <div class="tab-pane fade show active p-3" id="coor-profile-tab-pane" role="tabpanel"
                        aria-labelledby="coor-profile-tab" tabindex="0">

                        <div class="row">

                            <div class="double-line-text">
                                <hr class="line">
                                <h5 class="text">Coordinator's Profile</h5>
                                <hr class="line">
                            </div>


                            <!-- COORDINATOR'S PROFILE PICTURE -->
                            <div class="d-flex justify-content-end">
                                <img src="../img/DPPAM LOGO.png" alt="Coordinator's Profile" class="img-thumbnail"
                                    style="width: 150px; height: 150px;">
                            </div>



                            <span class="mb-3"><strong>Assigned as Coordinator at:</strong></span>
                            <div class="col-md-3 mb-3">
                                <label for="city" class="form-label">Municipality</label>
                                <input type="text" class="form-control" id="city" name="city"
                                    value="<?php echo $coordinatorData['MUNICIPALITY/CITY']; ?>" required readonly>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="district" class="form-label">District No.</label>
                                <input type="text" class="form-control" id="district" name="district"
                                    value="<?php echo $coordinatorData['DISTRICT']; ?>" required readonly>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="barangay" class="form-label">Barangay</label>
                                <input type="text" class="form-control" id="barangay" name="barangay"
                                    value="<?php echo $coordinatorData['BARANGAY']; ?>" required readonly>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="parishName" class="form-label">Parish Name</label>
                                <input type="text" class="form-control" id="parishName" name="parishName"
                                    value="<?php echo $coordinatorData['PARISH']; ?>" required readonly>
                            </div>


                            <!-- NAME -->

                            <span><strong>Name:</strong></span>
                            <div class="col-md-3 mb-3">
                                <label for="surname" class="form-label">Surname</label>
                                <input type="text" class="form-control" id="surname" name="surname"
                                    value="<?php echo $coordinatorData['SURNAME']; ?>" required readonly>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="firstname" class="form-label">First name</label>
                                <input type="text" class="form-control" id="firstname" name="firstName"
                                    value="<?php echo $coordinatorData['FIRST_NAME']; ?>" required readonly>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="middlename" class="form-label">Middle name</label>
                                <input type="text" class="form-control" id="middlename" name="middleName"
                                    value="<?php echo $coordinatorData['MIDDLE_NAME']; ?>" required readonly>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="suffix" class="form-label">Suffix</label>
                                <input type="text" class="form-control" id="suffix" name="suffix"
                                    placeholder="e.g., Jr., Sr., III, IV"
                                    value="<?php echo $coordinatorData['SUFFIX']; ?>" required readonly>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="sex" class="form-label">Sex</label>
                                <select id="sex" name="sex" class="form-select" required disabled>
                                    <option disabled value="">Select Sex</option>
                                    <option value="Male" <?php echo ($coordinatorData['SEX'] ?? '') === 'Male' ? 'selected' : ''; ?>>Male</option>
                                    <option value="Female" <?php echo ($coordinatorData['SEX'] ?? '') === 'Female' ? 'selected' : ''; ?>>Female</option>
                                </select>

                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="Nickname" class="form-label">Nickname</label>
                                <input type="text" class="form-control" id="Nickname" name="Nickname"
                                    value="<?php echo $coordinatorData['NICKNAME']; ?>" required readonly>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="civilStatus" class="form-label">Civil Status</label>
                                <select id="civilStatus" name="civilStatus" class="form-select" required disabled>
                                    <option disabled value="">Select Status</option>
                                    <option value="Single" <?php echo ($coordinatorData['CIVIL_STATUS'] ?? '') === 'Single' ? 'selected' : ''; ?>>Single</option>
                                    <option value="Married" <?php echo ($coordinatorData['CIVIL_STATUS'] ?? '') === 'Married' ? 'selected' : ''; ?>>Married</option>
                                    <option value="Separated" <?php echo ($coordinatorData['CIVIL_STATUS'] ?? '') === 'Separated' ? 'selected' : ''; ?>>Separated</option>
                                    <option value="Divorced" <?php echo ($coordinatorData['CIVIL_STATUS'] ?? '') === 'Divorced' ? 'selected' : ''; ?>>Divorced</option>
                                    <option value="Widowed" <?php echo ($coordinatorData['CIVIL_STATUS'] ?? '') === 'Widowed' ? 'selected' : ''; ?>>Widowed</option>
                                    <option value="Widower" <?php echo ($coordinatorData['CIVIL_STATUS'] ?? '') === 'Widower' ? 'selected' : ''; ?>>Widower</option>
                                    <option value="Annulled" <?php echo ($coordinatorData['CIVIL_STATUS'] ?? '') === 'Annulled' ? 'selected' : ''; ?>>Annulled</option>
                                    <option value="Single Parent" <?php echo ($coordinatorData['CIVIL_STATUS'] ?? '') === 'Single Parent' ? 'selected' : ''; ?>>Single Parent</option>
                                </select>
                            </div>

                            <span><strong>Birthdate:</strong></span>
                            <div class="col-md-2 mb-3">
                                <label for="birthDate" class="form-label">Date</label>
                                <input type="text" class="form-control" id="birthDate" name="birthDate"
                                    placeholder="Date" value="<?php echo $coordinatorData['BIRTH_DATE']; ?>" required
                                    readonly>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="birthMonth" class="form-label">Month</label>
                                <select id="birthMonth" name="birthMonth" class="form-select" aria-readonly="true"
                                    required disabled>
                                    <option value="" disabled>Select month</option>
                                    <option value="January" <?php echo ($coordinatorData['BIRTH_MONTH'] ?? '') === 'January' ? 'selected' : ''; ?>>January</option>
                                    <option value="February" <?php echo ($coordinatorData['BIRTH_MONTH'] ?? '') === 'February' ? 'selected' : ''; ?>>February</option>
                                    <option value="March" <?php echo ($coordinatorData['BIRTH_MONTH'] ?? '') === 'March' ? 'selected' : ''; ?>>March</option>
                                    <option value="April" <?php echo ($coordinatorData['BIRTH_MONTH'] ?? '') === 'April' ? 'selected' : ''; ?>>April</option>
                                    <option value="May" <?php echo ($coordinatorData['BIRTH_MONTH'] ?? '') === 'May' ? 'selected' : ''; ?>>May</option>
                                    <option value="June" <?php echo ($coordinatorData['BIRTH_MONTH'] ?? '') === 'June' ? 'selected' : ''; ?>>June</option>
                                    <option value="July" <?php echo ($coordinatorData['BIRTH_MONTH'] ?? '') === 'July' ? 'selected' : ''; ?>>July</option>
                                    <option value="August" <?php echo ($coordinatorData['BIRTH_MONTH'] ?? '') === 'August' ? 'selected' : ''; ?>>August</option>
                                    <option value="September" <?php echo ($coordinatorData['BIRTH_MONTH'] ?? '') === 'September' ? 'selected' : ''; ?>>September</option>
                                    <option value="October" <?php echo ($coordinatorData['BIRTH_MONTH'] ?? '') === 'October' ? 'selected' : ''; ?>>October</option>
                                    <option value="November" <?php echo ($coordinatorData['BIRTH_MONTH'] ?? '') === 'November' ? 'selected' : ''; ?>>November</option>
                                    <option value="December" <?php echo ($coordinatorData['BIRTH_MONTH'] ?? '') === 'December' ? 'selected' : ''; ?>>December</option>
                                </select>
                            </div>

                            <div class="col-md-2 mb-3">
                                <label for="birthYear" class="form-label">Year</label>
                                <input type="text" class="form-control" id="birthYear" name="birthYear"
                                    placeholder="Year" value="<?php echo $coordinatorData['BIRTH_YEAR']; ?>" readonly>
                            </div>

                            <div class="col-md-2 mb-3">
                                <label for="age" class="form-label">Age</label>
                                <input type="text" class="form-control" id="age" name="age" value="" readonly>
                            </div>


                            <script>
                                document.addEventListener("DOMContentLoaded", function () {
                                    // Function to calculate Age
                                    function calculateAge() {
                                        const birthYearInput = document.getElementById('birthYear');
                                        const ageInput = document.getElementById('age');

                                        const birthYear = parseInt(birthYearInput.value, 10);
                                        const currentYear = new Date().getFullYear();

                                        // Validate the birth year and calculate the age
                                        if (!isNaN(birthYear) && birthYear > 1900 && birthYear <= currentYear) {
                                            ageInput.value = currentYear - birthYear;
                                        } else {
                                            ageInput.value = ''; // Clear the age input for invalid birth years
                                        }
                                    }

                                    // Function to calculate Year of Service
                                    function calculateYearOfService() {
                                        const prevExperienceYearInput = document.getElementById('prevExperienceYear');
                                        const yearOfServiceInput = document.getElementById('yearOfService');

                                        // Get the value of the previous experience year and the current year
                                        const prevExperienceYear = parseInt(prevExperienceYearInput.value, 10);
                                        const currentYear = new Date().getFullYear();

                                        // Validate the previous experience year and calculate the year of service
                                        if (!isNaN(prevExperienceYear) && prevExperienceYear > 1900 && prevExperienceYear <= currentYear) {
                                            // Calculate the year of service
                                            yearOfServiceInput.value = currentYear - prevExperienceYear;
                                        } else {
                                            // Clear the year of service input for invalid year input
                                            yearOfServiceInput.value = '';
                                        }
                                    }

                                    // Attach the event listeners for input fields
                                    const birthYearInput = document.getElementById('birthYear');
                                    if (birthYearInput) {
                                        birthYearInput.addEventListener('input', calculateAge);
                                    }

                                    const prevExperienceYearInput = document.getElementById('prevExperienceYear');
                                    if (prevExperienceYearInput) {
                                        prevExperienceYearInput.addEventListener('input', calculateYearOfService);
                                    }

                                    // Initialize calculation if birthYear or prevExperienceYear has value on page load
                                    if (birthYearInput.value) {
                                        calculateAge();
                                    }
                                    if (prevExperienceYearInput.value) {
                                        calculateYearOfService();
                                    }
                                });
                            </script>

                            <div class="col-md-3 mb-3">
                                <label for="citizenship" class="form-label">Citizenship</label>
                                <input type="text" class="form-control" id="citizenship" name="citizenship"
                                    value="<?php echo $coordinatorData['CITIZENSHIP']; ?>" required readonly>
                                <div class="invalid-feedback">
                                    Please input citizenship.
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="occupation" class="form-label">Occupation</label>
                                <input type="text" class="form-control" id="occupation" name="occupation"
                                    value="<?php echo $coordinatorData['OCCUPATION']; ?>" required readonly>
                                <div class="invalid-feedback">
                                    Write <strong>N/A</strong> if none.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="companyName" class="form-label">Company Name</label>
                                <input type="text" class="form-control" id="companyName" name="companyName"
                                    value="<?php echo $coordinatorData['COMPANY_NAME']; ?>" required readonly>
                                <div class="invalid-feedback">
                                    Write <strong>N/A</strong> if none.
                                </div>
                            </div>


                            <div class="double-line-text">
                                <hr class="line">
                                <h5 class="text">Contact Details</h5>
                                <hr class="line">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="street" class="form-label">Street/Unit/Bldg/Village (Optional)</label>
                                <input type="text" class="form-control" readonly id="street" name="streetAddress"
                                    value="<?php echo $coordinatorData['STREETADDRESS']; ?>" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="city1" class="form-label">Municipality</label>
                                <input type="text" class="form-control" readonly id="city1" name="city1"
                                    value="<?php echo $coordinatorData['MUNICIPALITY/CITY']; ?>" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="barangay1" class="form-label">Barangay</label>
                                <input type="text" class="form-control" readonly id="barangay1" name="barangay1"
                                    value="<?php echo $coordinatorData['BARANGAY']; ?>" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="zipcode" class="form-label">Zipcode</label>
                                <input type="text" class="form-control" readonly id="zipcode" name="zipcode"
                                    value="<?php echo $coordinatorData['ZIPCODE']; ?>" required>
                                <div class="invalid-feedback">
                                    Please input zipcode.
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" readonly id="email" name="email"
                                    value="<?php echo $coordinatorData['EMAIL']; ?>" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="mobileNumber" class="form-label">Mobile Number</label>
                                <input type="text" class="form-control" id="mobileNumber" name="mobileNumber"
                                    value="<?php echo $coordinatorData['CELLPHONE_NO']; ?>" required readonly>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="telNumber" class="form-label">Tel no.</label>
                                <input type="text" class="form-control" id="telNumber" name="telNumber"
                                    value="<?php echo $coordinatorData['TELEPHONE_NO']; ?>" required readonly>
                            </div>

                            <div class="double-line-text">
                                <hr class="line">
                                <h5 class="text">Additional Information</h5>
                                <hr class="line">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="prevOrgMem" class="form-label">Parish Organization Membership</label>
                                <input type="text" class="form-control" id="prevOrgMem" name="prevOrgMem"
                                    value="<?php echo $coordinatorData['ORG_MEMBERSHIP']; ?>" required readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="prevAssignment" class="form-label">Previous PPCRV Assignment</label>
                                <input type="text" class="form-control" id="prevAssignment" name="prevAssignment"
                                    value="<?php echo $coordinatorData['PREVIOUS_PPCRV_VOL_ASS']; ?>" required readonly>
                            </div>

                            <span>Previous PPCRV Experience</span>
                            <div class="col-md-3 mb-3">
                                <label for="prevExpDate" class="form-label">Date</label>
                                <input type="text" class="form-control" readonly id="prevExpDate" name="prevExpDate"
                                    placeholder="Date"
                                    value="<?php echo $coordinatorData['PREVIOUS_PPCRV_EXP_DATE']; ?>" required
                                    readonly>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="prevExpMonth" class="form-label">Month</label>
                                <select id="prevExpMonth" name="prevExpMonth" class="form-select" aria-readonly="true"
                                    required disabled>
                                    <option value="" disabled>Select month</option>
                                    <option value="January" <?php echo ($coordinatorData['PREVIOUS_PPCRV_EXP_MONTH'] ?? '') === 'January' ? 'selected' : ''; ?>>January</option>
                                    <option value="February" <?php echo ($coordinatorData['PREVIOUS_PPCRV_EXP_MONTH'] ?? '') === 'February' ? 'selected' : ''; ?>>February</option>
                                    <option value="March" <?php echo ($coordinatorData['PREVIOUS_PPCRV_EXP_MONTH'] ?? '') === 'March' ? 'selected' : ''; ?>>March</option>
                                    <option value="April" <?php echo ($coordinatorData['PREVIOUS_PPCRV_EXP_MONTH'] ?? '') === 'April' ? 'selected' : ''; ?>>April</option>
                                    <option value="May" <?php echo ($coordinatorData['PREVIOUS_PPCRV_EXP_MONTH'] ?? '') === 'May' ? 'selected' : ''; ?>>May</option>
                                    <option value="June" <?php echo ($coordinatorData['PREVIOUS_PPCRV_EXP_MONTH'] ?? '') === 'June' ? 'selected' : ''; ?>>June</option>
                                    <option value="July" <?php echo ($coordinatorData['PREVIOUS_PPCRV_EXP_MONTH'] ?? '') === 'July' ? 'selected' : ''; ?>>July</option>
                                    <option value="August" <?php echo ($coordinatorData['PREVIOUS_PPCRV_EXP_MONTH'] ?? '') === 'August' ? 'selected' : ''; ?>>August</option>
                                    <option value="September" <?php echo ($coordinatorData['PREVIOUS_PPCRV_EXP_MONTH'] ?? '') === 'September' ? 'selected' : ''; ?>>September</option>
                                    <option value="October" <?php echo ($coordinatorData['PREVIOUS_PPCRV_EXP_MONTH'] ?? '') === 'October' ? 'selected' : ''; ?>>October</option>
                                    <option value="November" <?php echo ($coordinatorData['PREVIOUS_PPCRV_EXP_MONTH'] ?? '') === 'November' ? 'selected' : ''; ?>>November</option>
                                    <option value="December" <?php echo ($coordinatorData['PREVIOUS_PPCRV_EXP_MONTH'] ?? '') === 'December' ? 'selected' : ''; ?>>December</option>
                                </select>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="prevExpYear" class="form-label">Year</label>
                                <input type="text" class="form-control" id="prevExpYear" name="prevExpYear"
                                    placeholder="Year"
                                    value="<?php echo $coordinatorData['PREVIOUS_PPCRV_EXP_YEAR']; ?>" readonly>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="yearsOfServices" class="form-label">Years of service</label>
                                <input type="text" class="form-control" id="yearsOfServices" name="yearsOfServices"
                                    placeholder="Year" value="<?php echo $coordinatorData['YEARS_SERVICE']; ?>"
                                    readonly>
                            </div>







                        </div>


                    </div>

                    <!--DOCUMENTS-->
                    <div class="tab-pane fade p-3" id="assigned-precinct-tab-pane" role="tabpanel"
                        aria-labelledby="assigned-precinct-tab" tabindex="0">

                        <section>
                            <p class="text-muted mb-3">List of Precinct managed by the cooordinator</p>
                        </section>


                        <!-- TABLE -->

                        <section class="table-responsive">
                            <table class="table">
                                <thead class="table-primary">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name of School</th>
                                        <th scope="col">Barangay</th>
                                        <th scope="col">City/Municipality</th>
                                        <th scope="col">Total Registered Volunteers</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>MES</td>
                                        <td>PPP</td>
                                        <td>QC</td>
                                        <td>3</td>
                                        <td><button type="button" class="btn btn-sm text-danger"><i
                                                    class="bi-trash me-2"></i><span>Delete</span></button></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>LES</td>
                                        <td>BGL</td>
                                        <td>QC</td>
                                        <td>2</td>
                                        <td><button type="button" class="btn btn-sm text-danger"><i
                                                    class="bi-trash me-2"></i><span>Delete</span></button></td>
                                    </tr>

                                </tbody>
                            </table>
                        </section>


                    </div>



                </div>





        </div>
        </form>


        <!--SAMPLE CODE PAG NAG YES SA CONFIRMATION-->
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['yesSubmit'])) {
            echo "
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var submittedSuccessfully = new bootstrap.Modal(document.getElementById('submittedSuccessfully'));
                submittedSuccessfully.show();
            });
        </script>
        ";
        }
        ?>

        </div>





    </main>
    </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            flatpickr('#datepicker', {
                dateFormat: 'Y-m-d', // Customize the format (e.g., YYYY-MM-DD)
            });
        });
    </script>

    <!-- Flatpickr JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


    <!--BOOTSTRAP JS CDN LINK-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>