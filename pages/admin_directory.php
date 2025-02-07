<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Directory</title>
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
</head>

<body>

    <?php
    include('includes/admin_sidebar.php');
    ?>


    <!--MAIN CONTENT-->
    <main class="container-fluid p-5">

        <div class="d-flex flex-column flex-lg-row justify-content-between align-items-center">
            <div>
                <h4>DIRECTORY</h4>
            </div>

            <div class="d-flex flex-row">
                <button type="button" class="btn btn-primary px-4" data-bs-toggle="modal" data-bs-target="#addNewBrgyModal"><i class="bi bi-plus me-2"></i>Add New Directory</button>
            </div>
        </div>



        <!-- Breadcrumb -->
        <div class="mt-3">

            <nav aria-label="breadcrumb" class="mb-5" style="--bs-breadcrumb-divider: '>';">
                <ol class="breadcrumb" id="breadcrumbList">
                    <li class="breadcrumb-item">
                        <a href="/admin_directory">Cities Directory</a>
                    </li>
                </ol>
            </nav>

            <!-- Main Content - FOLDERS -->
            <div class="row">
                <!-- ARCHIVED -->
                <div class="col-sm-12 col-md-6 col-xl-4 col-xxl-3 mb-2">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex flex-row justify-content-between align-items-start">
                                <a href="#" class="btn border-0 archiveLink" data-url="archived.php" role="button">
                                    <div class="d-flex flex-column justify-content-center align-items-start gap-2">
                                        <i class="fa-solid fa-folder-closed text-primary fs-1"></i>
                                        <span>Archived</span>
                                    </div>
                                </a>

                                <div>
                                    <button type="button" class="btn py-0 px-1"><i class="fa-solid fa-ellipsis-vertical text-primary"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CALOOCAN -->
                <div class="col-sm-12 col-md-6 col-xl-4 col-xxl-3 mb-2">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex flex-row justify-content-between align-items-start">
                                <a href="/caloocan_directory" class="btn border-0 archiveLink" data-url="" role="button">
                                    <div class="d-flex flex-column justify-content-center align-items-start gap-2">
                                        <div class="d-flex flex-row justify-content-center align-items-end gap-3">
                                            <div>
                                                <i class="fa-solid fa-folder-closed text-primary fs-1"></i>
                                            </div>
                                            <div>
                                                <span class="text-danger fs-3 fw-bold">10</span>
                                                <small class="text-muted">Coordinators</small>
                                            </div>
                                        </div>
                                        <span>CALOOCAN</span>
                                    </div>
                                </a>

                                <div>
                                    <button type="button" class="btn py-0 px-1"><i class="fa-solid fa-ellipsis-vertical text-primary"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- MALABON -->
                <div class="col-sm-12 col-md-6 col-xl-4 col-xxl-3 mb-2">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex flex-row justify-content-between align-items-start">
                                <a href="" class="btn border-0 archiveLink" data-url="" role="button">
                                    <div class="d-flex flex-column justify-content-center align-items-start gap-2">
                                        <div class="d-flex flex-row justify-content-center align-items-end gap-3">
                                            <div>
                                                <i class="fa-solid fa-folder-closed text-primary fs-1"></i>
                                            </div>
                                            <div>
                                                <span class="text-danger fs-3 fw-bold">10</span>
                                                <small class="text-muted">Coordinators</small>
                                            </div>
                                        </div>
                                        <span>MALABON</span>
                                    </div>
                                </a>

                                <div>
                                    <button type="button" class="btn py-0 px-1"><i class="fa-solid fa-ellipsis-vertical text-primary"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- NAVOTAS -->
                <div class="col-sm-12 col-md-6 col-xl-4 col-xxl-3 mb-2">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex flex-row justify-content-between align-items-start">
                                <a href="" class="btn border-0 archiveLink" data-url="" role="button">
                                    <div class="d-flex flex-column justify-content-center align-items-start gap-2">
                                        <div class="d-flex flex-row justify-content-center align-items-end gap-3">
                                            <div>
                                                <i class="fa-solid fa-folder-closed text-primary fs-1"></i>
                                            </div>
                                            <div>
                                                <span class="text-danger fs-3 fw-bold">10</span>
                                                <small class="text-muted">Coordinators</small>
                                            </div>
                                        </div>

                                        <span>NAVOTAS</span>
                                    </div>
                                </a>

                                <div>
                                    <button type="button" class="btn py-0 px-1"><i class="fa-solid fa-ellipsis-vertical text-primary"></i></button>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>