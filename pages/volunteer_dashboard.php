<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer | Volunteer Dashboard</title>
    <link rel="stylesheet" href="../css/volunteer_dashboard.css">
    <link rel="stylesheet" href="../css/volunteer_sidebar.css">

    <!--BOOTSTRAP CSS CDN LINK-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!--BOOTSTRAP CDN ICONS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!--Font awesome CDN ICONS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>


</head>

<body>

    <?php       
    include('includes/volunteer_sidebar.php');
    ?>


    <!--MAIN CONTENT-->
    <main class="container-fluid p-3">

        <!--DASHBOARD BANNER-->
        <div class="dashboardBanner mb-4">
            <p><?php echo $currentDate; ?></p>
            <h4>Welcome back, <?php echo htmlspecialchars($_SESSION['username'] ?? 'Guest'); ?>!</h4>
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
                                        <h2 class="countdown p-2" id="days"><?php echo $days; ?></h2>
                                        <span class="text-danger fw-bold">DAYS</span>
                                    </div>
                                    <div>
                                        <h4></h4>
                                    </div>
                                </div>
                                <div class="col-3 d-flex flex-row justify-content-center align-items-center gap-1">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <h2 class="countdown p-2" id="hours"><?php echo $hours; ?></h2>
                                        <span class="text-danger fw-bold">HRS</span>
                                    </div>
                                    <div>
                                        <h4></h4>
                                    </div>
                                </div>
                                <div class="col-3 d-flex flex-row justify-content-center align-items-center gap-1">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <h2 class="countdown p-2" id="minutes"><?php echo $minutes; ?></h2>
                                        <span class="text-danger fw-bold">MNS</span>
                                    </div>
                                    <div>
                                        <h4></h4>
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
                            <img src="../img/icons8-announcement-90.png" alt="Announcement Icon" class="img-fluid" height="30" width="30">
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
                                <img src="../img/GOLD BADGE.png" alt="Badge" class="img-fluid" height="auto" width="120">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--VOLUNTEER ASSIGNMENT-->
            <div class="row row-cols-1 row-cols-md-2 g-3 mb-4">
                <div class="col-md-8">

                    <!--VOLUNTEER ASSIGNMENT-->
                    <div class="card">
                        <div class="d-flex flex-row justify-content-start align-items-center gap-2 p-2">
                            <img src="../img/icons8-pin-90.png" alt="Announcement Icon" class="img-fluid" height="30" width="30">
                            <h5 class="fw-bold text-primary">Volunteer Assignment</h5>
                        </div>
                        <div class="card-body text-center d-flex flex-column gap-2">
                            <div class="bg-primary p-2 rounded">
                                <h4 class="text-light">You are currently assigned as:</h4>
                            </div>
                            <div>
                                <h2><?php echo htmlspecialchars($userInfo['ASSIGNED_ASSIGNMENT'] ?? " "); ?></h2>
                            </div>
                            <div class="bg-primary p-2 rounded">
                                <h4 class="text-light">Designated at:</h4>
                            </div>
                            <div>
                                <h2><?php echo htmlspecialchars($userInfo['ASSIGNED_POLLING_PLACE'] ?? " "); ?></h3>
                            </div>
                        </div>
                    </div>
                    <!-- MAP PREVIEW -->
                    <div class="card mt-2">
                        <div class="d-flex flex-row justify-content-start align-items-center gap-2 p-2">
                            <img src="../img/icons8-location-90.png" alt="Announcement Icon" class="img-fluid" height="30" width="30">
                            <h5 class="fw-bold text-primary">Map Preview</h5>
                        </div>
                        <div class="card-body text-center d-flex flex-column gap-2">
                            <div class="ratio ratio-16x9 mt-2">
                                <div id="map" class="ratio ratio-16x9 mt-2"></div> <!-- Replace iframe with the Leaflet map -->
                            </div>
                            <script>
                                var latitude = <?php echo isset($location['latitude']) && $location['latitude'] !== '' ? $location['latitude'] : 'null'; ?>;
                                var longitude = <?php echo isset($location['longitude']) && $location['longitude'] !== '' ? $location['longitude'] : 'null'; ?>;
                                var polling = '<?php echo htmlspecialchars($location['assigned_polling_place'] ?? ''); ?>';
                                </script>
                            <script src="js/leafletmap.js"></script>
                        </div>
                    </div>
                </div>

                <!-- RECENT ACTIVITY -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-primary text-light text-center">
                            <h5>Recent Activity</h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <?php if(!empty($activities)): ?>
                                    <?php foreach($activities as $activity): ?>
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

                    <!--My Timeline-->
                    <div class="card mt-2">
                        <div class="card-header bg-primary text-light text-center">
                            <h5>My Timeline</h5>
                        </div>
                        <div class="card-body">

                            <!--TIMELINE CONTENT-->
                            <section class="px-2">
                                <ul class="timeline-with-icons">
                                <?php if(!empty($timelines)): ?>
                                    <?php foreach ($timelines as $timeline): ?>
                                        <li class="timeline-item mb-5">
                                            <span class="timeline-year">
                                                <?php echo $timeline['YEAR'] ?? " "; ?> <!-- Display the extracted year -->
                                            </span>

                                            <div class="timeline-content">
                                                <h5 class="fw-bold"><?php echo $timeline['ASSIGNED_ASSIGNMENT'] ?? " "; ?></h5>
                                                <p class="text-muted">
                                                    <?php echo $timeline['ASSIGNED_POLLING_PLACE'] ?? ""; ?> <!-- Display assigned mission -->
                                                </p>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <p class ="text-center">No Timelines</p>
                                <?php endif; ?>    
                                </ul>
                            </section>

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