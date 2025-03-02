<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coordinator | List of Volunteers</title>
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
    <main class="container-fluid p-5">

        <div class="d-flex flex-column flex-lg-row justify-content-between align-items-center">
            <h4><?php echo strtoupper($pollingplace); ?> VOLUNTEER DIRECTORY</h4>
        </div>

        <div class="mt-3">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="mb-5" style="--bs-breadcrumb-divider: '>';">
                <ol class="breadcrumb" id="breadcrumbList">
                    <li class="breadcrumb-item">
                        <a href="/coordinator_volunteer_management">Volunteer Management</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="/polling_area<?php echo $districturl; ?>">List of District</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="/barangay_volunteer_directory<?php echo $barangayurl; ?>">List of Barangay</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="/polling_area<?php echo $pollingplaceurl; ?>">Polling Area</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Name of School</li>
                </ol>
            </nav>

            <!-- Main Content -->
            <div class="row mb-3">
                <div class="col-md-3 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <div
                                class="d-flex flex-xl-row flex-md-column flex-sm-row justify-content-center align-items-center gap-2">
                                <div class="image-container">
                                    <img src="../img/icons8-announcement-90.png" alt="Parish Logo" class="img-fluid">
                                </div>

                                <div>
                                    <p class="text-center"><strong>Accountable Material Verifiable Audit Trail Team
                                            (AMVATT)</strong></p>
                                </div>
                            </div>

                            <div class="row mt-4 justify-content-center">
                                <div class="col">
                                    <div class="d-flex flex-column text-center">
                                        <h5 class="text-primary">0</h5>
                                        <p>Total Volunteers</p>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex flex-column text-center">
                                        <h5 class="text-danger">150</h5>
                                        <p>Needed Volunteers</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-3 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <div
                                class="d-flex flex-xl-row flex-md-column flex-sm-row justify-content-center align-items-center gap-2">
                                <div class="image-container">
                                    <img src="../img/icons8-announcement-90.png" alt="Parish Logo" class="img-fluid">
                                </div>

                                <div>
                                    <p class="text-center"><strong>Accountable Material Verifiable Audit Trail Team
                                            (AMVATT)</strong></p>
                                </div>
                            </div>

                            <div class="row mt-4 justify-content-center">
                                <div class="col">
                                    <div class="d-flex flex-column text-center">
                                        <h5 class="text-primary">0</h5>
                                        <p>Total Volunteers</p>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex flex-column text-center">
                                        <h5 class="text-danger">150</h5>
                                        <p>Needed Volunteers</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-3 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <div
                                class="d-flex flex-xl-row flex-md-column flex-sm-row justify-content-center align-items-center gap-2">
                                <div class="image-container">
                                    <img src="../img/icons8-announcement-90.png" alt="Parish Logo" class="img-fluid">
                                </div>

                                <div>
                                    <p class="text-center"><strong>Accountable Material Verifiable Audit Trail Team
                                            (AMVATT)</strong></p>
                                </div>
                            </div>

                            <div class="row mt-4 justify-content-center">
                                <div class="col">
                                    <div class="d-flex flex-column text-center">
                                        <h5 class="text-primary">0</h5>
                                        <p>150</p>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex flex-column text-center">
                                        <h5 class="text-danger">150</h5>
                                        <p>Needed Volunteers</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-3 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <div
                                class="d-flex flex-xl-row flex-md-column flex-sm-row justify-content-center align-items-center gap-2">
                                <div class="image-container">
                                    <img src="../img/icons8-announcement-90.png" alt="Parish Logo" class="img-fluid">
                                </div>

                                <div>
                                    <p class="text-center"><strong>Accountable Material Verifiable Audit Trail Team
                                            (AMVATT)</strong></p>
                                </div>
                            </div>

                            <div class="row mt-4 justify-content-center">
                                <div class="col">
                                    <div class="d-flex flex-column text-center">
                                        <h5 class="text-primary">0</h5>
                                        <p>Total Volunteers</p>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex flex-column text-center">
                                        <h5 class="text-danger">150</h5>
                                        <p>Needed Volunteers</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!--VOLUNTEER DIRECTORY-->

            <div class="d-flex flex-row justify-content-between align-items-center mb-3">
                <div class="d-flex flex-row justify-content-center align-items-center gap-2">
                    <h5>Volunteers</h5>
                    <sup class="text-muted">33</sup>
                </div>

                <div class="d-flex flex-row justify-content-center align-items-center gap-3">
                    <input type="search" class="form-control" name="search" id="search" placeholder="Search here">

                    <div class="dropdown">
                        <a class="btn" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Filter
                        </a>

                        <ul class="dropdown-menu">
                            <li><button type="button" class="dropdown-item">by role</button></li>
                            <li><button type="button" class="dropdown-item">by parish coordinator</button></li>
                        </ul>
                    </div>
                    <button type="button" class="btn btn-primary px-4">New</button>
                </div>
            </div>


            <!--TABLE-->

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">Precinct #</th>
                            <th scope="col">Name</th>
                            <th scope="col">Role</th>
                            <th scope="col">Parish Coordinator</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr data-url="">
                            <td scope="row">#</td>
                            <td>Name</td>
                            <td>Role</td>
                            <td>Parish Coordinator</td>
                            <td><button type="button" class="btn text-danger delete-btn">Delete</button></td>
                        </tr>
                    </tbody>
                </table>

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