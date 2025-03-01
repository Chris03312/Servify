<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servify | Sign Up</title>
    <link rel="stylesheet" href="../css/login_style.css">
    <!--BOOTSTRAP CSS CDN LINK-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>


    <!-- MODAL: TERMS AND CONDITIONS -->

    <div class="modal fade" id="termsAndConditionsModal" tabindex="-1" aria-labelledby="termsAndConditionsModalLabel"
        aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="bg-primary py-2">
                    <h2 class="text-light text-center">Terms and Conditions</h2>
                </div>
                <div class="modal-body">
                    <div>
                        <h5 class="text-primary text-center">Diocesan Public and Political Affairs Ministry (DPPAM)
                            Volunteer Registration</h5>

                        <div>
                            <p class="text-muted">By registering as a volunteer for Servify, the official volunteer
                                management system of the Diocesan Public and Political Affairs Ministry (DPPAM), you
                                agree to comply with the following terms and conditions. </p>
                            <p class="text-muted">Please read them carefully before proceeding with your registration.
                            </p>

                            <ol class="custom-list">
                                <li>
                                    <h5>Volunteer Responsibilities</h5>
                                    <ol type="1">
                                        <li>Volunteers must act in accordance with DPPAM’s mission and values, upholding
                                            integrity, respect, and responsibility.</li>
                                        <li>All tasks assigned by coordinators or administrators must be performed
                                            diligently and in a timely manner.</li>
                                        <li>Volunteers should communicate any challenges, absences, or concerns with
                                            their assigned coordinator.</li>
                                        <li>Misconduct, negligence, or violation of these terms may result in suspension
                                            or termination of volunteer participation.</li>
                                    </ol>
                                </li>
                                <li>
                                    <h5 class="mt-3">Data Privacy & Security</h5>
                                    <ol>
                                        <li>By registering, you consent to DPPAM collecting, processing, and storing
                                            your personal information for volunteer management purposes.</li>
                                        <li>Your information will be kept confidential and used solely for DPPAM
                                            operations, assignments, and communication. Servify will not share your data
                                            with third parties without consent, except as required by law.</li>
                                        <li>You may request access, updates, or deletion of your personal data by
                                            contacting DPPAM’s administration.</li>
                                    </ol>
                                </li>
                                <li>
                                    <h5 class="mt-3">Code of Conduct</h5>
                                    <ol>
                                        <li>Volunteers shall treat fellow volunteers, coordinators, and the community
                                            with courtesy and respect.</li>
                                        <li>Harassment, discrimination, or any form of misconduct will not be tolerated.
                                        </li>
                                        <li>Volunteers must maintain professionalism, particularly when representing
                                            DPPAM in public engagements.</li>
                                        <li>Any misuse of DPPAM’s name, system, or resources is strictly prohibited.
                                        </li>
                                    </ol>
                                </li>
                                <li>
                                    <h5 class="mt-3">System Usage & Compliance</h5>
                                    <ol>
                                        <li>Volunteers must use the Servify system responsibly and only for legitimate
                                            DPPAM volunteer activities.</li>
                                        <li>Unauthorized access, data tampering, or sharing of confidential information
                                            is strictly forbidden.</li>
                                        <li>Any suspicious activity should be reported immediately to DPPAM’s
                                            administration.</li>
                                        <li>Servify strives to provide continuous access, but occasional maintenance or
                                            updates may cause temporary disruptions. The system administrators are not
                                            liable for data loss, service interruptions, or any technical issues beyond
                                            their control.</li>
                                    </ol>
                                </li>
                                <li>
                                    <h5 class="mt-3">Prohibited Activities</h5>
                                    <ul>
                                        <strong>Users are strictly prohibited from: </strong>
                                        <li>Providing false information or impersonating others.</li>
                                        <li>Using Servify for political campaigning, personal gain, or any unauthorized
                                            purpose.</li>
                                        <li>Disrupting system operations, hacking, or engaging in cyberattacks.</li>
                                        <li>Posting or sharing harmful, offensive, or inappropriate content.</li>
                                    </ul>
                                </li>
                                <li>
                                    <h5 class="mt-3">Amendments & Termination</h5>
                                    <ol>
                                        <li>DPPAM reserves the right to modify these terms and conditions at any time.
                                        </li>
                                        <li>Volunteers will be notified of any updates, and continued participation
                                            implies acceptance of the new terms.</li>
                                        <li>DPPAM holds the right to terminate or suspend volunteer access if any of
                                            these terms are violated.</li>
                                    </ol>
                                </li>
                            </ol>


                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="login_bg d-flex align-items-center justify-content-center p-0 p-md-5">

        <div class="container">

            <div class="row justify-content-center">


                <div class="col-12">
                    <div class="card p-4">
                        <div class="text-center">
                            <h1 class="fw-bolder"><span class="text-danger">Serv</span><span
                                    class="text-primary">ify</span>
                            </h1>
                            <h3>Sign Up Form</h3>

                            <div class="d-flex flex-column">
                                <span class="text-muted">Enter your details below to create your account and get
                                    started.</span>
                            </div>

                            <spam class="text-muted"></spam>
                        </div>

                        <form id="signupForm" action="/signup/submit" class="row mt-5" method="POST">
                            <!--PARISH NAMES-->
                            <div class="col-md-6 mb-3">
                                <label for="parishNameDataList" class="form-label">You are currently registering as
                                    VOLUNTEER at:<sup class="text-danger">*</sup></label>
                                <input class="form-control" list="parishNameOptions" id="parishNameDataList"
                                    name="parish" placeholder="Type to search...">
                                <datalist id="parishNameOptions">
                                    <option value="St. Francis of Assisi – Sta Quiteria Parish">
                                    <option value="Birhen ng Lourdes Parish">
                                    <option value="Our Lady of Lujan Parish">
                                    <option value="Sacred Heart of Jesus Parish">
                                    <option value="St. Peter & John Parish">
                                    <option value="St. Gabriel the Archangel Parish">
                                    <option value="Shrine of Our Lady of Grace">
                                    <option value="Sagrada Familia Parish">
                                    <option value="San Jose Parish (Agudo)">
                                    <option value="San Pancracio Parish">
                                    <option value="Hearts of Jesus & Mary Parish">
                                    <option value="Immaculate of Heart & Mary Parish">
                                    <option value="Mary Help of Christians Parish">
                                    <option value="Sacred Heart of Jesus Parish (Tugatog)">
                                    <option value="St. Joseph the Workman Parish">
                                    <option value="San Roque Cathedral">
                                    <option value="Holy Trinity Quasi-Parish">
                                    <option value="Exaltation of the Holy Cross Parish">
                                    <option value="Diocesan Shrine & Parish of Immaculate Concepcion">
                                    <option value="San Antonio de Padua Parish">
                                    <option value="San Bartolome Parish">
                                    <option value="Santa Cruz Parish">
                                    <option value="Sto. Rosario Parish">
                                    <option value="San Exequiel Moreno Parish">
                                    <option value="San Ildefonso Parish">
                                    <option value="Diocesan Shrine & Parish of San Jose de Navotas">
                                    <option value="San Lorenzo Ruiz & Companion Martyrs Parish">
                                    <option value="San Roque Parish de Navotas">
                                    <option value="St. Clare of Assisi Parish">
                                    <option value="Sto. Niño de Pasion Parish">
                                    <option value="Nustra Senora delos Remedios Quasi-Parish">
                                </datalist>
                                <div class="validation text-danger"></div>
                            </div>


                            <div class="col-md-6 mb-3">
                                <label for="precinctNumber" class="form-label">Precinct No.<sup
                                        class="text-danger fw-bold">*</sup></label>
                                <input type="text" class="form-control" id="precinctNumber" name="precinctNumber"
                                    placeholder="Ex. 0007A">
                                <div class="validation text-danger"></div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="surname" class="form-label">Surname<sup
                                        class="text-danger fw-bold">*</sup></label>
                                <input type="text" class="form-control" id="surname" name="surname"
                                    placeholder="Ex. Dela Cruz">
                                <div class="validation text-danger"></div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="firstname" class="form-label">First name<sup
                                        class="text-danger fw-bold">*</sup></label>
                                <input type="text" class="form-control" id="firstname" name="firstname"
                                    placeholder="Ex. Juan">
                                <div class="validation text-danger"></div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="middlename" class="form-label">Middle name</label>
                                <input type="text" class="form-control" id="middlename" name="middleName">
                                <div class="validation text-danger"></div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="suffix" class="form-label">Suffix (Optional)</label>
                                <input type="text" class="form-control" id="suffix" name="suffix" placeholder="Ex. Jr">
                                <div class="validation text-danger"></div>
                            </div>

                            <strong class="mb-3">Birth Day</strong>
                            <div class="col-md-4 mb-3">
                                <label for="birthMonth" class="form-label">Month<sup
                                        class="text-danger fw-bold">*</sup></label>
                                <select id="birthMonth" class="form-select" name="birthMonth">
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
                                <div class="validation text-danger"></div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="birthDate" class="form-label">Day<sup
                                        class="text-danger fw-bold">*</sup></label>
                                <input type="text" class="form-control" id="birthDate" name="birthDate"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                <div class="validation text-danger">

                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="birthYear" class="form-label">Year<sup
                                        class="text-danger fw-bold">*</sup></label>
                                <input type="text" class="form-control" id="birthYear" name="birthYear"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                <div class="validation text-danger"></div>
                            </div>

                            <strong class="mb-3">Address</strong>
                            <div class="col-md-12 mb-3">
                                <label for="city" class="form-label">City<sup
                                        class="text-danger fw-bold">*</sup></label>
                                <select id="city" class="form-select" name="city">
                                    <option selected disabled value="">Select City</option>
                                    <?php foreach ($cities as $city): ?>
                                        <option value="<?php echo htmlspecialchars($city['MUNICIPALITY/CITY']); ?>">
                                            <?php echo htmlspecialchars($city['MUNICIPALITY/CITY']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="validation text-danger"></div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label for="street" class="form-label">Street/Unit/Bldg/Village<sup
                                        class="text-danger fw-bold">*</sup></label>
                                <input type="text" class="form-control" id="street" name="street"
                                    placeholder="Ex. Blk# Lot#">
                                <div class="validation text-danger"></div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="barangay" class="form-label">Barangay<sup
                                        class="text-danger fw-bold">*</sup></label>
                                <select id="barangay" class="form-select" name="barangay">
                                    <option selected disabled value="">Select Barangay</option>
                                    <!-- Barangay options will be populated dynamically using JavaScript -->
                                </select>
                                <div class="validation text-danger"></div>
                                <script>
                                    // Pass the cities and barangays data to JavaScript
                                    var cities = <?php echo json_encode($cities); ?>;
                                    var barangays = <?php echo json_encode($barangays); ?>;
                                    console.log(barangays); // Log barangays to check the data
                                </script>
                                <script src="js/signup.js"></script>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="district" class="form-label">District<sup
                                        class="text-danger fw-bold">*</sup></label>
                                <input type="text" class="form-control" id="district" name="district"
                                    placeholder="Ex. District 1">
                                <div class="validation text-danger"></div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="zipcode" class="form-label">Zipcode</label>
                                <input type="text" class="form-control" id="zipcode" name="zipcode"
                                    placeholder="Ex. 1118">
                                <div class="validation text-danger"></div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email<sup
                                        class="text-danger fw-bold">*</sup></label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Ex. example1@gmail.com">
                                <div class="validation text-danger"></div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="username" class="form-label">Create Username<sup
                                        class="text-danger fw-bold">*</sup></label>
                                <input type="text" class="form-control" id="username" name="username">
                                <div class="validation text-danger"></div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="password" class="form-label">Create Password<sup
                                        class="text-danger fw-bold">*</sup></label>
                                <input type="password" class="form-control" id="password" name="password">
                                <div class="validation text-danger"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="confirmPassword" class="form-label">Confirm Password<sup
                                        class="text-danger fw-bold">*</sup></label>
                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
                                <div class="validation text-danger"></div>
                            </div>

                            <hr class="text-dark">


                            <!-- TERMS AND CONDITIONS CHECKBOX -->
                            <div class="form-check mb-3">
                                <input type="checkbox" class="form-check-input" id="termsCheckbox">
                                <label class="form-check-label" for="termsCheckbox">I agree to the <a href="#"
                                        data-bs-toggle="modal" data-bs-target="#termsAndConditionsModal">Terms and
                                        Conditions</a>.
                                </label>
                                <div class="text-danger small" id="termsError" style="display: none;">You must agree
                                    before submitting.</div>
                            </div>

                            <small><i>By clicking "I Agree" or proceeding with registration, you confirm
                                    that:</i></small>
                            <small><i>You have read and understood these Terms and Conditions.</i></small>
                            <small><i>You agree to abide by all DPPAM’s policies and guidelines.</i></small>
                            <small><i>You consent to the processing of your personal data for volunteer
                                    activities.</i></small>
                            <small><i>If you have any questions or concerns, please contact DPPAM’s
                                    administration.</i></small>

                            <div class="mb-3 mt-5 text-center">
                                <button class="btn btn-primary px-4" type="submit" id="signUpBtn" disabled>Sign
                                    Up</button>
                            </div>

                            <!--SUCCESS MODAL-->
                            <div class="modal fade" id="SuccessModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary p-2">
                                        </div>
                                        <div class="modal-body">
                                            <div class="text-center">
                                                <img src="../img/icons8-checkmark-90 (1).png" alt="">
                                                <h3 class="text-primary">SUCCESS</h3>
                                                <p class="text-muted">Your account on <strong><span
                                                            class="text-danger">Serv</span><span
                                                            class="text-primary">ify</span></strong>
                                                    has been created.</p>
                                                <p class="text-muted">Check your email for more details.</p>
                                                <button type="button" class="btn btn-primary px-5" id="redirectButton"
                                                    data-bs-dismiss="modal">Done</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="mb-3 text-center">
                            <p>Already registered? <a href="/login" class="text-danger text-decoration-none">Sign
                                    in!</a>
                            </p>
                        </div>

                        <div class="mt-5 text-center">
                            <img src="../img/HANDS.png" alt="Hands" class="img-fluid loginHands">
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </section>


    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let termsCheckbox = document.getElementById("termsCheckbox");
            let signUpBtn = document.getElementById("signUpBtn");

            // Disable button initially
            signUpBtn.disabled = true;

            // Enable/Disable button based on checkbox state
            termsCheckbox.addEventListener("change", function () {
                signUpBtn.disabled = !this.checked;
            });
        });
    </script>



    <!--BOOTSTRAP JS CDN LINK-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>