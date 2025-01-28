<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coordinator | Polling Area</title>
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
                <h4>BARANGAY VOLUNTEER DIRECTORY</h4>
            </div>
        


        <div class="mt-3">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="mb-5" style="--bs-breadcrumb-divider: '>';">
                <ol class="breadcrumb" id="breadcrumbList">
                    <li class="breadcrumb-item">
                        <a href="coordinator_volunteer_management.php">Volunteer Management</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="barangay_volunteer_directory.php">List of Barangay</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Polling Area</li>
                </ol>
            </nav>

            <!-- Main Content -->
            <div class="d-flex flex-row justify-content-between align-items-center mb-3">
                <div class="d-flex flex-row justify-content-center align-items-center gap-2">
                    <h5>Polling Area</h5>
                    <sup class="text-muted">33</sup>
                </div>

                <div class="d-flex flex-row justify-content-center align-items-center gap-3">
                    <input type="search" class="form-control" name="search" id="search" placeholder="Search here">

                    <button type="button" class="btn btn-outline-secondary px-4">Filter</button>
                    <button type="button" class="btn btn-primary px-4" data-bs-toggle="modal" data-bs-target="#addPollingAreaModal">New</button>
                </div>
            </div>


            <!--TABLE-->

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">List of Polling Area</th>
                            <th scope="col">Manage by</th>
                            <th scope="col">Status of volunteers</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr data-url="list_of_volunteers.php">
                            <td scope="row">Camarin High School</td>
                            <td>San Bartolome Parish</td>
                            <td>In progress</td>
                            <td><button type="button" class="btn text-danger delete-btn">Delete</button></td>
                        </tr>
                    </tbody>
                </table>

                <!--MODAL - ADD POLLING AREA-->
                <div class="modal fade" id="addPollingAreaModal" tabindex="-1"
                    aria-labelledby="addPollingAreaModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                            </div>
                            <div class="modal-body">
                                <div class="d-flex flex-column justify-content-center align-items-center gap-3">
                                    <img src="../img/icons8-announcement-90.png" alt="Modal Logo" class="img-fluid">
                                    <h5 class="text-center">Do you wish to add polling area?</h5>

                                    <div class="d-flex flex-row justify-content-center align-items-center gap-3">
                                        <button type="button" class="btn btn-outline-secondary px-4" data-bs-dismiss="modal">No</button>
                                        <button type="button" class="btn btn-primary px-5" data-bs-toggle="modal" data-bs-target="#requestSuccessModal">Yes</button>
                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>

                <!--MODAL - REQUEST ACCESS?-->
                <div class="modal fade" id="requestSuccessModal" tabindex="-1"
                    aria-labelledby="requestSuccessModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                            </div>
                            <div class="modal-body">
                                <div class="d-flex flex-column justify-content-center align-items-center gap-3">
                                    <img src="../img/icons8-checkmark-90.png" alt="Modal Logo" class="img-fluid">
                                    <p class="text-center">Your request to add Polling Area to the list has been successfully submitted.
                                        Please wait for the admin's approval. You will be notified once your request is processed.</p>

                                    <div class="d-flex flex-row justify-content-center align-items-center gap-3">
                                        <button type="button" class="btn btn-primary px-5" data-bs-dismiss="modal">OK</button>
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


    <!--SCRIPT FOR CLICKING TABLE CELL-->
    <script>
        document.querySelectorAll("table tbody tr").forEach(row => {
            row.addEventListener("click", function(event) {
                // Check if the clicked target is not the delete button
                if (!event.target.classList.contains("delete-btn")) {
                    // Redirect to the URL stored in the data-url attribute
                    window.location.href = this.dataset.url;
                }
            });
        });
    </script>









    <!--BOOTSTRAP JS CDN LINK-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>