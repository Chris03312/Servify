<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer | Renewal Application</title>
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
    include('includes/volunteer_sidebar.php');
    ?>


    <!--MAIN CONTENT-->
    <main class="container-fluid p-3">


        <!-- NOT TIME FOR RENEWAL -->
        <div class="container-fluid">
            <div class="modal fade" id="renewalModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-primary p-2"></div>
                        <div class="modal-body p-5">
                            <div class="container-fluid">
                                <div class="d-flex flex-column flex-lg-row justify-content-center align-items-center">
                                    <div class="">
                                        <img src="../img/COMING SOON.png" alt="">
                                    </div>
                                    <div class="">
                                        <h4 class="mb-3">Thank you for your interest!</h4>
                                        <p>Renewal is currently closed. Please wait for further announcements regarding the opening
                                            of the renewal process. <br> Thank you for your understanding.</p>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary float-end" data-bs-dismiss="modal" id="NotRenewalOK">OK</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="d-flex flex-column align-items-center justify-content-center vh-100 gap-1">
                <h1 class="text-primary fw-bold">Wait for further notice!</h1>
                <p class="text-muted">Thank you for understanding!</p>
            </div> -->
        </div>



        <!-- IF IT'S TIME FOR RENEWAL -->


        <!-- FIRST MODAL QUESTION -->
        <div class="container-fluid">
            <div class="modal fade" id="volunteerContinuationModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="volunteerContinuationModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-primary p-2"></div>
                        <div class="modal-body">

                            <div class="d-flex flex-column justify-content-center align-items-center gap-2">
                                <img src="../../img/question-mark.png" alt="Question Mark Icon" class="img-fluid" style="width: 80px;">
                                <p class="text-center">Are you still willing to continue as a volunteer?</p>
                                <div class="d-flex flex-sm-row flex-column justify-content-center align-items-center gap-2">
                                    <button type="button" class="btn btn-primary px-5" data-bs-toggle="modal" data-bs-target="#volunteerParticipationModal">Yes</button>
                                    <button type="button" class="btn btn-danger px-5" data-bs-dismiss="modal" id="firstModalNo">No</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- SECOND MODAL QUESTION -->
            <div class="modal fade" id="volunteerParticipationModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="volunteerParticipationModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-primary p-2"></div>
                        <div class="modal-body">

                            <div class="d-flex flex-column justify-content-center align-items-center gap-2">
                                <img src="../../img/question-mark.png" alt="Question Mark Icon" class="img-fluid" style="width: 80px;">
                                <p class="text-center">Have you participated in any volunteer activities in the past year or this year?</p>
                                <div class="d-flex flex-sm-row flex-column justify-content-center align-items-center gap-2">
                                    <button type="button" class="btn btn-primary px-5" data-bs-toggle="modal" data-bs-target="#personalDetailsUpdateModal">Yes</button>
                                    <button type="button" class="btn btn-danger px-5" data-bs-dismiss="modal">No</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- THIRD MODAL QUESTION -->
            <div class="modal fade" id="personalDetailsUpdateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="personalDetailsUpdateModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-primary p-2"></div>
                        <div class="modal-body">

                            <div class="d-flex flex-column justify-content-center align-items-center gap-2">
                                <img src="../../img/question-mark.png" alt="Question Mark Icon" class="img-fluid" style="width: 80px;">
                                <p class="text-center">Have any of your personal details changed?<br><em>(e.g., contact info, emergency contact)</em></p>
                                <div class="d-flex flex-sm-row flex-column justify-content-center align-items-center gap-2">
                                    <button type="button" class="btn btn-primary px-5" data-bs-toggle="modal" data-bs-target="#guidelinesAgreementModal">Yes</button>
                                    <button type="button" class="btn btn-danger px-5" data-bs-dismiss="modal">No</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FOURTH MODAL QUESTION -->
            <div class="modal fade" id="guidelinesAgreementModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="guidelinesAgreementModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-primary p-2"></div>
                        <div class="modal-body">

                            <div class="d-flex flex-column justify-content-center align-items-center gap-2">
                                <img src="../../img/question-mark.png" alt="Question Mark Icon" class="img-fluid" style="width: 80px;">
                                <p class="text-center">Do you agree to continue following the organization's guidelines and code of conduct?</p>
                                <div class="d-flex flex-sm-row flex-column justify-content-center align-items-center gap-2">
                                    <button type="button" class="btn btn-primary px-5" data-bs-dismiss="modal">Yes</button>
                                    <button type="button" class="btn btn-danger px-5" data-bs-dismiss="modal">No</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>










    </main>
    </div>
    </div>


    <!--SHOW MODAL AUTOMATICALLY AFTER LOADING-->

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Set the renewal date (YYYY-MM-DD format)
            const renewalDate = "2025-06-01"; // Change this to your actual renewal date

            // Get today's date in YYYY-MM-DD format
            const today = new Date().toISOString().split("T")[0];

            // Check if today is the renewal date
            if (today !== renewalDate) {
                // Show the NOT TIME FOR RENEWAL modal
                var renewalModal = new bootstrap.Modal(document.getElementById("renewalModal"));
                renewalModal.show();
            } else {
                // Show the first renewal question modal
                var volunteerContinuationModal = new bootstrap.Modal(document.getElementById("volunteerContinuationModal"));
                volunteerContinuationModal.show();
            }
        });

        // FIRST MODAL NO
        document.getElementById("firstModalNo").addEventListener("click", function() {
            window.location.href = "/volunteer_dashboard"; // Replace with your actual dashboard URL
        });

        // NOT RENEWAL OK
        document.getElementById("NotRenewalOK").addEventListener("click", function() {
            window.location.href = "/volunteer_dashboard"; // Replace with your actual dashboard URL
        });
    </script>



    <!--BOOTSTRAP JS CDN LINK-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>