<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Achievements</title>
    <link rel="stylesheet" href="../css/admin_dashboard.css">
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
    include('includes/admin_sidebar.php');
    ?>


    <!--MAIN CONTENT-->
    <main class="container-fluid p-3">

        <div class="container-fluid">
            <h4>My Achievements</h4>

            <ul class="nav nav-pills nav-fill px-5 mt-5 gap-5">
                <li class="nav-item">
                    <button class="nav-link" id="pills-badges-tab" data-bs-toggle="pill" data-bs-target="#pills-badges" type="button" role="tab" aria-controls="pills-badges" aria-selected="true">Volunteers</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link active" id="pills-certificates-tab" data-bs-toggle="pill" data-bs-target="#pills-certificates" type="button" role="tab" aria-controls="pills-certificates" aria-selected="true">My Achievements</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" id="pills-goals-tab" data-bs-toggle="pill" data-bs-target="#pills-goals" type="button" role="tab" aria-controls="pills-goals" aria-selected="true">Uploaded File</button>
                </li>
            </ul>

            <div class="tab-content" id="pills-tabContent">

                <!--BADGES-->
                <div class="tab-pane fade" id="pills-badges" role="tabpanel" aria-labelledby="pills-badges-tab" tabindex="0">

                </div>


                <!--ACHIEVEMENTS-->
                <div class="tab-pane fade show active" id="pills-certificates" role="tabpanel" aria-labelledby="pills-certificates-tab" tabindex="0">


                    <div class="container-fluid mt-5">

                        <div class="row">

                            <div class="col-12 col-md-12 col-lg-6 col-xl-4 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="container-fluid d-flex flex-column justify-content-center align-items-center gap-1">
                                            <h5>Years of Service: 2</h5>
                                            <span>Since 2021</span>
                                            <img src="../img/BRONZE BADGE.png" alt="Bronze Badge" class="img-fluid">
                                            <h4>CONGRATULATIONS</h4>
                                            <p>Consistently volunteered in at least two election cycles.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!--ACHIEVEMENT YOU CAN UNLOCK-->
                            <div class="col-12 col-md-12 col-lg-6 col-xl-4 mb-3">

                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="container-fluid">

                                            <h5>Achievements you can unlock...</h5>

                                            <div class="d-flex flex-column flex-lg-row justify-content-center align-items-center gap-3">

                                                <div>
                                                    <img src="../img/GOLD BADGE.png" alt="Gold Badge" class="img-fluid">
                                                    <p>Consistently volunteered in at least two election cycles.</p>
                                                </div>
                                                <div>
                                                    <img src="../img/PLATINUM BADGE.png" alt="Platinum Badge" class="img-fluid">
                                                    <p>Contribute to five or more election cycles.</p>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!--ALL ACHIEVEMENTS-->
                                <div class="card">
                                    <div class="card-body">
                                        <div class="container-fluid mb-3">

                                            <h5 class="mb-3">All Achievements</h5>

                                            <div class="d-flex flex-column justify-content-center align-items-center gap-3">

                                                <div class="border w-100 p-2 rounded">
                                                    <span>Achievement 'yarn.</span>
                                                </div>
                                                <div class="border w-100 p-2 rounded">
                                                    <span>Achievement 'yarn.</span>
                                                </div>
                                                <div class="border w-100 p-2 rounded">
                                                    <span>Achievement 'yarn.</span>
                                                </div>
                                                <div class="border w-100 p-2 rounded">
                                                    <span>Achievement 'yarn.</span>
                                                </div>
                                                <div class="border w-100 p-2 rounded">
                                                    <span>Achievement 'yarn.</span>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>



                            <!--TIMELINE-->
                            <div class="col-12 col-md-12 col-lg-6 col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <section class="container-fluid mb-3">
                                            <ul class="timeline-with-icons">
                                                <li class="timeline-item mb-5">
                                                    <span class="timeline-year">
                                                        2022
                                                    </span>

                                                    <div class="timeline-content">
                                                        <h5 class="fw-bold">Poll Watcher</h5>
                                                        <p class="text-muted">
                                                            Maligaya Elementary School
                                                        </p>
                                                    </div>
                                                </li>
                                                <li class="timeline-item mb-5">
                                                    <span class="timeline-year">
                                                        2022
                                                    </span>

                                                    <div class="timeline-content">
                                                        <h5 class="fw-bold">Poll Watcher</h5>
                                                        <p class="text-muted">
                                                            Maligaya Elementary School
                                                        </p>
                                                    </div>
                                                </li>
                                                <li class="timeline-item mb-5">
                                                    <span class="timeline-year">
                                                        2022
                                                    </span>

                                                    <div class="timeline-content">
                                                        <h5 class="fw-bold">Poll Watcher</h5>
                                                        <p class="text-muted">
                                                            Maligaya Elementary School
                                                        </p>
                                                    </div>
                                                </li>
                                                <li class="timeline-item mb-5">
                                                    <span class="timeline-year">
                                                        2022
                                                    </span>

                                                    <div class="timeline-content">
                                                        <h5 class="fw-bold">Poll Watcher</h5>
                                                        <p class="text-muted">
                                                            Maligaya Elementary School
                                                        </p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!--GOALS-->
                <div class="tab-pane fade" id="pills-goals" role="tabpanel" aria-labelledby="pills-goals-tab" tabindex="0">

                    <div class="card mt-5">
                        <div class="card-body">
                            <div class="container-fluid">
                                <div class="row mb-5">
                                    <div class="col-md-4">
                                        <div class="progress-text">
                                            <h6>Progress <!--Count: 5/5--></h6>
                                        </div>
                                        <div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar" style="width: 1%">25%</div>
                                        </div>
                                    </div>
                                </div>

                                <h6 class="mb-3">On going goals</h6>

                                <div class="row">
                                    <div class="col-md-8 p-3 border">

                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore sunt eligendi eveniet illum obcaecati ipsa deserunt laudantium ab reprehenderit in.</p>
                                    </div>
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


    <!--BOOTSTRAP JS CDN LINK-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>