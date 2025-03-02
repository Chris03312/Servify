<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer Profile</title>
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
    include('includes/coordinator_sidebar.php');
    ?>


    <!--MAIN CONTENT-->
    <main class="container-fluid p-3">

        <!-- PRINTING FORM -->
        <section class="container-fluid" id="printForm">
            <!-- HEADER -->
            <div class="d-flex flex-row justify-content-around align-items-center gap-5 mb-5">
                <img src="../../img/PPCRV LOGO.png" alt="PPCRV Logo" class="img-fluid" width="100px">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <h5>PARISH PASTORAL COUNCIL FOR RESPONSIBLE VOTING</h5>
                    <div class="text-center d-flex flex-column">
                        <span>Rm. 301 Plus XII Catholic Center, 1175 U.N. Avenue, Paco, Manila</span>
                        <span>Tel no.: 524-2855 / Telefax: 521-5005 / Fax no.: 528-0149</span>
                        <span>Email: parishpcrv@yahoo.com / amb.htv@l-manila.com.ph * Website: www.ppcrv.org</span>
                    </div>
                </div>
            </div>

            <!-- PARISH AND PICTURE -->
            <div class="d-flex flex-row justify-content-between align-items-center mb-2">
                <div class="d-flex flex-column justify-content-center align-items-start">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td class="fw-bold">Arch/Diocese:</td>
                                <td><span class="text-decoration-underline">Caloocan</span></td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Parish:</td>
                                <td><span class="text-decoration-underline">Sto. Rosario Parish</span></td>
                            </tr>
                            <tr>
                                <td class="fw-bold">City:</td>
                                <td><span class="text-decoration-underline">Malabon City</span></td>
                            </tr>
                        </tbody>
                    </table>

                </div>

                <div>
                    <img src="../../img/PPCRV LOGO.png" alt="Volunter Picture" class="img-thumbnail" width="100px">
                </div>
            </div>

            <div>
                <h5 class="text-decoration-underline text-center mb-2">VOLUNTEER REGISTRATION FORM</h5>

                <p>Date: Feb. 12, 2025</p>

                <p>I wish to become a member of the PARISH PASTORAL COUNCIL FOR THE RESPONSIBLE VOTING (PPCRV) in promoting responsible voting and responsible citizenship.</p>


                <div class="row align-items-end mb-2">
                    <div class="col-auto fw-bold">Name:</div>
                    <div class="col">
                        <div class="form-line">Vicmar M. Guzman</div> <!-- Underline -->
                    </div>
                    <div class="col-auto fw-bold">Nickname:</div>
                    <div class="col">
                        <div class="form-line">Bebe</div> <!-- Underline -->
                    </div>
                </div>

                <div class="row align-items-end mb-2">
                    <div class="col-auto fw-bold">Sex:</div>
                    <div class="col">
                        <div class="form-line">ge lang</div> <!-- Underline -->
                    </div>
                    <div class="col-auto fw-bold">Civil Status:</div>
                    <div class="col">
                        <div class="form-line">Single</div> <!-- Underline -->
                    </div>
                    <div class="col-auto fw-bold">Birthdate:</div>
                    <div class="col">
                        <div class="form-line">10/08/2002</div> <!-- Underline -->
                    </div>
                    <div class="col-auto fw-bold">Age:</div>
                    <div class="col">
                        <div class="form-line">22</div> <!-- Underline -->
                    </div>
                </div>

                <div class="row align-items-end mb-2">
                    <div class="col-auto fw-bold">Citizenship:</div>
                    <div class="col">
                        <div class="form-line">Filipino</div> <!-- Underline -->
                    </div>
                    <div class="col-auto fw-bold">Occupation:</div>
                    <div class="col">
                        <div class="form-line">Tambay</div> <!-- Underline -->
                    </div>
                    <div class="col-auto fw-bold">Company Name:</div>
                    <div class="col">
                        <div class="form-line">Krusty Krab</div> <!-- Underline -->
                    </div>
                </div>

                <div class="row align-items-end">
                    <div class="col-auto fw-bold">Residence Address:</div>
                    <div class="col">
                        <div class="form-line">Block 34 Lot 13 Lily St. Maligaya Park Subd.</div> <!-- Underline -->
                    </div>
                </div>
                <div class="row justify-content-center mb-3">
                    <div class="col-auto"><small>Street/Unit/Bldg/Village</small></div>
                </div>

                <div class="row align-items-end mb-2">
                    <div class="col">
                        <div class="form-line">Quezon City</div> <!-- Underline -->
                        <div class="row justify-content-center">
                            <div class="col-auto"><small>Municipality</small></div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-line">Pasong Putik Proper</div> <!-- Underline -->
                        <div class="row justify-content-center">
                            <div class="col-auto"><small>Barangay</small></div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-line">1118</div> <!-- Underline -->
                        <div class="row justify-content-center">
                            <div class="col-auto"><small>Zipcode</small></div>
                        </div>
                    </div>
                </div>


                <div class="row align-items-end mb-2">
                    <div class="col-auto fw-bold">Email:</div>
                    <div class="col">
                        <div class="form-line">guzman.vicmar.10082002@gmail.com</div> <!-- Underline -->
                    </div>
                    <div class="col-auto fw-bold">Mobile No.:</div>
                    <div class="col">
                        <div class="form-line">09566181202</div> <!-- Underline -->
                    </div>
                    <div class="col-auto fw-bold">Tel No.:</div>
                    <div class="col">
                        <div class="form-line"></div> <!-- Underline -->
                    </div>
                </div>

                <div class="row align-items-end mb-2">
                    <div class="col-auto fw-bold">Parish Organization Membership:</div>
                    <div class="col">
                        <div class="form-line"></div> <!-- Underline -->
                    </div>
                    <div class="col-auto fw-bold">Previous PPCRV Experience.:</div>
                    <div class="col">
                        <div class="form-line"></div> <!-- Underline -->
                    </div>
                </div>

                <div class="row align-items-end mb-2">
                    <div class="col-auto fw-bold">Years of Service:</div>
                    <div class="col">
                        <div class="form-line"></div> <!-- Underline -->
                    </div>
                    <div class="col-auto fw-bold">Previous PPCRV Volunteers Assignment:</div>
                    <div class="col">
                        <div class="form-line"></div> <!-- Underline -->
                    </div>
                </div>
                <div class="row align-items-end mb-2">
                    <div class="col-auto fw-bold">Previous Precinct:</div>
                    <div class="col">
                        <div class="form-line"></div> <!-- Underline -->
                    </div>
                    <div class="col-auto fw-bold">Preferred PPCRV Volunteers Assignment:</div>
                    <div class="col">
                        <div class="form-line"></div> <!-- Underline -->
                    </div>
                </div>

                <h5 class="text-decoration-underline text-center mb-2">PPCRV PLEDGE</h5>
                <p>I pledge to work for the promotion of responsible voting and responsible citizenship as a faith response to the call for political renewal and social transformation. I also pledge to work for Clean, Honest, Accurate, Meaningful and Peaceful (CHAMP) elections without fear or favor, in a non-partisan manner, in the service of God and country. In the event that I choose to become involved in partisan politics or decide to take on the noble task of seeking an elective position in government, I shall automatically resign from the PPCRV and return my membership card.</p>



                <div class="signature-section d-flex flex-column justify-content-end align-items-end me-5 mt-4">
                    <div class="signature-line"></div>
                    <span class="fw-bold">Applicant's Signature</span>
                </div>


                <div class="action-taken my-1">
                    <span>Action Taken</span>
                </div>


                <div class="row align-items-end mb-3">
                    <div class="col">
                        <div class="row justify-content-center mb-4">
                            <div class="col-auto">Recommending Approval:</div>
                        </div>
                        <div class="form-line"></div> <!-- Underline -->
                        <div class="row justify-content-center">
                            <div class="col-auto"><small>PPC President/Parish Coordinator</small></div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row justify-content-center mb-4">
                            <div class="col-auto">Approved By:</div>
                        </div>
                        <div class="form-line"></div> <!-- Underline -->
                        <div class="row justify-content-center">
                            <div class="col-auto"><small>Parish Priest</small></div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row justify-content-center mb-4">
                            <div class="col-auto">Noted By:</div>
                        </div>
                        <div class="form-line"></div> <!-- Underline -->
                        <div class="row justify-content-center">
                            <div class="col-auto"><small>District Coordinator</small></div>
                        </div>
                    </div>
                </div>

                <div class="row align-items-end justify-content-center mt-5 mb-3">
                    <div class="col-auto fw-bold">Issued Membership No.:</div>
                    <div class="col-2">
                        <div class="form-line"></div> <!-- Underline -->
                    </div>
                </div>

            </div>


        </section>

        <div class="container-fluid" id="formContainer">
            <form method="POST" action="/volunteer_new_application/submit" enctype="multipart/form-data">
                <!--FORM-->

                <div class="d-flex flex-row justify-content-between align-items-start mb-3">
                    <h4>Volunteer's Profile</h4>
                    <!--BUTTONS - EDIT, PRINT, DELETE-->
                    <div class="d-none d-md-flex flex-row justify-content-center align-items-center gap-2">
                        <button type="button" class="btn" data-bs-toggle="modal"
                            data-bs-target="#accessRestrictionModal">
                            <i class="bi bi-pen text-primary fs-5"></i>
                        </button>

                        <button type="button" class="btn" id="printBtn"><i class="bi bi-printer text-primary fs-5"></i></button>
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
                                    <button type="button" class="btn" id="printBtn"><i class="bi bi-printer text-primary fs-5"></i></button>
                                    <button type="button" class="btn"><i class="bi bi-trash text-danger fs-5"></i></button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


                <!--PHOTO AND NAME-->
                <div class="d-flex flex-row justify-content-start align-items-center mb-3">
                    <!--PHOTO-->
                    <img src="../img/DPPAM LOGO.png" alt="1x1 PIC" height="auto" width="100px">

                    <!--NAME-->
                    <p>Ako si Jazer</p>
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
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                            data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane"
                            aria-selected="true">Volunteer Info</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                            data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane"
                            aria-selected="false">Documents/IDs</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                            data-bs-target="#application-tab-pane" type="button" role="tab"
                            aria-controls="application-tab-pane" aria-selected="false">Application History</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                            data-bs-target="#remarks-tab-pane" type="button" role="tab" aria-controls="remarks-tab-pane"
                            aria-selected="false">Remarks</button>
                    </li>
                </ul>
                <div class="tab-content border-start border-end border-bottom" id="myTabContent"
                    style="border-top: 10px solid blue;">

                    <!--VOLUNTEER INFO-->
                    <div class="tab-pane fade show active p-3" id="home-tab-pane" role="tabpanel"
                        aria-labelledby="home-tab" tabindex="0">



                        <div class="row">

                            <div class="double-line-text">
                                <hr class="line">
                                <h5 class="text">Volunteer Information</h5>
                                <hr class="line">
                            </div>

                            <div class="row mb-3">
                                <label for="precinctNumber" class="col-md-2 col-form-label">Precinct Number:<sup
                                        class="text-danger fw-bold">*</sup></label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" id="precinctNumber" name="precinctNumber" value="<?= !empty($volunteer) ? htmlspecialchars($volunteer['PRECINCT_NO']) : ''; ?>"
                                        required>
                                    <div class="invalid-feedback">
                                        Please input precinct number.
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="firstname" class="form-label">First name<sup
                                        class="text-danger fw-bold">*</sup></label>
                                <input type="text" class="form-control" id="firstname" name="firstName" value="<?= !empty($volunteer) ? htmlspecialchars($volunteer['FIRST_NAME']) : ''; ?>" required>
                                <div class="invalid-feedback">
                                    Please input first name.
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="middlename" class="form-label">Middle name<sup
                                        class="text-danger fw-bold">*</sup></label>
                                <input type="text" class="form-control" id="middlename" name="middleName" value="<?= !empty($volunteer) ? htmlspecialchars($volunteer['MIDDLE_NAME']) : ''; ?>" required>
                                <div class="invalid-feedback">
                                    Write <strong>N/A</strong> if none.
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="surname" class="form-label">Surname<sup
                                        class="text-danger fw-bold">*</sup></label>
                                <input type="text" class="form-control" id="surname" name="surname" value="<?= !empty($volunteer) ? htmlspecialchars($volunteer['SURNAME']) : ''; ?>" required>
                                <div class="invalid-feedback">
                                    Please input surname.
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="suffix" class="form-label">Suffix<sup
                                        class="text-danger fw-bold">*</sup></label>
                                <input type="text" class="form-control" id="suffix" name="suffix" value="<?= !empty($volunteer) ? htmlspecialchars($volunteer['NAME_SUFFIX']) : ''; ?>" required>
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
                                <label for="Nickname" class="form-label">Nickname<sup
                                        class="text-danger fw-bold">*</sup></label>
                                <input type="text" class="form-control" id="Nickname" name="Nickname" value="<?= !empty($volunteer) ? htmlspecialchars($volunteer['NICKNAME']) : ''; ?>" required>
                                <div class="invalid-feedback">
                                    Write <strong>N/A</strong> if none.
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="civilStatus" class="form-label">Civil Status<sup class="text-danger fw-bold">*</sup></label>
                                <select id="civilStatus" name="civilStatus" class="form-select" required>
                                    <option disabled value="">Select Status</option>
                                    <?php
                                   $statuses = ["SINGLE", "MARRIED", "SEPARATED", "DIVORCED", "WIDOWED", "WIDOWER", "ANNULLED", "SINGLE PARENT"];
                                    $selectedStatus = !empty($volunteer) ? $volunteer['CIVIL_STATUS'] : '';

                                    foreach ($statuses as $status) {
                                        $selected = ($status === $selectedStatus) ? 'selected' : '';
                                        echo "<option value=\"$status\" $selected>$status</option>";
                                    }
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    Please select civil status.
                                </div>
                            </div>

                            <div class="col-md-2 mb-3">
                                <label for="birthDate" class="form-label">Birth Day</label>
                                <input type="text" class="form-control" readonly id="birthDate" name="birthDate"
                                    placeholder="Date" required>
                                <div class="invalid-feedback">
                                    Please input birth date.
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="birthMonth" class="form-label">&nbsp;</label>
                                <select id="birthMonth" name="birthMonth" class="form-select" aria-readonly="true"
                                    required>
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
                                <input type="text" class="form-control" id="birthYear" name="birthYear"
                                    placeholder="Year" readonly>
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
                                <label for="citizenship" class="form-label">Citizenship<sup
                                        class="text-danger fw-bold">*</sup></label>
                                <input type="text" class="form-control" id="citizenship" name="citizenship" required>
                                <div class="invalid-feedback">
                                    Please input citizenship.
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="occupation" class="form-label">Occupation<sup
                                        class="text-danger fw-bold">*</sup></label>
                                <input type="text" class="form-control" id="occupation" name="occupation" required>
                                <div class="invalid-feedback">
                                    Write <strong>N/A</strong> if none.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="companyName" class="form-label">Company Name<sup
                                        class="text-danger fw-bold">*</sup></label>
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
                                <input type="text" class="form-control" readonly id="street" name="streetAddress"
                                    required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="city" class="form-label">City/Municipality<sup
                                        class="text-danger fw-bold">*</sup></label>
                                <input type="text" class="form-control" readonly id="city" name="city" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="barangay" class="form-label">Barangay<sup
                                        class="text-danger fw-bold">*</sup></label>
                                <input type="text" class="form-control" readonly id="barangay" name="barangay" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="zipcode" class="form-label">Zipcode<sup
                                        class="text-danger fw-bold">*</sup></label>
                                <input type="text" class="form-control" readonly id="zipcode" name="zipcode" required>
                                <div class="invalid-feedback">
                                    Please input zipcode.
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="email" class="form-label">Email<sup
                                        class="text-danger fw-bold">*</sup></label>
                                <input type="email" class="form-control" readonly id="email" name="email" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="mobileNumber" class="form-label">Mobile Number<sup
                                        class="text-danger fw-bold">*</sup></label>
                                <input type="text" class="form-control" id="mobileNumber" name="mobileNumber" required>
                                <div class="invalid-feedback">
                                    Please input mobile number.
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="telNumber" class="form-label">Tel no.<sup
                                        class="text-danger fw-bold">*</sup></label>
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
                                <label for="orgMembership" class="form-label">Parish Organization Membership<sup
                                        class="text-danger fw-bold">*</sup></label>
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
                                <label for="othersOrgMembership" class="form-label">Others<sup
                                        class="text-danger fw-bold">*</sup></label>
                                <input type="text" class="form-control" id="othersOrgMembership"
                                    name="othersOrgMembership" required>
                                <div class="invalid-feedback">
                                    Please input.
                                </div>
                            </div>

                            <span>Previous PPCRV Experience</span>
                            <div class="col-md-3 mb-3">
                                <label for="prevExperienceDate" class="form-label">&nbsp;</label>
                                <input type="text" class="form-control" id="prevExperienceDate"
                                    name="prevExperienceDate" placeholder="Date" required>
                                <div class="invalid-feedback">
                                    Please input date.
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="prevExperienceMonth" class="form-label">&nbsp;</label>
                                <select id="prevExperienceMonth" name="prevExperienceMonth" class="form-select"
                                    required>
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
                                <input type="text" class="form-control" id="prevExperienceYear"
                                    name="prevExperienceYear" placeholder="Year" required
                                    oninput="calculateYearOfService()">
                                <div class="invalid-feedback">
                                    Please input year.
                                </div>
                            </div>

                            <div class="col-md-2 mb-3">
                                <label for="yearOfService" class="form-label">Year of Service<sup
                                        class="text-danger fw-bold">*</sup></label>
                                <input type="text" class="form-control" placeholder="Auto generated" readonly
                                    id="yearOfService" name="yearOfService" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="prevAssignment" class="form-label">Previous PPCRV Volunteer Assignment<sup
                                        class="text-danger fw-bold">*</sup></label>
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
                                <label for="othersPrevAssignment" class="form-label">Others<sup
                                        class="text-danger fw-bold">*</sup></label>
                                <input type="text" class="form-control" id="othersPrevAssignment"
                                    name="othersPrevAssignment" required>
                                <div class="invalid-feedback">
                                    Please input.
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="prevPrecinct" class="form-label">Previous Precinct<sup
                                        class="text-danger fw-bold">*</sup></label>
                                <input type="text" class="form-control" id="prevPrecinct" name="prevPrecinct" required>
                                <div class="invalid-feedback">
                                    Please input.
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="prefAssignment" class="form-label">Preferred PPCRV Volunteer Assignment<sup
                                        class="text-danger fw-bold">*</sup></label>
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
                                <label for="othersPrefAssignment" class="form-label">Others<sup
                                        class="text-danger fw-bold">*</sup></label>
                                <input type="text" class="form-control" id="prefAssignment" name="prefAssignment"
                                    required>
                                <div class="invalid-feedback">
                                    Please input.
                                </div>
                            </div>



                        </div>


                    </div>

                    <!--DOCUMENTS-->
                    <div class="tab-pane fade p-3" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                        tabindex="0">
                        <div class="double-line-text">
                            <hr class="line">
                            <h5 class="text">Documents/IDs</h5>
                            <hr class="line">
                        </div>


                        <div class="d-flex align-items-center">
                            <span class="fw-bold me-2">Type of ID:</span>
                            <span>ID</span>
                        </div>

                        <!-- PREVIEW ID -->
                        <div class="container mt-5">
                            <img src="../../img/PPCRV LOGO.png" alt="Type of ID" class="img-thumbnail" width="120px;">
                        </div>
                    </div>


                    <!--APPLICATION HISTORY-->
                    <div class="tab-pane fade p-3" id="application-tab-pane" role="tabpanel"
                        aria-labelledby="application-tab" tabindex="0">

                        <div class="table-responsive mt-3 table-primary">
                            <table class="table align-middle">
                                <thead class="table-primary">
                                    <tr>
                                        <th scope="col">Registration #</th>
                                        <th scope="col">Registration Details</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td scope="row">R1C1</td>
                                        <td>R1C2</td>
                                        <td>R1C3</td>
                                        <td><button type="button" class="btn text-primary">Action</button></td>
                                    </tr>
                                    <tr>
                                        <td scope="row">R1C1</td>
                                        <td>R1C2</td>
                                        <td>R1C3</td>
                                        <td><button type="button" class="btn text-primary">Action</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>



                    </div>

                    <!--REMARKS-->
                    <div class="tab-pane fade p-3" id="remarks-tab-pane" role="tabpanel" aria-labelledby="remarks-tab"
                        tabindex="0">

                        <h1>Remarks</h1>




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
        document.addEventListener('DOMContentLoaded', function() {
            flatpickr('#datepicker', {
                dateFormat: 'Y-m-d', // Customize the format (e.g., YYYY-MM-DD)
            });
        });

        const printBtn = document.getElementById('printBtn');
        printBtn.addEventListener('click', function() {
            window.print();
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