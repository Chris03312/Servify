<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coordinator | Attendance Tracking</title>
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
    include('includes/coordinator_sidebar.php');
    ?>


    <!--MAIN CONTENT-->
    <main class="container-fluid p-3">


        <h4 class="mb-5">Attendance Tracking</h4>

        <div class="card mb-3">
            <div class="card-header bg-primary py-3">
                <span class="fs-5 text-light"><i class="bi bi-person-circle me-2"></i>Coordinator Details</span>
            </div>

            <div class="card-body">

                <div class="d-flex flex-row justify-content-between align-items-center">
                    <!--PROFILE PICTURE AND DETAILS-->
                    <div class="d-flex flex-row justify-content-start align-items-center">
                        <div><img src="../img/DPPAM LOGO.png" alt="Profile Picture" class="img-fluid" width="100px">
                        </div>
                        <div class="d-flex flex-column">
                            <span
                                class="fs-4"><?php echo $getattedancecoorInfo['FIRST_NAME'] . " " . $getattedancecoorInfo['MIDDLE_NAME'] . " " . $getattedancecoorInfo['SURNAME'] ?? ""; ?></strong></span>
                            <span class="fs-6"><strong>Membershio No:
                                    <?php echo $getattedancecoorInfo['CPROFILE_ID'] ?? ""; ?> </strong></span>
                            <span class="fs-6">Coordinator -
                                <?php echo $getattedancecoorInfo['MUNICIPALITY/CITY'] . " " . $getattedancecoorInfo['POLLING_PLACE'] ?? ""; ?></span>
                        </div>
                    </div>

                    <!--QR CODE-->
                    <div>
                        <img src="../img/DPPAM LOGO.png" alt="QR Code" class="img-fluid" width="100px">
                    </div>
                </div>

            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header bg-primary py-3">
                <span class="fs-5 text-light"><i class="bi bi-stopwatch me-2"></i>Hours to be rendered: <strong>24
                        hours</strong></span>
            </div>

            <div class="card-body text-center">
                <span class="fs-5">You still have: <span class="text-danger fw-bold">20:10:15</span> remaining</span>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header bg-primary py-3">
                <span class="fs-5 text-light"><i class="bi bi-stopwatch me-2"></i>Timestamp</span>
            </div>

            <div class="card-body">
                <!--DATE-->
                <div class="text-center mb-3">
                    <span class="fs-5"><?php echo date('D, F j, Y'); ?></span>
                </div>

                <div class="container px-5 d-flex flex-column gap-3">
                    <span class="fs-5"><strong>Time In: </strong>08:00 am</span>
                    <span class="fs-5"><strong>Time Out: </strong>5:00 pm</span>
                </div>
            </div>
        </div>

        <!--FILTER AND ADD ATTENDANCE BUTTON-->
        <div class="d-flex flex-row justify-content-end align-items-center gap-2 mb-3">
            <div class="dropdown">
                <button type="button" class="btn btn-outline-secondary" id="attendanceFilter" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="bi bi-filter me-2"></i>Filter</button>
                </button>

                <div class="dropdown-menu">
                    <button class="dropdown-item">School 1</button>
                    <button class="dropdown-item">School 2</button>
                    <button class="dropdown-item">School 3</button>
                    <button class="dropdown-item">School 4</button>
                </div>
            </div>



            <button type="button" class="btn btn-outline-secondary"><i class="bi bi-plus me-2"></i>Add
                Attendance</button>
        </div>
        <div class="row">

            <div class="col-md-3 mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex flex-row justify-content-start align-items-center gap-3">
                            <span class="fs-1"><i class="bi bi-people-fill text-primary"></i></span>
                            <span>Total number of Voters</span>
                        </div>
                        <span class="fs-2 text-danger fw-bold">255</span>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex flex-row justify-content-start align-items-center gap-3">
                            <span class="fs-1"><i class="bi bi-person-check-fill text-primary"></i></span>
                            <span>Total number of Registered Volunteers</span>
                        </div>
                        <span class="fs-2 text-danger fw-bold">255</span>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex flex-row justify-content-start align-items-center gap-3">
                            <span class="fs-1"><i class="bi bi-check-circle text-success"></i></span>
                            <span>Total number of Present</span>
                        </div>
                        <span class="fs-2 text-danger fw-bold">255</span>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex flex-row justify-content-start align-items-center gap-3">
                            <span class="fs-1"><i class="bi bi-x-circle text-danger"></i></span>
                            <span>Total number of Absent</span>
                        </div>
                        <span class="fs-2 text-danger fw-bold">255</span>
                    </div>
                </div>
            </div>

            <!--TABLE-->
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-primary text-nowrap">
                        <tr>
                            <th>Date</th>
                            <th>Time In</th>
                            <th>Time Out</th>
                            <th>Volunteer Name</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th>Assigned Place</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($volunteersPerParish)): ?> <!-- Notice the ! (negation) -->
                            <?php foreach ($volunteersPerParish as $volunteers): ?>
                                <tr>
                                    <td scope="row"><?php echo htmlspecialchars($volunteers['DATE']); ?></td>
                                    <td><?php echo htmlspecialchars($volunteers['TIME_IN']); ?></td>
                                    <td><?php echo htmlspecialchars($volunteers['TIME_OUT']); ?></td>
                                    <td><?php echo htmlspecialchars($volunteers['VOLUNTEER_NAME']); ?></td>
                                    <td><?php echo htmlspecialchars($volunteers['ROLE']); ?></td>
                                    <td><?php echo htmlspecialchars($volunteers['EMAIL']); ?></td>
                                    <td><?php echo htmlspecialchars($volunteers["POLLING_PLACE"]); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7">No Volunteers found!</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                    <tfoot>

                    </tfoot>
                </table>
            </div>


        </div>


        <!--
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mb-3">
                    <div class="container-fluid d-flex flex-row justify-content-between align-items-center border p-3">
                        <div class="d-flex flex-row justify-content-center align-items-center gap-3">
                            <div><img src="../img/DPPAM LOGO.png" alt="Profile picture" class="img-fluid" width="100px;"></div>
                            <div>
                                <h4>Name</h4>
                                <p><strong>Membership no:</strong></p>
                                <p></p>
                            </div>
                        </div>

                        <div class="qrCode">
                            <img src="../img/PPCRV LOGO.png" alt="QR Code" class="img-fluid" width="100px;">
                        </div>
                    </div>
                </div>

                <div class="col-12 mb-3">
                    <div class="container-fluid text-center border p-3">
                        <h5><span class="text-danger" id="message">Loading...</span></h5>
                    </div>
                    <script>
                        var attendanceData = {
                            timeIn: "", // Example: "14:30:00" or null
                            timeOut: "", // Example: "17:00:00" or null
                            targetTimeOut: "",
                            targetTimeIn: "" // Fixed target time
                        };
                    </script>
                    <script src="js/attendancetime.js"></script>
                </div>


                <div class="col-12">
                    <div class="container-fluid border p-3" style="border-top: 40px solid blue !important;">
                        <!-Display formatted date ->
                        <h5 class="text-center">

                        </h5>

                        <div>
                            <!-Display time-in and time-out ->
                            <div class="time-in">
                                <h3>TIME IN: </h3>
                            </div>
                            <div class="time-out">
                                <h3>TIME OUT: </h3>
                            </div>
                        </div>
                    </div>
                </div>

                <p>No attendance records found.</p>

            </div>
        </div>

-->













    </main>
    </div>
    </div>



    <!--BOOTSTRAP JS CDN LINK-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>