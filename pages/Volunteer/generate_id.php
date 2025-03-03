<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer | Generate ID</title>
    <link rel="stylesheet" href="../css/volunteer_registration_status.css">
    <link rel="stylesheet" href="../css/volunteer_dashboard.css">
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
    include('includes/volunteer_sidebar.php');
    ?>

    <!--MAIN CONTENT-->
    <main class="container-fluid p-3">
        <h4>Generate ID</h4>


        <div class="d-flex flex-md-row flex-column justify-content-center align-items-stretch gap-3">
            <!-- FRONT ID -->
            <div class="card shadow-lg border-0 d-flex flex-column" style="width: 20rem; min-height: 100%;">
                <img src="../../img/ID_HEADER.png" class="card-img-top" alt="ID HEADER">
                <div class="card-body flex-grow-1">
                    <!-- DPPAM LOGO AND TEXT -->
                    <div class="position-absolute top-0" style="margin-top: 40px;">
                        <div class="d-flex flex-row justify-content-center align-items-center gap-0">
                            <img src="../../img/DPPAM LOGO.png" alt="DPPAM LOGO" class="img-fluid" style="width: 70px;">
                            <div>
                                <div class="d-flex flex-column gap-0">
                                    <span class="text-primary" style="font-size: .6rem;">ROMAN CATHOLIC</span>
                                    <span class="text-primary" style="font-size: .6rem;">DIOCESE OF KALOOKAN</span>
                                </div>
                                <div class="d-flex flex-column gap-0">
                                    <span class="text-primary fw-bold" style="font-size: .7rem;">PUBLIC AND POLITICAL</span>
                                    <span class="text-primary fw-bold" style="font-size: .7rem;">AFFAIRS MINISTRY</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- VOLUNTEER PICTURE AND DETAILS -->
                    <div class="d-flex flex-column justify-content-center align-items-center h-100 text-center">

                        <img src="../../img/DPPAM LOGO.png" class="img-fluid rounded-circle" alt="PROFILE" style="width: 100px; border: 10px solid blue;">

                        <div class="mt-3 d-flex flex-column justify-content-center align-items-center gap-0" style="line-height: 1;">
                            <span><h4>TAMAD</h4></span>
                            <span>JUAN A.</span>
                        </div>

                        <p class="mt-3 text-muted">Volunteer</p>
                    </div>
                </div>
                <img src="../../img/ID_FOOTER.png" class="img-fluid" alt="ID FOOTER">
            </div>

            <!-- BACK ID -->
            <div class="card shadow-lg border-0 d-flex flex-column" style="width: 20rem; min-height: 100%;">
                <img src="../../img/ID_HEADER.png" class="card-img-top" alt="ID HEADER">
                <div class="card-body flex-grow-1">
                    <!-- DPPAM LOGO -->
                    <div class="position-absolute top-0 start-50 translate-middle-x" style="margin-top: 40px;">
                        <img src="../../img/DPPAM LOGO.png" alt="DPPAM LOGO" class="img-fluid" style="width: 70px;">
                    </div>

                    <!-- TERMS AND CONDITIONS -->
                    <div class="text-center">
                        <p class="my-3 text-primary fw-bold">TERMS AND CONDITIONS</p>
                        <ul class="text-primary" style="line-height: 1;">
                            <li><small>Wear this ID at all times during official activities.</small></li>
                            <li><small>Report issues or emergencies to your coordinator.</small></li>
                            <li><small>Follow ethical standards and organization guidelines.</small></li>
                            <li><small>Unauthorized use of this ID is strictly prohibited.</small></li>
                        </ul>

                        <!-- QC CODE -->
                        <div class="d-flex flex-column justify-content-center align-items-center gap-0">
                            <img src="../../img/DPPAM LOGO.png" alt="QR CODE" class="img-fluid" style="width: 80px;">
                            <small><strong>Scan QR Code to Record Attendance</strong></small>

                            <!-- CONTACTS -->
                            <div class="d-flex flex-column justify-content-center align-items-center gap-0 mt-2">
                                <small class="text-primary"><i class="bi bi-telephone-fill me-2"></i>09123456789</small>
                                <small class="text-primary"><i class="bi bi-globe me-2"></i>www.servify.com</small>
                                <small class="text-primary"><i class="bi bi-envelope-fill me-2"></i>sto.rosarioparish@dppam.gmail.com</small>
                            </div>
                        </div>
                    </div>
                </div>
                <img src="../../img/ID_FOOTER.png" class="img-fluid" alt="ID FOOTER">
            </div>
        </div>


    </main>
    </div>
    </div>
    <!--BOOTSTRAP JS CDN LINK-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>