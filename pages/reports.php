<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coordinator | Reports</title>
    <link rel="stylesheet" href="../css/coordinator_dashboard.css">
    <link rel="stylesheet" href="../css/volunteer_sidebar.css">

    <!--BOOTSTRAP CSS CDN LINK-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

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

        <h4 class="mb-3">Reports</h4>

        <!--BUTTONS: NAT'L & BRGY ELECTION-->
        <section class="mb-5">
            <button type="button" class="btn btn-sm text-primary">National Election</button>
            <button type="button" class="btn btn-sm text-primary">Barangay Election</button>
        </section>


        <!--NAT'L ELECTION-->
        <section class="mb-3">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-3 text-center">
                            <p class="text-primary">Year</p>
                            <h1 class="text-primary">2025</h1>
                        </div>

                        <div class="col-md-9">
                            <div class="d-flex flex-md-row flex-column gap-5">
                                <div class="text-center">
                                    <p class="text-primary">Total registered volunteers</p>
                                    <h1 class="text-primary">225</h1>
                                </div>
                                <div class="text-center">
                                    <p class="text-primary">New volunteers onboarded</p>
                                    <h1 class="text-primary">225</h1>
                                </div>
                                <div class="text-center">
                                    <p class="text-primary">Total Present</p>
                                    <h1 class="text-primary">225</h1>
                                </div>
                                <div class="text-center">
                                    <p class="text-primary">Total Absent</p>
                                    <h1 class="text-primary">225</h1>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <!--LINE CHART: NUMBER OF VOLUNTEES-->
        <section class="mb-3">
            <div class="card">
                <div class="card-body">
                    <canvas id="volunteersPerYearChart"></canvas>
                </div>
            </div>
        </section>

        <!--FILTER BUTTON-->
        <section class="mb-3">
            <div class="d-flex justify-content-end align-items-center mb-3">
                <label for="filterByYear" class="form-label me-2"><small>Filter by year:</small></label>
                <select class="form-select w-auto" name="filterByYear" id="filterByYear" aria-label="Filter by year">
                    <option selected>Select year</option>
                    <option value="">2020</option>
                    <option value="">2021</option>
                    <option value="">2022</option>
                </select>
            </div>
        </section>


        <!--TABLE: NUMBER OF VOLUNTEERS PER CITY ACROSS YEARS-->
        <section class="mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-3">Number of Volunteers per City across years</h5>

                    <!--TABLE CONTENT-->
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">Year</th>
                                    <th scope="col">Caloocan City</th>
                                    <th scope="col">Malabon City</th>
                                    <th scope="col">Navotas City</th>
                                    <th scope="col">Total Volunteers</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row">2025</td>
                                    <td>20</td>
                                    <td>30</td>
                                    <td>40</td>
                                    <td>100</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </section>

        <!--TABLE: LIST OF VOLUNTEERS-->
        <section class="mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-column d-md-flex justify-content-between align-items-start mb-3">
                        <label for="SelectListOfVolunteers" class="form-label me-2">
                            <h5>List of Volunteers</h5>
                        </label>
                        <select class="form-select form-select-sm w-auto" name="SelectListOfVolunteers" id="SelectListOfVolunteers" aria-label="Filter by year">

                            <option value="All">All</option>
                            <option value="New Volunteers">New Volunteers</option>
                            <option value="Dropped Volunteers">Dropped Volunteers</option>
                            <option value="Reactivated Volunteers">Reactivated Volunteers</option>
                        </select>
                    </div>

                    <!--TABLE CONTENT-->
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead class="table-primary text-nowrap">
                                <tr>
                                    <th scope="col">Year</th>
                                    <th scope="col">Volunteer Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">District/Barangay</th>
                                    <th scope="col">Parish/Coordinator</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Precinct</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Years of Service</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row">2025</td>
                                    <td>Vicmar Guzman</td>
                                    <td>email@gmail.com</td>
                                    <td>District 5/PPP</td>
                                    <td>Xavier Parish/Coordinator Name</td>
                                    <td>Jungler</td>
                                    <td>Police Station 16</td>
                                    <td>Single</td>
                                    <td>2</td>
                                </tr>
                                <tr>
                                    <td scope="row">2025</td>
                                    <td>Vicmar Guzman</td>
                                    <td>email@gmail.com</td>
                                    <td>District 5/PPP</td>
                                    <td>Xavier Parish/Coordinator Name</td>
                                    <td>Jungler</td>
                                    <td>Police Station 16</td>
                                    <td>Single</td>
                                    <td>2</td>
                                </tr>
                                <tr>
                                    <td scope="row">2025</td>
                                    <td>Vicmar Guzman</td>
                                    <td>email@gmail.com</td>
                                    <td>District 5/PPP</td>
                                    <td>Xavier Parish/Coordinator Name</td>
                                    <td>Jungler</td>
                                    <td>Police Station 16</td>
                                    <td>Single</td>
                                    <td>2</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </section>


        <!--AGE GROUPS, GRAPH, ATTENDANCE SUMMARY-->
        <section class="mb-3">
            <div class="row">
                <!--AGE GROUPS-->
                <div class="col-sm-12 col-md-6 col-xl-4 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="mb-3">Age Groups</h5>
                            
                            <div class="d-flex flex-row justify-content-center align-items-center gap-3">
                                <div><span>Age 18-24: </span></div>
                                <div class="progress flex-grow-1" role="progressbar" aria-label="age" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar bg-warning" style="width: 65%"><strong>65%</strong></div>
                                </div>
                            </div>
                            <hr class="text-dark">

                            <div class="d-flex flex-row justify-content-center align-items-center gap-3">
                                <div><span>Age 25-34: </span></div>
                                <div class="progress flex-grow-1" role="progressbar" aria-label="age" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar bg-success" style="width: 45%"><strong>45%</strong></div>
                                </div>
                            </div>
                            <hr class="text-dark">

                            <div class="d-flex flex-row justify-content-center align-items-center gap-3">
                                <div><span>Age 34-44: </span></div>
                                <div class="progress flex-grow-1" role="progressbar" aria-label="age" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar bg-info" style="width: 75%"><strong>75%</strong></div>
                                </div>
                            </div>
                            <hr class="text-dark">

                            <div class="d-flex flex-row justify-content-center align-items-center gap-3">
                                <div><span>Age 45+: </span></div>
                                <div class="progress flex-grow-1" role="progressbar" aria-label="age" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar" style="width: 50%"><strong>50%</strong></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!--GRAPH-->
                <div class="col-sm-12 col-md-6 col-xl-4 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="mb-3">Distribution of volunteers per precinct</h5>
                            <canvas id="distributionOfVolunteersPerPrecinctBarChart"></canvas><!--distribution_of_volunteers_per_precinct_barChart-->
                        </div>
                    </div>
                </div>

                <!--ATTENDANCE SUMMARY-->
                <div class="col-sm-12 col-md-6 col-xl-4 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                        <h5 class="mb-3">Attendance Summary</h5>

                        <div class="card mb-3">
                            <div class="card-body">
                                <h5>Total Present</h5>
                                <h1 class="text-primary">100</h1>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5>Total Absent</h5>
                                <h1 class="text-primary">100</h1>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



    </main>
    </div>
    </div>


    <!--SCRIPT FOR VOLUNTEERS PER YEAR CHART-->
    <script src="../js/volunteers_per_year_chart.js"></script>

    <!--SCRIPT FOR distribution of volunteers per precinct BAR CHART-->
    <script src="../js/distribution_of_volunteers_per_precinct_barChart.js"></script>






    <!--BOOTSTRAP JS CDN LINK-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>