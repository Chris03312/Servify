<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servify | Sign Up</title>
    <link rel="stylesheet" href="../css/login_style.css">
    <!--BOOTSTRAP CSS CDN LINK-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>

    <section class="login_bg">

        <div class="container-md p-5">

            <div class="row align-items-center justify-content-center bg-light rounded">

                <div class="loginLeftContainer col-lg-4 p-5">
                    <div class="d-flex flex-row justify-content-around align-items-center gap-3">
                        <img src="../img/PPCRV LOGO.png" alt="PPCRV Logo" class="img-fluid loginLogo">
                        <img src="../img/DPPAM LOGO.png" alt="DPPAM Logo" class="img-fluid loginLogo">
                    </div>

                    <div>
                        <p class="text-center fs-6">
                            You are accessing a secure system of
                            <strong>Diocese of Caloocan Public and Political Affairs Ministry (DPPAM).</strong>
                            Any unauthorized use or actions beyond your permitted access are strictly prohibited
                            and may lead to disciplinary measures, legal action, or criminal charges.
                        </p>

                        <p class="text-center fs-6">
                            If you are an official <strong>volunteer, coordinator,</strong> or <strong>administrator</strong>
                            registering for the first time, kindly inform the system administrator or assigned
                            coordinator after completing your registration to expedite the approval process.
                        </p>
                    </div>
                </div>

                <div class="right col-lg-8 pt-4">
                    <div class="text-center">
                        <h1 class="fw-bolder"><span class="text-danger">Serv</span><span class="text-primary">ify</span></h1>
                        <h3>Sign Up Form</h3>

                        <div class="d-flex flex-column">
                            <span class="text-muted">Enter your details below to create your account and get started.</span>
                        </div>

                        <spam class="text-muted"></spam>
                    </div>
                        
                    <form id="signupForm" action="/signup/submit" class="row mt-5" method="POST">
                        <!--PARISH NAMES-->
                        <div class="col-md-12 mb-3">
                            <label for="parishNameDataList" class="form-label"><strong>You are currently registering as VOLUNTEER at:<sup class="text-danger">*</sup></strong></label>
                            <input class="form-control" list="parishNameOptions" id="parishNameDataList" name="parish" placeholder="Type to search..."  >
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

                        <div class="col-md-3 mb-3">
                            <label for="surname" class="form-label">Surname<sup class="text-danger fw-bold">*</sup></label>
                            <input type="text" class="form-control" id="surname" name="surname" placeholder="Ex. Dela Cruz">
                            <div class="validation text-danger"></div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="firstname" class="form-label">First name<sup class="text-danger fw-bold">*</sup></label>
                            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Ex. Juan">
                            <div class="validation text-danger"></div>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="middlename" class="form-label">Middle name (Optional)</label>
                            <input type="text" class="form-control" id="middlename" name="middleName">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="suffix" class="form-label">Suffix (Optional)</label>
                            <input type="text" class="form-control" id="suffix" name="suffix" placeholder="Ex. Jr">
                        </div>

                        <strong class="mb-3">Birth Day</strong>
                        <div class="col-md-4 mb-3">
                            <label for="birthMonth" class="form-label">Month<sup class="text-danger fw-bold">*</sup></label>
                            <select id="birthMonth" class="form-select" name="birthMonth" >
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
                            <label for="birthDate" class="form-label">Day<sup class="text-danger fw-bold">*</sup></label>
                            <input type="text" class="form-control" id="birthDate" name="birthDate" >
                            <div class="validation text-danger"></div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="birthYear" class="form-label">Year<sup class="text-danger fw-bold">*</sup></label>
                            <input type="text" class="form-control" id="birthYear" name="birthYear" >
                            <div class="validation text-danger"></div>
                        </div>

                        <strong class="mb-3">Address</strong>
                        <div class="col-md-12 mb-3">
                            <label for="city" class="form-label">City<sup class="text-danger fw-bold">*</sup></label>
                            <select id="city" class="form-select" name="city" >
                                <option selected disabled value="">Select City</option>
                                <?php foreach ($cities as $city): ?>
                                    <option value="<?php echo htmlspecialchars($city['MUNICIPALITY/CITY']); ?>">
                                        <?php echo htmlspecialchars($city['MUNICIPALITY/CITY']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <div class="validation text-danger"></div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label for="street" class="form-label">Street/Unit/Bldg/Village<sup class="text-danger fw-bold">*</sup></label>
                            <input type="text" class="form-control" id="street" name="street" placeholder="Ex. Blk# Lot#">
                            <div class="validation text-danger"></div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="barangay" class="form-label">Barangay<sup class="text-danger fw-bold">*</sup></label>
                            <select id="barangay" class="form-select" name="barangay" >
                                <option selected disabled value="">Select Barangay</option>
                                <!-- Barangay options will be populated dynamically using JavaScript -->
                            </select>
                            <div class="validation text-danger"></div>
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
                            <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="Ex. 1118">
                            <div class="validation text-danger"></div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email<sup class="text-danger fw-bold">*</sup></label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Ex. example1@gmail.com" >
                            <div class="validation text-danger"></div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="username" class="form-label">Create Username<sup class="text-danger fw-bold">*</sup></label>
                            <input type="text" class="form-control" id="username" name="username" >
                            <div class="validation text-danger"></div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="password" class="form-label">Create Password<sup class="text-danger fw-bold">*</sup></label>
                            <input type="password" class="form-control" id="password" name="password">
                            <div class="validation text-danger"></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="confirmPassword" class="form-label">Confirm Password<sup class="text-danger fw-bold">*</sup></label>
                            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" >
                            <div class="validation text-danger"></div>
                        </div>

                        <div class="mb-3 text-center">
                            <button class="btn btn-primary px-4" type="submit">Sign Up</button>
                        </div>

                        <!--SUCCESS MODAL-->
                        <div class="modal fade" id="SuccessModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary p-2">
                                    </div>
                                    <div class="modal-body">
                                        <div class="text-center">
                                            <img src="../img/icons8-checkmark-90 (1).png" alt="">
                                            <h3 class="text-primary">SUCCESS</h3>
                                            <p class="text-muted">Your account on <strong><span class="text-danger">Serv</span><span class="text-primary">ify</span></strong>
                                                has been created.</p>
                                            <p class="text-muted">Check your email for more details.</p>
                                            <button type="button" class="btn btn-primary px-5" id="redirectButton" data-bs-dismiss="modal">Done</button>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>

                    <div class="mb-3 text-center">
                        <p>Already registered? <a href="/login" class="text-danger text-decoration-none">Sign in!</a></p>
                    </div>

                    <div class="mt-5">
                        <img src="../img/HANDS.png" alt="Hands" class="img-fluid loginHands">
                    </div>
                </div>
            </div>

        </div>


    </section>




    <!--BOOTSTRAP JS CDN LINK-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>