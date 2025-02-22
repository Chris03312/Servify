<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coordinator | Barangay Volunteer Directory</title>
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
            <div>
                <h4><?php echo strtoupper($district); ?> VOLUNTEER DIRECTORY</h4>
            </div>


            <div class="d-flex flex-row gap-2 align-items-center">
                <div class="input-group">
                    <span class="input-group-text" id="search-icon"><i class="bi bi-search"></i></span>
                    <input type="search" class="form-control" name="search" id="search" placeholder="Search here..."
                        aria-label="search" aria-describedby="search-icon">
                </div>
                <button type="button" class="btn btn-primary px-4" data-bs-toggle="modal" data-bs-target="#addNewBrgyModal">New</button>
            </div>
        </div>

        <!--MODAL - ADD NEW BRGY-->
        <div class="modal fade" id="addNewBrgyModal" tabindex="-1"
            aria-labelledby="addNewBrgyModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                    </div>
                    <div class="modal-body">
                        <div class="d-flex flex-column justify-content-center align-items-center gap-3">
                            <img src="../img/icons8-announcement-90.png" alt="Modal Logo" class="img-fluid">
                            <h5 class="text-center">Do you wish to add barangay?</h5>

                            <div class="d-flex flex-row justify-content-center align-items-center gap-3">
                                <button type="button" class="btn btn-outline-secondary px-4" data-bs-dismiss="modal">No</button>
                                <button type="button" class="btn btn-primary px-5" data-bs-toggle="modal" data-bs-target="#requestSuccessModal">Yes</button>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>

        <!--MODAL - ADD NEW BRGY REQUEST SUCCESS-->
        <div class="modal fade" id="requestSuccessModal" tabindex="-1"
            aria-labelledby="requestSuccessModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                    </div>
                    <div class="modal-body">
                        <div class="d-flex flex-column justify-content-center align-items-center gap-3">
                            <img src="../img/icons8-checkmark-90.png" alt="Modal Logo" class="img-fluid">
                            <p class="text-center">Your request to add barangay to the list has been successfully submitted. Please wait for the admin's approval.
                                You will be notified once your request is processed.</p>

                            <div class="d-flex flex-row justify-content-center align-items-center gap-3">
                                <button type="button" class="btn btn-primary px-5" data-bs-dismiss="modal">OK</button>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>


        <div class="mt-5">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="mb-4" style="--bs-breadcrumb-divider: '>';">
                <ol class="breadcrumb" id="breadcrumbList">
                    <li class="breadcrumb-item">
                        <a href="/coordinator_volunteer_management">Volunteer Management</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="/district_volunteer_directory<?php echo $districturl; ?>">List of District</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">List of Barangay</li>
                </ol>
            </nav>

            <!-- Main Content -->
            <h5>Folders</h5>

            <div class="row">
                <div class="col-md-3 mb-2">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex flex-row justify-content-between align-items-start">
                                <a href="archived.php" class="btn border-0 archiveLink" data-url="archived.php" role="button">
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

                <?php if ($barangayLinks): ?>
                    <?php foreach ($barangayLinks as $barangay): ?>
                        <div class="col-md-3 mb-2">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="d-flex flex-row justify-content-between align-items-start">
                                        <a href="<?php echo $barangay['link']; ?>" class="btn border-0" role="button">
                                            <div class="d-flex flex-column justify-content-center align-items-start gap-2">
                                                <i class="fa-solid fa-folder-closed text-primary fs-1"></i>
                                                <span><?php echo $barangay['name']; ?></span>
                                            </div>
                                        </a>
                                        <div>
                                            <button type="button" class="btn py-0 px-1"><i class="fa-solid fa-ellipsis-vertical text-primary"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="alert alert-info">
                        No barangay directory available for the selected district.
                    </div>
                <?php endif; ?>

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