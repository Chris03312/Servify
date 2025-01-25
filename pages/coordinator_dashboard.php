<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coordinator Dashboard</title>
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

    <!--JS CHART CDN-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
</head>

<body>

    <?php
    include('includes/coordinator_sidebar.php');
    ?>


    <!--MAIN CONTENT-->
    <main class="container-fluid p-3">

        <!--DASHBOARD BANNER-->
        <div class="dashboardBanner mb-4">
            <p>January 15, 2025</p>
            <h4>Welcome back, Vicmar!</h4>
        </div>

        <div class="container-fluid">
            <!--COUNTDOWN, ANNOUNCEMENT, BADGE-->
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3 mb-4">
                <!-- COUNTDOWN -->
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <p class="card-text">
                                Here is the countdown timer showing the time left until <strong>election day.</strong>
                            </p>
                            <div class="row">
                                <div class="col-3 d-flex flex-row justify-content-center align-items-center gap-1">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <h2 class="countdown p-2" id="days"><?php $days; ?></h2>
                                        <span class="text-danger fw-bold">DAYS</span>
                                    </div>
                                    <div>
                                        <h4>:</h4>
                                    </div>
                                </div>
                                <div class="col-3 d-flex flex-row justify-content-center align-items-center gap-1">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <h2 class="countdown p-2" id="hours"><?php $hours; ?></h2>
                                        <span class="text-danger fw-bold">HRS</span>
                                    </div>
                                    <div>
                                        <h4>:</h4>
                                    </div>
                                </div>
                                <div class="col-3 d-flex flex-row justify-content-center align-items-center gap-1">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <h2 class="countdown p-2" id="minutes"><?php echo $minutes; ?></h2>
                                        <span class="text-danger fw-bold">MNS</span>
                                    </div>
                                    <div>
                                        <h4>:</h4>
                                    </div>
                                </div>
                                <div class="col-3 d-flex flex-column justify-content-center align-items-center">
                                    <h2 class="countdown p-2" id="seconds"><?php echo $seconds; ?></h2>
                                    <span class="text-danger fw-bold">SEC</span>
                                </div>
                                <script>
                                // Pass the initial time values from PHP to JavaScript
                                var days = <?php echo $days; ?>;
                                var hours = <?php echo $hours; ?>;
                                var minutes = <?php echo $minutes; ?>;
                                var seconds = <?php echo $seconds; ?>;
                            </script>
                            <script src="../js/countdown.js"></script>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ANNOUNCEMENT -->
                <div class="col">
                    <div class="card h-100">
                        <div class="d-flex flex-row justify-content-start align-items-center gap-2 p-2">
                            <img src="../img/icons8-announcement-90.png" alt="Announcement Icon" class="img-fluid"
                                height="30" width="30">
                            <span class="fw-bold text-primary">Announcements</span>
                        </div>
                        <div class="card-body">
                            <div class="d-flex flex-row justify-content-center align-items-center gap-5">
                                <div class="announcementCountdown">
                                    <h1>10</h1>
                                </div>
                                <div>
                                    <p class="text-muted">Your upcoming scheduled event:</p>
                                    <h3 class="text-center">National Election Day</h3>
                                </div>
                            </div>
                            <div class="text-center mt-2">
                                <a href="#" class="text-decoration-none">See All Announcements</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- BADGE -->
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <h5 class="card-title">CONGRATULATIONS</h5>
                            <p class="card-text">You earned a <strong>Gold Badge</strong></p>
                            <div>
                                <img src="../img/GOLD BADGE.png" alt="Badge" class="img-fluid" height="auto"
                                    width="120">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!--COORDINATOR ASSIGNMENT-->
            <div class="row row-cols-1 row-cols-md-2 g-3 mb-4">
                <!--COORDINATOR ASSIGNMENT-->
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body text-center d-flex flex-column gap-2">
                            <div class="p-2 rounded">
                                <h4>You are currently assigned as: <span class="text-primary fw-bold">Coordinator</span>
                                </h4>
                            </div>
                            <div class="bg-primary p-2 rounded">
                                <h4 class="text-light">Designated at:</h4>
                            </div>
                            <div>
                                <h2>Maligaya Elementary School</h3>
                            </div>
                        </div>
                    </div>

                    <!--OVERVIEW OF VOLUNTEERS-->
                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="d-flex flex-row justify-content-between align-items-center">
                                <h5>Overview of Volunteers</h5>
                                <button type="button" id="filterButton" class="btn btn-outline-secondary">Filter</button>
                            </div>

                            <div class="row mt-3">
                                <div class="col-sm-4 mb-2">
                                    <select class="form-select group1-dropdown" name="city" id="city" disabled>
                                        <option value="" disabled selected>Select Municipality</option>
                                        <option value="">...</option>
                                        <option value="">...</option>
                                        <option value="">...</option>
                                    </select>
                                </div>
                                <div class="col-sm-4 mb-2">
                                    <select class="form-select group1-dropdown" name="district" id="district" disabled>
                                        <option value="" disabled selected>Select District</option>
                                        <option value="">...</option>
                                        <option value="">...</option>
                                        <option value="">...</option>
                                    </select>
                                </div>
                                <div class="col-sm-4 mb-2">
                                    <select class="form-select group1-dropdown" name="barangay" id="barangay" disabled>
                                        <option value="" disabled selected>Select Barangay</option>
                                        <option value="">...</option>
                                        <option value="">...</option>
                                        <option value="">...</option>
                                    </select>
                                </div>
                                <div class="col-sm-4 mb-2">
                                    <select class="form-select group1-dropdown" name="parish" id="parish" disabled> 
                                        <option value="" disabled selected>Select Parish</option>
                                        <option value="">...</option>
                                        <option value="">...</option>
                                        <option value="">...</option>
                                    </select>
                                </div>
                                <div class="col-sm-4 mb-2">
                                    <select class="form-select group1-dropdown" name="school" id="school" disabled>
                                        <option value="" disabled selected>Select School</option>
                                        <option value="">...</option>
                                        <option value="">...</option>
                                        <option value="">...</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3 mb-md-0">
                                    <!--Pie Chart Canvas-->
                                    <canvas id="volunteerPieChart"></canvas>
                                    <!--VOLUNTEER PIE CHART-->
                                    <script src="../js/volunteer_pie_chart.js"></script>
                                </div>

                                <div class="col-md-8">
                                    <!--Bar Chart Canvas-->
                                    <canvas id="volunteerBarChart"></canvas>
                                    <!--VOLUNTEER BAR CHART-->
                                    <script src="../js/volunteer_bar_chart.js"></script>
                                </div>
                            </div>


                        </div>


                    </div>
                </div>

                <!-- RECENT ACTIVITY -->
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-header bg-primary text-light text-center">
                            <h5>Recent Activity</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <?php if(!empty($activities)): ?>
                                    <?php foreach ($activities as $activity): ?>
                                <li class="list-group-item">
                                    <a href="#" class="text-decoration-none text-dark">
                                        <div class="d-flex flex-row justify-content-center align-items-center gap-2">
                                            <div class="time">
                                                <p class="text-center"><?php echo $activity['FORMATTED_DATE'] ?? " "; ?></p>
                                            </div>
                                            <div class="time">
                                                <p class="text-center"><?php echo htmlspecialchars($activity['DESCRIPTION'] ?? " "); ?></p>
                                            </div>
                                            <div class="time">
                                                <p><i class="bi bi-chevron-right"></i></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <?php endforeach; ?>
                                <?php else: ?>
                                    <p class ="text-center"> No Activities</p>
                                <?php endif; ?>
                            </ul>

                        </div>
                    </div>
                </div>



            </div>

            <!--PENDING APPLICATION-->
            <div class="row mt-3">
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5>Pending Application</h5>

                            <div class="text-center">
                                <h4 class="text-danger">5</h4>
                                <a href="#" class="btn text-primary">Review</a>
                            </div>
                        </div>
                    </div>
                    <!--SUMMARY OF ATTENDANCE-->
                    <div class="card">
                        <div class="card-body">
                            <h5>Summary of Attendance</h5>
                            <div class="d-flex justify-content-center mt-2">
                                <button type="button" class="btn btn-outline-secondary"><i
                                        class="bi bi-plus me-2"></i>Add Attendance</button>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-6 text-center">
                                    <span class="text-muted">Total Present</span>
                                    <h4 class="text-danger">200</h4>
                                </div>
                                <div class="col-md-6 text-center">
                                    <span class="text-muted">Total Present</span>
                                    <h4 class="text-danger">200</h4>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center">
                                <a href="#" class="btn text-primary">View Attendance</a>
                            </div>
                            


                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <!-- MAP PREVIEW-->
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <!-- TEXT ON THE LEFT -->
                                    <div class="d-flex flex-column justify-content-start align-items-start">
                                                <p>Total Volunteers in:</p>
                                                <div class="text-center mt-2">
                                                    <span class="text-muted">Caloocan City</span>
                                                    <h4 class="text-danger">500</h4>
                                                </div>

                                                <div class="text-center mt-2">
                                                    <span class="text-muted">Malabon City</span>
                                                    <h4 class="text-danger">1000</h4>
                                                </div>

                                                <div class="text-center mt-2">
                                                    <span class="text-muted">Navotas City</span>
                                                    <h4 class="text-danger">1500</h4>
                                                </div>
                                            </div>
                                </div>

                                <div class="col-md-10">
                                    <!-- MAP ON THE RIGHT -->
                                    <div class="mt-2">
                                                <iframe
                                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15445.173431257543!2d120.97427814951024!3d14.582352624427244!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c98a4bfb38fd%3A0xfb33eeff422ecbbd!2sPope%20Pius%20XII%20Catholic%20Center!5e0!3m2!1sen!2sph!4v1729786575051!5m2!1sen!2sph"
                                                    style="border:0; width: 100%; height: 500px;" allowfullscreen=""
                                                    loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                                                </iframe>
                                            </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="d-flex flex-row justify-content-between align-items-center">
                            <h4>List of Volunteers</h4>
                            <button type="button" id="filterButtonVol" class="btn btn-outline-secondary">Filter</button>
                        </div>

                        <div class="row mt-3">
                                <div class="col-sm-3 mb-2">
                                    <select class="form-select group2-dropdown" disabled name="city" id="city">
                                        <option value="" disabled selected>Select Municipality</option>
                                        <option value="">...</option>
                                        <option value="">...</option>
                                        <option value="">...</option>
                                    </select>
                                </div>
                                <div class="col-sm-3 mb-2">
                                    <select class="form-select group2-dropdown" disabled name="district" id="district">
                                        <option value="" disabled selected>Select District</option>
                                        <option value="">...</option>
                                        <option value="">...</option>
                                        <option value="">...</option>
                                    </select>
                                </div>
                                <div class="col-sm-3 mb-2">
                                    <select class="form-select group2-dropdown" disabled name="barangay" id="barangay">
                                        <option value="" disabled selected>Select Barangay</option>
                                        <option value="">...</option>
                                        <option value="">...</option>
                                        <option value="">...</option>
                                    </select>
                                </div>
                                <div class="col-sm-3 mb-2">
                                    <select class="form-select group2-dropdown" disabled name="parish" id="parish">
                                        <option value="" disabled selected>Select Parish</option>
                                        <option value="">...</option>
                                        <option value="">...</option>
                                        <option value="">...</option>
                                    </select>
                                </div>
                                <div class="col-sm-3 mb-2">
                                    <select class="form-select group2-dropdown" disabled name="school" id="school">
                                        <option value="" disabled selected>Select School</option>
                                        <option value="">...</option>
                                        <option value="">...</option>
                                        <option value="">...</option>
                                    </select>
                                </div>
                                <script src="js/dropdownFilter.js"></script>
                            </div>

                            <div class="row d-flex justify-content-end">
                                <div class="col-md-4">
                                <input type="search" name="search" id="search" class="form-control" placeholder="Search mo rito pre">
                                </div>
                            </div>

                            <!--TABLE-->

                            <div class="table-responsive my-3">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Membership ID</th>
                                            <th scope="col">Precinct Number</th>
                                            <th scope="col">Volunteer Name</th>
                                            <th scope="col">Volunteer Precinct</th>
                                            <th scope="col">Volunteer Role</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="">
                                            <td scope="row">R1C1</td>
                                            <td>R1C2</td>
                                            <td>R1C3</td>
                                            <td>R1C3</td>
                                            <td>R1C3</td>
                                            <td>Action</td>
                                        </tr>
                                        <tr class="">
                                            <td scope="row">R1C1</td>
                                            <td>R1C2</td>
                                            <td>R1C3</td>
                                            <td>R1C3</td>
                                            <td>R1C3</td>
                                            <td>Action</td>
                                        </tr>
                                        <tr class="">
                                            <td scope="row">R1C1</td>
                                            <td>R1C2</td>
                                            <td>R1C3</td>
                                            <td>R1C3</td>
                                            <td>R1C3</td>
                                            <td>Action</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            


                    </div>
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