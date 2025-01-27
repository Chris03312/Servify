<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coordinator | Profile</title>
    <link rel="stylesheet" href="../css/coordinator_dashboard.css">
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
</head>

<body>

    <?php
    include('../includes/coordinator_sidebar.php');
    ?>


    <!--MAIN CONTENT-->
    <main class="container p-5">

        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header py-3 bg-primary"></div>
                    <div class="card-body">

                        <div class="d-flex flex-row justify-content-between align-items-center">
                            <div><img src="../img/servify-logo-with-text.png" alt="Servify Logo" class="img-fluid" width="200px"></div>

                            <div>
                                <h5 class="text-primary text-center">Coordinator Profile Confirmation</h5>
                                <p class="text-muted text-center mb-5">Review your profile carefully. Update incorrect details, then confirm if all is accurate to proceed.</p>
                            </div>
                        </div>

                        <!--FORM-->
                        <form action="/coordinator_profile/submit" method="post" class="row p-2 needs-validation" novalidate>

                            <p><strong>Assigned as Coordinator at :</strong></p>

                            <div class="col-md-4 mb-3">
                                <label for="municipality" class="form-label">Municipality</label>
                                <input type="text" class="form-control" name="municipality" id="municipality" readonly>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="districtNumber" class="form-label">District Number</label>
                                <input type="text" class="form-control" name="districtNumber" id="districtNumber" readonly>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="parishName" class="form-label">Parish Name</label>
                                <input type="text" class="form-control" name="parishName" id="parishName" readonly>
                            </div>

                            <p><strong>Name:</strong></p>
                            <div class="col-12 mb-3">
                                <input type="text" class="form-control" name="surname" id="surname" placeholder="Surname" required>
                                <div class="invalid-feedback">
                                    Please input surname.
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" class="form-control" name="firstName" id="firstName" placeholder="First name" required>
                                <div class="invalid-feedback">
                                    Please input first name.
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" class="form-control" name="middleName" id="middleName" placeholder="Middle Name" required>
                                <div class="invalid-feedback">
                                    Write <strong>N/A</strong> if none.
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" class="form-control" name="suffix" id="suffix" placeholder="Suffix (e.g. Jr., Sr., III, IV)" required>
                                <div class="invalid-feedback">
                                    Write <strong>N/A</strong> if none.
                                </div>
                            </div>



                            <div class="col-md-3 mb-3">
                                <label for="birthDate" class="form-label"><strong>Birth Day</strong></label>
                                <input type="text" class="form-control" id="birthDate" name="birthDate" placeholder="Date" required>
                                <div class="invalid-feedback">
                                    Please input birth date.
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="birthMonth" class="form-label">&nbsp;</label>
                                <select id="birthMonth" class="form-select" required>
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
                                    Please select birth month.
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="suffix" class="form-label">&nbsp;</label>
                                <input type="text" class="form-control" id="birthYear" name="birthYear" placeholder="Year" required>
                                <div class="invalid-feedback">
                                    Please input birth year.
                                </div>
                            </div>

                            <p><strong>Address</strong></p>

                            <div class="col-md-12 mb-3">
                                <label for="street" class="form-label">Street/Unit/Bldg/Village</label>
                                <input type="text" class="form-control" id="street" name="street" required>
                                <div class="invalid-feedback">
                                    Write <strong>N/A</strong> if none.
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="city" class="form-label">City/Municipality</label>
                                <select id="city" name="municipality" class="form-select" required>
                                    <option selected disabled value="">Select City/Municipality</option>
                                    <?php foreach ($cities as $city): ?>
                                    <option value="<?php echo htmlspecialchars($city['MUNICIPALITY/CITY']); ?>">
                                        <?php echo htmlspecialchars($city['MUNICIPALITY/CITY']); ?>
                                    </option>
                                <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    Please select city.
                                </div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="barangay" class="form-label">Barangay</label>
                                <input type="text" class="form-control" id="barangay" name="barangay" required>
                                <div class="invalid-feedback">
                                    Please input barangay.
                                </div>
                                <script>
                                // Pass the cities and barangays data to JavaScript
                                var cities = <?php echo json_encode($cities); ?>;
                                var barangays = <?php echo json_encode($barangays); ?>;
                                console.log(barangays);  // Log barangays to check the data
                            </script>
                            <script src="js/signup.js"></script>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="zipcode" class="form-label">Zipcode</label>
                                <input type="text" class="form-control" id="zipcode" name="zipcode" required>
                                <div class="invalid-feedback">
                                    Please input zipcode.
                                </div>
                            </div>

                            <div class="col-md-7 mb-3">
                                <label for="orgMembership" class="form-label">Parish Organization Membership</label>
                                <select id="orgMembership" name="orgMembership" class="form-select" required>
                                    <option selected disabled value="">Select Membership</option>
                                    <option value="">...</option>
                                    <option value="">...</option>
                                    <option value="">...</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select membership.
                                </div>
                            </div>

                            <div class="col-md-5 mb-3">
                                <label for="othersOrgMembership" class="form-label">Others</label>
                                <input type="text" name="others" class="form-control" id="othersOrgMembership" name="othersOrgMembership" readonly>
                                <div class="invalid-feedback">
                                    Please input.
                                </div>
                            </div>

                            <span><strong>Previous PPCRV Experience</strong></span>
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
                                <input type="text" class="form-control" id="prevExperienceYear" name="prevExperienceYear" placeholder="Year" required>
                                <div class="invalid-feedback">
                                    Please input year.
                                </div>
                            </div>

                            <div class="col-md-2 mb-3">
                                <label for="yearOfService" class="form-label">Year of Service</label>
                                <input type="text" class="form-control" placeholder="Auto generated" readonly id="yearOfService" name="yearOfService" required>
                            </div>


                            <div class="col-md-6 my-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="email@gmail.com" required>
                                <div class="invalid-feedback">
                                    Please input email.
                                </div>
                            </div>
                            <div class="col-md-6 mt-3 mb-5">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required>
                                <div class="invalid-feedback">
                                    Please input username.
                                </div>
                            </div>

                            <div class="d-flex flex-row justify-content-center align-items-center gap-4">
                                <button type="button" class="btn btn-outline-secondary px-5">Cancel</button>
                                <button type="submit" class="btn btn-primary px-5">Confirm</button>
                            </div>



                            <!--MODAL - CHANGE PASSWORD CONFIRMATION-->
                            <div class="modal fade" id="changePassConfirmationModal" tabindex="-1"
                                aria-labelledby="changePassConfirmationModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                        </div>
                                        <div class="modal-body">
                                            <h4 class="text-center text-danger">Change Password???</h4>
                                        </div>
                                        <div class="modal-footer justify-content-center">
                                            <button type="button" class="btn btn-outline-secondary px-4"
                                                data-bs-dismiss="modal">Cancel</button>
                                            <button type="button" class="btn btn-primary px-5" data-bs-toggle="modal" data-bs-target="#changePasswordConfirmed">Confirm</button>
                                        </div>  
                                    </div>
                                </div>
                            </div>

                            <!--MODAL - CONFIRMED CHANGE PASSWORD-->
                            <div class="modal fade" id="changePasswordConfirmed" tabindex="-1"
                                aria-labelledby="changePasswordConfirmedLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                        </div>
                                        <div class="modal-body">
                                            <h4 class="text-center text-danger">Password Changed Successfully!</h4>
                                        </div>
                                        <div class="modal-footer justify-content-center">
                                            <button type="button" class="btn btn-primary px-4"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>



    </main>
    </div>
    </div>



    <script>
  (() => {
    'use strict';

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation');

    // Function to check if any input contains only spaces
    const containsOnlySpaces = (input) => input.trim() === '';

    // Loop over forms and attach validation logic
    Array.from(forms).forEach((form) => {
      // Add submit event listener
      form.addEventListener('submit', (event) => {
        let invalidSpaceInputs = false;

        // Check all form inputs
        const inputs = form.querySelectorAll('input, textarea');
        inputs.forEach((input) => {
          if (containsOnlySpaces(input.value)) {
            invalidSpaceInputs = true;
            input.setCustomValidity('This field cannot contain only spaces.');
          } else {
            input.setCustomValidity(''); // Clear custom validity
          }
        });

        // Prevent submission if validation fails
        if (!form.checkValidity() || invalidSpaceInputs) {
          event.preventDefault();
          event.stopPropagation();
        }

        form.classList.add('was-validated');
      }, false);

      // Add input event listeners to each input field
      const inputs = form.querySelectorAll('input, textarea');
      inputs.forEach((input) => {
        input.addEventListener('input', () => {
          if (containsOnlySpaces(input.value)) {
            input.setCustomValidity('This field cannot contain only spaces.');
          } else {
            input.setCustomValidity(''); // Clear custom validity
          }
        });
      });
    });
  })();
</script>



    <!--BOOTSTRAP JS CDN LINK-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>