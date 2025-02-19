<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coordinator | Volunteer Management</title>
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

        <div class="d-flex flex-column flex-lg-row justify-content-between align-items-center mb-5">
            <div class="mb-3 mb-lg-0">
                <h4 class="text-uppercase fw-bold">Volunteer Directory by Parish</h4>
            </div>

            <div class="d-flex flex-row gap-2 align-items-center">
                <div class="input-group">
                    <span class="input-group-text" id="search-icon"><i class="bi bi-search"></i></span>
                    <input type="search" class="form-control" name="search" id="search" placeholder="Search here..."
                        aria-label="search" aria-describedby="search-icon">
                </div>
                <button type="button" class="btn btn-sm btn-outline-secondary d-flex align-items-center">
                    <i class="bi bi-filter me-2"></i>Filter
                </button>
            </div>
        </div>


        <p class="text-muted">You currently have access to this Directory:</p>

        <!--PARISH-->
        <div class="row mb-3">

            <?php if ($Citylinks): ?>
                <?php foreach ($Citylinks as $cities): ?>
                    <div class="col-md-4 mb-3">
                        <!--HYPERLINK-->
                        <a class="btn border bg-light border-primary" href="<?php echo $cities['link']; ?>" role="button">
                            <div class="d-flex flex-xl-row flex-md-column flex-sm-row justify-content-center align-items-center gap-2">
                                <div class="image-container">
                                    <img src="../img/icons8-announcement-90.png" alt="Parish Logo" class="img-fluid">
                                </div>

                                <div class="parish-name text-center">
                                    <h4><?php echo  $cities['name']; ?></h4>
                                </div>
                            </div>
                            <div class="row mt-4 justify-content-center">
                                <div class="col">
                                    <div class="d-flex flex-column">
                                        <h5 class="text-primary">150</h5>
                                        <p>Registered Volunteers</p>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex flex-column">
                                        <h5 class="text-primary">150</h5>
                                        <p>Assigned Volunteers</p>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex flex-column">
                                        <h5 class="text-primary">150</h5>
                                        <p>Unassigned Volunteers</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach ?>
            <?php else: ?>
                <div class="parish-name text-center">
                    <h4> No Cities found!</h4>
                </div>
            <?php endif; ?>
        </div>

        <!--TABLE-->

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">List of Parishes</th>
                        <th scope="col">Vicariate</th>
                        <th scope="col">City / District</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($parishes)): ?>
                        <?php foreach ($parishes as $parish): ?>
                            <tr class="">
                                <td scope="row"><?php echo $parish['PARISH_NAME']; ?></td>
                                <td><?php echo $parish['VICARIATE']; ?></td>
                                <td><?php echo $parish['DISTRICT']; ?></td>
                                <td><button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#requestAccessModal">Request Access</button></td>
                            </tr>
                        <?php endforeach ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">No parishes found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <!--MODAL - REQUEST ACCESS?-->
            <div class="modal fade" id="requestAccessModal" tabindex="-1"
                aria-labelledby="requestAccessModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                        </div>
                        <div class="modal-body">
                            <div class="d-flex flex-column justify-content-center align-items-center gap-3">
                                <img src="../img/icons8-announcement-90.png" alt="Modal Logo" class="img-fluid">
                                <h5 class="text-center">Do you wish to request to this file?</h5>

                                <div class="d-flex flex-row justify-content-center align-items-center gap-3">
                                    <button type="button" class="btn btn-outline-secondary px-4" data-bs-dismiss="modal">No</button>
                                    <button type="button" class="btn btn-primary px-5" data-bs-toggle="modal" data-bs-target="#requestSuccessModal">Yes</button>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>
            </div>

            <!--MODAL - REQUEST SUCCESS-->
            <div class="modal fade" id="requestSuccessModal" tabindex="-1"
                aria-labelledby="requestSuccessModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                        </div>
                        <div class="modal-body">
                            <div class="d-flex flex-column justify-content-center align-items-center gap-3">
                                <img src="../img/icons8-checkmark-90.png" alt="Modal Logo" class="img-fluid">
                                <p class="text-center">Your request to access the file has been successfully submitted. Please wait for the admin's
                                    approval. You will be notified once your request is processed.</p>

                                <div class="d-flex flex-row justify-content-center align-items-center gap-3">
                                    <button type="button" class="btn btn-primary px-5" data-bs-dismiss="modal">OK</button>
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