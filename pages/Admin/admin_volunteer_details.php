<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer | Application Details</title>
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
</head>

<body>

    <?php
    include('includes/admin_sidebar.php');
    ?>

    <!--MAIN CONTENT-->
    <main class="container-fluid p-3">

        <div class="container-fluid">
            <!--FORM-->
            <!--PHOTO AND NAME-->
            <div class="d-flex flex-row justify-content-between align-items-start mb-3">
                <div class="d-flex flex-row justify-content-start align-items-center mb-3">
                    <!--PHOTO-->
                    <img src="../img/DPPAM LOGO.png" alt="1x1 PIC" height="auto" width="100px">

                    <!--NAME-->
                    <p><?php echo $volunteersDetails['FIRST_NAME'] . " " . $volunteersDetails['MIDDLE_NAME'] . " " . $volunteersDetails['SURNAME'] ?>
                    </p>
                </div>

                <div>
                    <button type="button" class="btn btn-sm btn-outline-secondary"><i class="bi bi-pen me-2"></i>Edit
                        Information</button>
                </div>
            </div>

            <!--NAV TABS-->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="volunteer-application-details-tab" data-bs-toggle="tab"
                        data-bs-target="#volunteer-application-details-tab-pane" type="button" role="tab"
                        aria-controls="home-tab-pane" aria-selected="true">Volunteer Info</button>
                </li>
            </ul>

            <!--TAB CONTENT-->
            <div class="tab-content border-start border-end border-bottom" id="myTabContent"
                style="border-top: 10px solid blue;">

                <!--VOLUNTEER INFO-->
                <div class="tab-pane fade show active p-3" id="volunteer-application-details-tab-pane" role="tabpanel"
                    aria-labelledby="volunteer-application-details-tab" tabindex="0">

                    <section class="container p-5">
                        <div class="row">
                            <div class="col-auto"><strong>Application Type:</strong></div>
                            <div class="col-auto"><span>New</span></div>
                        </div>
                        <div class="row">
                            <div class="col-auto"><strong>ID Presented:</strong></div>
                            <div class="col-auto">
                                <span><?php echo strtoupper(pathinfo($volunteersDetails['VALID_ID'], PATHINFO_FILENAME)); ?></span>
                            </div>
                            <div class="col-auto"><strong>ID NO.:</strong></div>
                            <div class="col-auto"><span><?php echo $volunteersDetails['ID_NUMBER']; ?></span></div>
                        </div>


                        <!-- VOLUNTEER INFORMATION -->
                        <article>
                            <div class="double-line-text my-3">
                                <hr class="line">
                                <h5 class="text">Volunteer Information</h5>
                                <hr class="line">
                            </div>

                            <div class="row mb-1">
                                <div class="col-auto"><strong>First Name:</strong></div>
                                <div class="col-auto"><span><?php echo $volunteersDetails['FIRST_NAME']; ?></span>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <div class="col-auto"><strong>Middle Name:</strong></div>
                                <div class="col-auto"><span><?php echo $volunteersDetails['MIDDLE_NAME']; ?></span>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <div class="col-auto"><strong>Last Name:</strong></div>
                                <div class="col-auto"><span><?php echo $volunteersDetails['SURNAME']; ?></span>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <div class="col-auto"><strong>Name Suffix:</strong></div>
                                <div class="col-auto"><span><?php echo $volunteersDetails['NAME_SUFFIX']; ?></span>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <div class="col-auto"><strong>Nickname:</strong></div>
                                <div class="col-auto"><span><?php echo $volunteersDetails['NICKNAME']; ?></span>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <div class="col-auto"><strong>Sex:</strong></div>
                                <div class="col-auto"><span><?php echo $volunteersDetails['GENDER']; ?></span>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <div class="col-auto"><strong>Civil Status:</strong></div>
                                <div class="col-auto">
                                    <span><?php echo $volunteersDetails['CIVIL_STATUS']; ?></span>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <div class="col-auto"><strong>Birthday:</strong></div>
                                <div class="col-auto">
                                    <span><?php echo $volunteersDetails['BIRTHMONTH'] . ' ' . $volunteersDetails['BIRTHDATE'] . ', ' . $volunteersDetails['BIRTHYEAR']; ?></span>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <div class="col-auto"><strong>Age:</strong></div>
                                <div class="col-auto"><span><?php echo $volunteersDetails['AGE']; ?></span>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <div class="col-auto"><strong>Citizenship:</strong></div>
                                <div class="col-auto"><span><?php echo $volunteersDetails['CITIZENSHIP']; ?></span>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <div class="col-auto"><strong>Occupation:</strong></div>
                                <div class="col-auto"><span><?php echo $volunteersDetails['OCCUPATION']; ?></span>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <div class="col-auto"><strong>Company Name:</strong></div>
                                <div class="col-auto">
                                    <span><?php echo $volunteersDetails['COMPANY_NAME']; ?></span>
                                </div>
                            </div>
                        </article>

                        <!-- CONTACT DETAILS -->
                        <article>
                            <div class="double-line-text my-3">
                                <hr class="line">
                                <h5 class="text">CONTACT DETAILS</h5>
                                <hr class="line">
                            </div>

                            <div class="row mb-1">
                                <div class="col-auto"><strong>Address:</strong></div>
                                <div class="col-auto">
                                    <span><?php echo $volunteersDetails['STREETADDRESS'] . ', ' . $volunteersDetails['BARANGAY'] . ', ' . $volunteersDetails['CITY']; ?></span>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <div class="col-auto"><strong>Email:</strong></div>
                                <div class="col-auto"><span><?php echo $volunteersDetails['EMAIL']; ?></span></div>
                            </div>

                            <div class="row mb-1">
                                <div class="col-auto"><strong>Mobile Number:</strong></div>
                                <div class="col-auto">
                                    <span><?php echo $volunteersDetails['MOBILE_NUMBER']; ?></span>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <div class="col-auto"><strong>Tel Number:</strong></div>
                                <div class="col-auto"><span><?php echo $volunteersDetails['TEL_NUMBER']; ?></span>
                                </div>
                            </div>


                        </article>


                        <!-- ADDITIONAL INFORMATION -->
                        <article>
                            <div class="double-line-text my-3">
                                <hr class="line">
                                <h5 class="text">ADDITIONAL INFORMATION</h5>
                                <hr class="line">
                            </div>

                            <div class="row mb-1">
                                <div class="col-auto"><strong>Parish Organization Membership:</strong></div>
                                <div class="col-auto">
                                    <span><?php echo $volunteersDetails['PARISH_ORG_MEMBERSHIP']; ?></span>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <div class="col-auto"><strong>Previous PPCRV Experience:</strong></div>
                                <div class="col-auto">
                                    <span><?php echo $volunteersDetails['PREVIOUS_EXP_YRS']; ?></span>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <div class="col-auto"><strong>Years of Service:</strong></div>
                                <div class="col-auto">
                                    <span><?php echo $volunteersDetails['PREVIOUS_EXP_YRS']; ?></span>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <div class="col-auto"><strong>Previous PPCRV Volunteer Assignment:</strong></div>
                                <div class="col-auto">
                                    <span><?php echo $volunteersDetails['PREVIOUS_PPCRV_VOL_ASS']; ?></span>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <div class="col-auto"><strong>Previous Precinct:</strong></div>
                                <div class="col-auto">
                                    <span><?php echo $volunteersDetails['PREVIOUS_PPCRV_PRECINCT']; ?></span>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <div class="col-auto"><strong>Preferred PPCRV Volunteer Assignment:</strong></div>
                                <div class="col-auto">
                                    <span><?php echo $volunteersDetails['PREFERRED_PPCRV_VOL_ASS']; ?></span>
                                </div>
                            </div>
                        </article>
                        <div class="flex justify-center items-center h-screen">
                            <a href="/admin_volunteer_details"
                                class="px-4 py-2 bg-gray-300 text-black font-semibold rounded-lg shadow-md hover:bg-gray-400 focus:outline-none">
                                Go Back
                            </a>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>
    </div>
    </div>




    <script src="../js/volunteer_new_application.js"></script>
    <!--BOOTSTRAP JS CDN LINK-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>