<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance</title>
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
    include('../includes/volunteer_sidebar.php');
    ?>


    <!--MAIN CONTENT-->
    <main class="container-fluid p-3">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mb-3">
                    <div class="container-fluid d-flex flex-row justify-content-between align-items-center border p-3">
                        <div class="d-flex flex-row justify-content-center align-items-center gap-3">
                            <div><img src="../img/DPPAM LOGO.png" alt="Profile picture" class="img-fluid" width="100px;"></div>
                            <div>
                                <h4>Vicmar M. Guzman</h4>
                            <p><strong>Membership no:</strong>1234</p>
                            <p>Poll Watcher - Maligaya Elementary School</p>
                        </div>
                        </div>

                        <div class="qrCode">
                            <img src="../img/PPCRV LOGO.png" alt="QR Code" class="img-fluid" width="100px;">
                        </div>
                    </div>
                </div>

                <div class="col-12 mb-3">
                    <div class="container-fluid text-center border p-3">
                        <h5>YOU STILL HAVE <span class="text-danger">20:10:15</span></h5>
                    </div>
                </div>

                <div class="col-12">
                    <div class="container-fluid border p-3" style="border-top: 40px solid blue !important;">
                        <h5 class="text-center">MON, JAN. 13, 2025</h5>

                        <div>
                            <div class="time-in"><h3>TIME IN: </h3></div>
                            <div class="time-out"><h3>TIME OUT: </h3></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



      



    </main>
    </div>
    </div>



    <!--BOOTSTRAP JS CDN LINK-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>