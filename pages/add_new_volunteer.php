<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coordinator | Add New Volunteer</title>
    <link rel="stylesheet" href="../css/volunteer_application.css">
    <link rel="stylesheet" href="../css/volunteer_sidebar.css">

    <!--BOOTSTRAP CSS CDN LINK-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!--BOOTSTRAP CDN ICONS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!--Font awesome CDN ICONS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <?php
    include('includes/coordinator_sidebar.php');
    ?>


    <!--MAIN CONTENT-->
    <main class="container-fluid p-3">

        <div class="container-fluid">
            <form method="POST" action="/volunteer_new_application/submit" enctype="multipart/form-data">
                <!--FORM-->
                <!--PHOTO AND NAME-->
                <div class="d-flex flex-row align-items-center mb-3">
                    <!-- PHOTO -->
                    <div class="upload-box me-3" id="drop-area">
                        <i class="fas fa-camera upload-icon"></i>
                        <img id="preview" src="" alt="Preview">
                        <input type="file" id="file-input" accept="image/*">
                    </div>

                    <div class="d-flex flex-column">
                        <!-- NAME -->
                        <span>Nameeeeee</span>

                        <!-- ROLE -->
                        <span>Role</span>

                        <!-- CHURCH -->
                        <span>Church</span>

                        <!-- MEMBER # -->
                        <span>Membership no. :</span>

                        <!-- STATUS -->
                        <span>Status</span>
                    </div>
                </div>

                <!--VOLUNTEER INFO-->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Volunteer Info</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Upload & Agree</button>
                    </li>
                </ul>
                <div class="tab-content border-start border-end border-bottom" id="myTabContent" style="border-top: 10px solid blue;">

                    <!--VOLUNTEER INFO-->
                    <div class="tab-pane fade show active p-3" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">



                        <div class="row">

                            <div class="double-line-text">
                                <hr class="line">
                                <h5 class="text">Volunteer Information</h5>
                                <hr class="line">
                            </div>

                            <div class="row mb-3">
                                <label for="precinctNumber" class="col-md-2 col-form-label">Precinct Number:<sup class="text-danger fw-bold">*</sup></label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" id="precinctNumber" name="precinctNumber" required>
                                    <div class="invalid-feedback">
                                        Please input precinct number.
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="firstname" class="form-label">First name<sup class="text-danger fw-bold">*</sup></label>
                                <input type="text" class="form-control" id="firstname" name="firstName" required>
                                <div class="invalid-feedback">
                                    Please input first name.
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="middlename" class="form-label">Middle name<sup class="text-danger fw-bold">*</sup></label>
                                <input type="text" class="form-control" id="middlename" name="middleName" required>
                                <div class="invalid-feedback">
                                    Write <strong>N/A</strong> if none.
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="surname" class="form-label">Surname<sup class="text-danger fw-bold">*</sup></label>
                                <input type="text" class="form-control" id="surname" name="surname" required>
                                <div class="invalid-feedback">
                                    Please input surname.
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="suffix" class="form-label">Suffix<sup class="text-danger fw-bold">*</sup></label>
                                <input type="text" class="form-control" id="suffix" name="suffix" required>
                                <div class="invalid-feedback">
                                    Write <strong>N/A</strong> if none.
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="sex" class="form-label">Sex<sup class="text-danger fw-bold">*</sup></label>
                                <select id="sex" name="sex" class="form-select" required>
                                    <option selected disabled value="">Select Sex</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select sex.
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="Nickname" class="form-label">Nickname<sup class="text-danger fw-bold">*</sup></label>
                                <input type="text" class="form-control" id="Nickname" name="Nickname" required>
                                <div class="invalid-feedback">
                                    Write <strong>N/A</strong> if none.
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="civilStauts" class="form-label">Civil Status<sup class="text-danger fw-bold">*</sup></label>
                                <select id="civilStatus" name="civilStatus" class="form-select" required>
                                    <option selected disabled value="">Select Status</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Separated">Separated</option>
                                    <option value="Divorced">Divorced</option>
                                    <option value="Widowed">Widowed</option>
                                    <option value="Widower">Widower</option>
                                    <option value="Annulled">Annulled</option>
                                    <option value="Single Parent">Single Parent</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select civil status.
                                </div>
                            </div>

                            <div class="col-md-2 mb-3">
                                <label for="birthDate" class="form-label">Birth Day</label>
                                <input type="text" class="form-control" readonly id="birthDate" name="birthDate" placeholder="Date" required>
                                <div class="invalid-feedback">
                                    Please input birth date.
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="birthMonth" class="form-label">&nbsp;</label>
                                <select id="birthMonth" name="birthMonth" class="form-select" aria-readonly="true" required>
                                    <option value="January">January</option>
                                    <option value="January">January</option>
                                    <option value="January">January</option>
                                    <option value="January">January</option>
                                    <option value="January">January</option>
                                    <option value="January">January</option>
                                    <option value="January">January</option>
                                    <option value="January">January</option>
                                    <option value="January">January</option>
                                    <option value="January">January</option>
                                    <option value="January">January</option>
                                    <option value="January">January</option>

                                </select>
                                <div class="invalid-feedback">
                                    Please select birth month.
                                </div>
                            </div>

                            <div class="col-md-2 mb-3">
                                <label for="suffix" class="form-label">&nbsp;</label>
                                <input type="text" class="form-control" id="birthYear" name="birthYear" placeholder="Year" required oninput="calculateAge()" readonly>
                                <div class="invalid-feedback">
                                    Please input birth year.
                                </div>
                            </div>

                            <div class="col-md-2 mb-3">
                                <label for="age" class="form-label">Age<sup class="text-danger fw-bold">*</sup></label>
                                <input type="text" class="form-control" id="age" name="age" value="" readonly>
                            </div>

                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
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
                                <label for="citizenship" class="form-label">Citizenship<sup class="text-danger fw-bold">*</sup></label>
                                <input type="text" class="form-control" id="citizenship" name="citizenship" required>
                                <div class="invalid-feedback">
                                    Please input citizenship.
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="occupation" class="form-label">Occupation<sup class="text-danger fw-bold">*</sup></label>
                                <input type="text" class="form-control" id="occupation" name="occupation" required>
                                <div class="invalid-feedback">
                                    Write <strong>N/A</strong> if none.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="companyName" class="form-label">Company Name<sup class="text-danger fw-bold">*</sup></label>
                                <input type="text" class="form-control" id="companyName" name="companyName" required>
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
                                <input type="text" class="form-control" readonly id="street" name="streetAddress" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="city" class="form-label">City/Municipality<sup class="text-danger fw-bold">*</sup></label>
                                <input type="text" class="form-control" readonly id="city" name="city" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="barangay" class="form-label">Barangay<sup class="text-danger fw-bold">*</sup></label>
                                <input type="text" class="form-control" readonly id="barangay" name="barangay" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="zipcode" class="form-label">Zipcode<sup class="text-danger fw-bold">*</sup></label>
                                <input type="text" class="form-control" readonly id="zipcode" name="zipcode" required>
                                <div class="invalid-feedback">
                                    Please input zipcode.
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="email" class="form-label">Email<sup class="text-danger fw-bold">*</sup></label>
                                <input type="email" class="form-control" readonly id="email" name="email" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="mobileNumber" class="form-label">Mobile Number<sup class="text-danger fw-bold">*</sup></label>
                                <input type="text" class="form-control" id="mobileNumber" name="mobileNumber" required>
                                <div class="invalid-feedback">
                                    Please input mobile number.
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="telNumber" class="form-label">Tel no.<sup class="text-danger fw-bold">*</sup></label>
                                <input type="text" class="form-control" id="telNumber" name="telNumber" required>
                                <div class="invalid-feedback">
                                    Write <strong>N/A</strong> if none.
                                </div>
                            </div>

                            <div class="double-line-text">
                                <hr class="line">
                                <h5 class="text">Additional Information</h5>
                                <hr class="line">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="orgMembership" class="form-label">Parish Organization Membership<sup class="text-danger fw-bold">*</sup></label>
                                <select id="orgMembership" name="parish_org_membership" class="form-select" required>
                                    <option selected disabled value="">Select Membership</option>
                                    <option value="">...</option>
                                    <option value="">...</option>
                                    <option value="">...</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select membership.
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="othersOrgMembership" class="form-label">Others<sup class="text-danger fw-bold">*</sup></label>
                                <input type="text" class="form-control" id="othersOrgMembership" name="othersOrgMembership" required>
                                <div class="invalid-feedback">
                                    Please input.
                                </div>
                            </div>

                            <span>Previous PPCRV Experience</span>
                            <div class="col-md-3 mb-3">
                                <label for="prevExperienceDate" class="form-label">&nbsp;</label>
                                <input type="text" class="form-control" id="prevExperienceDate" name="prevExperienceDate" placeholder="Date" required>
                                <div class="invalid-feedback">
                                    Please input date.
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="prevExperienceMonth" class="form-label">&nbsp;</label>
                                <select id="prevExperienceMonth" name="prevExperienceMonth" class="form-select" required>
                                    <option selected disabled value="">Select month</option>
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
                                <div class="invalid-feedback">
                                    Please select month.
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="prevExperienceYear" class="form-label">&nbsp;</label>
                                <input type="text" class="form-control" id="prevExperienceYear" name="prevExperienceYear" placeholder="Year" required oninput="calculateYearOfService()">
                                <div class="invalid-feedback">
                                    Please input year.
                                </div>
                            </div>

                            <div class="col-md-2 mb-3">
                                <label for="yearOfService" class="form-label">Year of Service<sup class="text-danger fw-bold">*</sup></label>
                                <input type="text" class="form-control" placeholder="Auto generated" readonly id="yearOfService" name="yearOfService" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="prevAssignment" class="form-label">Previous PPCRV Volunteer Assignment<sup class="text-danger fw-bold">*</sup></label>
                                <select id="prevAssignment" name="prevPpcrvVolAss" class="form-select" required>
                                    <option selected disabled value="">Select previous assignment</option>
                                    <option value="">...</option>
                                    <option value="">...</option>
                                    <option value="">...</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select previous assignment.
                                </div>
                            </div>


                            <div class="col-md-6 mb-3">
                                <label for="othersPrevAssignment" class="form-label">Others<sup class="text-danger fw-bold">*</sup></label>
                                <input type="text" class="form-control" id="othersPrevAssignment" name="othersPrevAssignment" required>
                                <div class="invalid-feedback">
                                    Please input.
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="prevPrecinct" class="form-label">Previous Precinct<sup class="text-danger fw-bold">*</sup></label>
                                <input type="text" class="form-control" id="prevPrecinct" name="prevPrecinct" required>
                                <div class="invalid-feedback">
                                    Please input.
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="prefAssignment" class="form-label">Preferred PPCRV Volunteer Assignment<sup class="text-danger fw-bold">*</sup></label>
                                <select id="prefAssignment" name="prefPpcrvVolAss" class="form-select" required>
                                    <option selected disabled value="">Select preferred assignment</option>
                                    <option value="">...</option>
                                    <option value="">...</option>
                                    <option value="">...</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select preferred assignment.
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="othersPrefAssignment" class="form-label">Others<sup class="text-danger fw-bold">*</sup></label>
                                <input type="text" class="form-control" id="prefAssignment" name="prefAssignment" required>
                                <div class="invalid-feedback">
                                    Please input.
                                </div>
                            </div>

                            <div class="mb-3 text-center">
                                <button class="btn btn-outline-secondary px-4" id="nextBtn">Next</button>
                            </div>

                        </div>

                        <!--CONFIRMED MODAL-->
                        <div class="modal fade" id="submittedSuccessfully" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="false">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary p-2">
                                    </div>
                                    <div class="modal-body">
                                        <div class="text-center">
                                            <img src="../img/icons8-checkmark-90.png" alt="">
                                            <h3 class="text-primary">SUCCESS!</h3>

                                            <div class="d-flex flex-column justify-content-center align-items-center gap-2">
                                                <span>Thank you! Your form has been successfully submitted.</span>
                                                <span>Please wait while we process your application.</span>
                                                <span>You can check the status of your application soon.</span>
                                            </div>

                                            <div class="d-flex flex-row justify-content-around align-items-center mt-3">
                                                <button type="button" class="btn btn-primary px-5" data-bs-dismiss="modal">Done</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane fade p-3" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                        <div class="double-line-text">
                            <hr class="line">
                            <h5 class="text">Upload & Agreement</h5>
                            <hr class="line">
                        </div>

                        <div class="upload-paragraph">
                            <p>Upload at least one (1) valid primary ID. Ensure the name, address, and birthday match the details in your
                                Volunteer Registration form.
                            </p>
                        </div>

                        <div class="row">
                            <div class="col-md-5">

                                <h4 class="text-danger">Accepted IDs</h4>

                                <p><strong>For Filipino citizens aged 18 years old and above</strong></p>
                                <strong>1 Primary ID</strong>
                                <ul>
                                    <li>Philippine National Identity Card</li>
                                    <li>ePhilID</li>
                                    <li>SSS ID (digitized with photo)</li>
                                    <li>PRC ID</li>
                                    <li>Postal ID (issued 2015 onwards)</li>
                                    <li>Passport</li>
                                    <li>Driver's License</li>
                                    <li>UMID</li>
                                    <li>NBI Clearance</li>
                                    <li>ACR i-Card</li>
                                    <li>Government Office and GOCC ID</li>
                                    <li>IBP Card</li>
                                </ul>
                                <strong>Or Secondary IDs</strong>
                                <ul>
                                    <li>PhilHealth ID</li>
                                    <li>TIN ID</li>
                                    <li>Voter's ID</li>
                                    <li>Police Clearance</li>
                                    <li>Senior Citizen's Card</li>
                                    <li>GSIS e-Card</li>
                                    <li>OWWA ID or OFW e-Card</li>
                                    <li>School ID</li>
                                    <li>Barangay Certification (with photo, if applicable)</li>
                                    <li>PPCRV ID</li>
                                </ul>
                            </div>


                            <div class="col-md-7 mb-3">
                                <label for="sex" class="form-label">Type of ID<sup class="text-danger fw-bold">*</sup></label>
                                <select id="sex" class="form-select mb-2" name="nameofId" required>
                                    <option selected disabled value="">Select type of ID</option>

                                    <?php foreach ($validId as $id): ?>
                                        <!-- Assuming 'id' and 'name' are columns in the VALID_ID table -->
                                        <option value="<?= $id['NAME']; ?>"><?= $id['NAME']; ?></option>
                                    <?php endforeach; ?>
                                </select>

                                <div class="invalid-feedback">
                                    Please select type of ID.
                                </div>


                                <div class="file-upload">
                                    <div id="drop-area" class="drop-area d-flex flex-column justify-content-center align-items-center">
                                        <!-- Progress bar for uploading -->
                                        <div id="upload-progress" class="upload-progress" style="display: none;">
                                            <p id="upload-status" class="text-center">Uploading...</p>
                                            <div class="progress">
                                                <div id="progress-bar" class="progress-bar" style="width: 0%;"></div>
                                            </div>
                                        </div>
                                        <div id="preview" class="preview"></div>
                                        <span id="file-name" class="file-name"></span>
                                        <img src="../img/icons8-identification-90.png" alt="">
                                        <p>Drag and drop your ID here</p>
                                        <p><strong>OR</strong></p>
                                        <label for="file-input" class="file-label btn btn-primary px-5">UPLOAD</label>
                                        <input id="file-input" type="file" accept="image/*" class="file-input d-none" name="validId" required />


                                        <div class="invalid-feedback">
                                            Please upload your photo.
                                        </div>

                                    </div>
                                </div>


                            </div>


                        </div>


                        <h4>Confirm your pledge to volunteer and support our mission.</h4>
                        <p class="text-danger mb-4">Please check the box to confirm your acknowledgment and agreement before submitting.</p>

                        <h4 class="text-primary">PPCRV Plege</h4>
                        <div class="row align-items-center">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                <label class="form-check-label" for="invalidCheck">
                                    I pledge to work for the promotion of responsible voting and responsible citizenship as a faith response to
                                    the call for political renewal and social transformation. I also pledge to work for Clean, Honest, Accurate,
                                    Meaningful and Peaceful (CHAMP) elections without fear or favor, in a non-partisan manner, in the service of
                                    God and country. In the event that I choose to become involved in partisan politics or decide to take on the
                                    noble task of seeking an elective position in government, I shall automatically resign from the PPCRV and return
                                    my membership card.
                                </label>
                                <div class="invalid-feedback">
                                    You must agree before submitting.
                                </div>

                                <div class="col-md-11">
                                    <p>
                                    </p>
                                </div>
                            </div>


                            <div class="mb-3 text-center">
                                <button class="btn btn-outline-primary px-4" type="submit">Submit</button>
                            </div>

                            <!--CONFIRMATION-->
                            <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="false">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary p-2">
                                        </div>
                                        <div class="modal-body">
                                            <div class="text-center">
                                                <img src="../img/REMINDER LOGO.png" alt="">
                                                <h3 class="text-danger">SUBMIT?</h3>
                                                <p class="text-muted">Are you sure you want to submit the form?</p>
                                                <p class="text-muted">Please note that once submitted, the details cannot be edited.</p>

                                                <div class="d-flex flex-row justify-content-around align-items-center gap-3">
                                                    <button type="button" class="btn btn-outline-secondary px-5" data-bs-dismiss="modal">No</button>
                                                    <button type="submit" name="yesSubmit" class="btn btn-primary px-5">Yes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>




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




    <script src="../js/volunteer_new_application.js"></script>
    <!--BOOTSTRAP JS CDN LINK-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>