<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/admin_dashboard.css">
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
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />


    <!--JS CHART CDN-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet.heat/dist/leaflet-heat.js"></script>

</head>

<body>

    <?php
    include('includes/admin_sidebar.php');
    ?>


    <!--MAIN CONTENT-->
    <main class="container-fluid p-0 p-md-3">

        <div class="container-fluid">

            <!--DASHBOARD BANNER-->
            <div class="dashboardBanner mb-4">
                <p><?php echo date('F j, Y'); ?></p>
                <h4>Welcome back, <?php echo $role; ?>!</h4>
            </div>
            <!--COUNTDOWN, ANNOUNCEMENT, BADGE-->
            <div class="row g-3 mb-4">
                <!-- COUNTDOWN -->
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="card h-100">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <p class="card-text">
                                Here is the countdown timer showing the time left until <strong>election day.</strong>
                            </p>
                            <div class="row">
                                <div class="col-3 d-flex flex-row justify-content-center align-items-center gap-1">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <h2 class="countdown p-2" id="days">12</h2>
                                        <span class="text-danger fw-bold">DAYS</span>
                                    </div>
                                    <div>
                                        <h4></h4>
                                    </div>
                                </div>
                                <div class="col-3 d-flex flex-row justify-content-center align-items-center gap-1">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <h2 class="countdown p-2" id="hours">12</h2>
                                        <span class="text-danger fw-bold">HRS</span>
                                    </div>
                                    <div>
                                        <h4></h4>
                                    </div>
                                </div>
                                <div class="col-3 d-flex flex-row justify-content-center align-items-center gap-1">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <h2 class="countdown p-2" id="minutes">12</h2>
                                        <span class="text-danger fw-bold">MNS</span>
                                    </div>
                                    <div>
                                        <h4></h4>
                                    </div>
                                </div>
                                <div class="col-3 d-flex flex-column justify-content-center align-items-center">
                                    <h2 class="countdown p-2" id="seconds">12</h2>
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
                <div class="col-xl-4 col-lg-6 col-md-6">
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
                <div class="col-xl-4 col-lg-6 col-md-6">
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


            <div class="row row-cols-1 row-cols-md-2 g-3 mb-4">
                <div class="col-md-8">
                    <!--OVERVIEW OF VOLUNTEERS-->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-row justify-content-between align-items-center">
                                <h5>Overview of Volunteers</h5>
                                <button class="btn btn-outline-secondary" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#overviewOfVolunteers" aria-expanded="false"
                                    aria-controls="overviewOfVolunteers">Filter
                                </button>

                            </div>

                            <div class="collapse mb-3" id="overviewOfVolunteers">
                                <div class="row mt-3" id="filterDiv">
                                    <div class="col-sm-4 mb-2">
                                        <select class="form-select group1-dropdown" name="city" id="city">
                                            <option value="" disabled selected>Select Municipality</option>
                                            <?php foreach ($dropdownData['cities'] as $city): ?>
                                                <option value="<?php echo $city['city'] ?? ' '; ?>">
                                                    <?php echo $city['city'] ?? 'No cities available'; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-4 mb-2">
                                        <select class="form-select group1-dropdown" name="district" id="district">
                                            <option value="" disabled selected>Select District</option>
                                            <?php foreach ($dropdownData['districts'] as $district): ?>
                                                <option value="<?php echo $district['district'] ?? ' '; ?>">
                                                    <?php echo $district['district'] ?? 'No districts available'; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-4 mb-2">
                                        <select class="form-select group1-dropdown" name="barangay" id="barangay">
                                            <option value="" disabled selected>Select Barangay</option>
                                            <?php foreach ($dropdownData['barangays'] as $barangay): ?>
                                                <option value="<?php echo $barangay['barangay'] ?? ' '; ?>">
                                                    <?php echo $barangay['barangay'] ?? 'No barangays available'; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-4 mb-2">
                                        <select class="form-select group1-dropdown" name="parish" id="parish">
                                            <option value="" disabled selected>Select Parish</option>
                                            <?php foreach ($dropdownData['parishes'] as $parish): ?>
                                                <option value="<?php echo $parish['parish'] ?? ' '; ?>">
                                                    <?php echo $parish['parish'] ?? 'No parishes available'; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-4 mb-2">
                                        <select class="form-select group1-dropdown" name="school" id="school">
                                            <option value="" disabled selected>Select School</option>
                                            <?php foreach ($dropdownData['pollingPlaces'] as $polling_place): ?>
                                                <option value="<?php echo $polling_place['polling_place'] ?? ' '; ?>">
                                                    <?php echo $polling_place['polling_place'] ?? 'No cities available'; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
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
                                    <script>
                                        const allChartData = <?php echo json_encode($chartsData); ?>;
                                    </script>
                                    <script src="../js/charts.js"></script>
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
                                <?php if (!empty($activities)): ?>
                                    <?php foreach ($activities as $activity): ?>
                                        <li class="list-group-item">
                                            <a href="#" class="text-decoration-none text-dark">
                                                <div class="d-flex flex-row justify-content-center align-items-center gap-2">
                                                    <div class="time">
                                                        <p class="text-center"><?php echo $activity['FORMATTED_DATE'] ?? " "; ?>
                                                        </p>
                                                    </div>
                                                    <div class="time">
                                                        <p class="text-center">
                                                            <?php echo htmlspecialchars($activity['DESCRIPTION'] ?? " "); ?>
                                                        </p>
                                                    </div>
                                                    <div class="time">
                                                        <p><i class="bi bi-chevron-right"></i></p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <p class="text-center"> No Activities</p>
                                <?php endif; ?>
                            </ul>

                        </div>
                    </div>
                </div>



            </div>

            <!--PENDING APPROVAL-->
            <div class="row mt-3">
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5>Pending Approval</h5>

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
                                    <span class="text-muted">Total Absent</span>
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
                                            <h4 class="text-danger">
                                                <?= htmlspecialchars($totalCities['caloocan_count']); ?>
                                            </h4>
                                        </div>
                                        <div class="text-center mt-2">
                                            <span class="text-muted">Malabon City</span>
                                            <h4 class="text-danger">
                                                <?= htmlspecialchars($totalCities['malabon_count']); ?>
                                            </h4>
                                        </div>
                                        <div class="text-center mt-2">
                                            <span class="text-muted">Navotas City</span>
                                            <h4 class="text-danger">
                                                <?= htmlspecialchars($totalCities['navotas_count']); ?>
                                            </h4>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-10">
                                    <!-- MAP ON THE RIGHT -->
                                    <div class="mt-2">
                                        <div id="map" class="ratio ratio-16x9 mt-2"></div>
                                        <!-- Replace iframe with the Leaflet map -->
                                    </div>
                                    <script>
                                        // Pass PHP data to JavaScript variables (DO NOT redeclare in JS)
                                        var malabonData = <?php echo json_encode($totalCities['malabon_count']); ?>;
                                        var caloocanData = <?php echo json_encode($totalCities['caloocan_count']); ?>;
                                        var navotasData = <?php echo json_encode($totalCities['navotas_count']); ?>;

                                        // Log the values to check if they're correctly passed
                                        console.log('Malabon Volunteers:', malabonData);
                                        console.log('Caloocan Volunteers:', caloocanData);
                                        console.log('Navotas Volunteers:', navotasData);
                                    </script>
                                    <script src="../js/leafletmapcities.js" defer></script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- TOTAL PARISHES, COORDINATORS -->
            <div class="card mt-3">
                <?php foreach ($parishcoorCount as $count): ?>
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <h1 class="text-danger"><?php echo $count['PARISHES']; ?></h1>
                                    <p class="text-muted">Total Parishes</p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <h1 class="text-danger"><?php echo $count['COORDINATOR']; ?></h1>
                                    <p class="text-muted">Total Coordinators</p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="d-flex flex-row justify-content-center align-items-center">
                                    <a href="/admin_directory" class="btn btn-outline-primary">Click to see details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>


            <!-- Registered Volunteers Per Parish -->
            <div class="card mt-3">
                <div class="card-body">
                    <div
                        class="d-flex flex-md-row flex-column justify-content-between align-items-md-center align-items-start gap-md-5 gap-1">
                        <h5>Registered Volunteers Per Parish</h5>
                        <div class="d-flex flex-row justify-content-center align-items-center gap-3">
                            <div>
                                <input type="search" name="search" id="search" class="form-control"
                                    placeholder="Search here...">
                            </div>

                            <div>
                                <button class="btn btn-outline-secondary" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#listOfVolunteers" aria-expanded="false"
                                    aria-controls="listOfVolunteers"><i class="bi bi-filter me-2"></i>Filter</button>
                            </div>
                        </div>

                    </div>

                    <div class="collapse" id="listOfVolunteers">
                        <div class="row mt-3" id="filterDivVol">
                            <div class="col-sm-3 mb-2">
                                <select class="form-select group2-dropdown" name="city" id="city">
                                    <option value="" disabled selected>Select Municipality</option>
                                    <?php foreach ($dropdownData['cities'] as $city): ?>
                                        <option value="<?php echo $city['city'] ?? ' '; ?>">
                                            <?php echo $city['city'] ?? 'No cities available'; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-sm-3 mb-2">
                                <select class="form-select group2-dropdown" name="district" id="district">
                                    <option value="" disabled selected>Select District</option>
                                    <?php foreach ($dropdownData['districts'] as $district): ?>
                                        <option value="<?php echo $district['district'] ?? ' '; ?>">
                                            <?php echo $district['district'] ?? 'No districts available'; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-sm-3 mb-2">
                                <select class="form-select group2-dropdown" name="barangay" id="barangay">
                                    <option value="" disabled selected>Select Barangay</option>
                                    <?php foreach ($dropdownData['barangays'] as $barangay): ?>
                                        <option value="<?php echo $barangay['barangay'] ?? ' '; ?>">
                                            <?php echo $barangay['barangay'] ?? 'No barangays available'; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-sm-3 mb-2">
                                <select class="form-select group2-dropdown" name="parish" id="parish">
                                    <option value="" disabled selected>Select Parish</option>
                                    <?php foreach ($dropdownData['parishes'] as $parish): ?>
                                        <option value="<?php echo $parish['parish'] ?? ' '; ?>">
                                            <?php echo $parish['parish'] ?? 'No parishes available'; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-sm-3 mb-2">
                                <select class="form-select group2-dropdown" name="school" id="school">
                                    <option value="" disabled selected>Select School</option>
                                    <?php foreach ($dropdownData['pollingPlaces'] as $polling_place): ?>
                                        <option value="<?php echo $polling_place['polling_place'] ?? ' '; ?>">
                                            <?php echo $polling_place['polling_place'] ?? 'No cities available'; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <script>
                                var cities = <?= json_encode($dropdownData['cities']); ?>;
                                var districts = <?= json_encode($dropdownData['districts']); ?>;
                                var barangays = <?= json_encode($dropdownData['barangays']); ?>;
                                var parishes = <?= json_encode($dropdownData['parishes']); ?>;
                                var pollingPlaces = <?= json_encode($dropdownData['pollingPlaces']); ?>;
                            </script>

                            <!-- Link to your external JS file -->
                            <script src="../js/dropdown.js"></script>


                        </div>
                    </div>




                    <!--TABLE-->

                    <div class="table-responsive my-3">
                        <table id="volunteerTable" class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Membership ID</th>
                                    <th scope="col">Volunteer Name</th>
                                    <th scope="col">Volunteer Precinct</th>
                                    <th scope="col">Volunteer Role</th>
                                    <th scope="col">Parish Coordinator</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tbody>
                                <?php if (!empty($volunteerPerParish)): ?>
                                    <?php foreach ($volunteerPerParish as $volunteer): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($volunteer['VOLUNTEERS_ID']); ?></td>
                                            <td><?= htmlspecialchars($volunteer['VOLUNTEERS_NAME']); ?></td>
                                            <td><?= htmlspecialchars($volunteer['PRECINCT_NO']); ?></td>
                                            <td><?= htmlspecialchars($volunteer['ROLE']); ?></td>
                                            <td><?= htmlspecialchars($volunteer['CPROFILE_NAME']); ?></td>
                                            <td>
                                                <a
                                                    href="view.php?id=<?= htmlspecialchars($volunteer['VOLUNTEERS_ID']); ?>">View</a>
                                                |
                                                <a
                                                    href="delete.php?id=<?= htmlspecialchars($volunteer['VOLUNTEERS_ID']); ?>">Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="6"><span class="text-danger">No volunteers found.</span></td>
                                    </tr>
                                <?php endif; ?>

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