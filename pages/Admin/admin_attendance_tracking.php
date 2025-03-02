<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Attendance Tracking</title>
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

        <div>
            <h4>Attendance Tracking</h4>
        </div>



        <!-- CARD: TOTAL VOLUNTEERS, TOTAL PRESENT AND ABSENT -->
        <section class="row mt-5">

            <!-- TOTAL VOLUNTEERS -->
            <article class="col-lg-4 col-sm-6 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row justify-content-start align-items-end">
                            <div><i class="bi bi-person-fill text-primary fs-1"></i></div>
                            <div class="d-flex flex-column justify-content-center align-items-center gap-2">
                                <h5 class="text-center text-primary">Total number of Volunteers</h5>
                                <h1 class="text-danger fw-bold">250</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </article>

            <!-- TOTAL PRESENT VOLUNTEERS -->
            <article class="col-lg-4 col-sm-6 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row justify-content-start align-items-end">
                            <div><i class="bi bi-person-fill-check text-primary fs-1"></i></div>
                            <div class="d-flex flex-column justify-content-center align-items-center gap-2">
                                <h5 class="text-center text-primary">Total number of Present</h5>
                                <h1 class="text-danger fw-bold">250</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </article>

            <!-- TOTAL ABSENT VOLUNTEERS -->
            <article class="col-lg-4 col-sm-6 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row justify-content-start align-items-end">
                            <div><i class="bi bi-person-fill-x text-primary fs-1"></i></div>
                            <div class="d-flex flex-column justify-content-center align-items-center gap-2">
                                <h5 class="text-center text-primary">Total number of Absent</h5>
                                <h1 class="text-danger fw-bold">250</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </article>

        </section>


        <!-- FILTER BUTTON AND SEARCH BAR -->
        <section class="d-flex justify-content-end align-items-center gap-2 mt-3 mb-5">
            
            <div class="input-group" style="width: 500px;">
                <span class="input-group-text" id="basic-addon1">
                    <i class="bi bi-search"></i>
                </span>
                <input type="search" class="form-control" placeholder="Search name or email">
            </div>
            <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#filterModal">
                <i class="bi bi-filter me-2"></i>Filter
            </button>
        </section>


        <!-- MODAL FOR FILTER -->
        <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h4 class="text-center text-primary">Filter</h4>

                        <!--FORM-->
                        <div class="container mt-2">
                            <p class="text-muted text-center mb-5">To filter results, simply select your preferred criteria from the available options and click "Apply" to view the filtered items.</p>


                            <div class="row mb-3">
                                <label for="filterCity" class="col-sm-2 col-form-label">City:</label>
                                <div class="col-sm-10">
                                    <select id="filterCity" class="form-select">
                                        <option selected>Select City</option>
                                        <option>...</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="filterVicariate" class="col-sm-2 col-form-label">Vicariate:</label>
                                <div class="col-sm-10">
                                    <select id="filterVicariate" class="form-select">
                                        <option selected>Select Vicariate</option>
                                        <option>...</option>
                                    </select>
                                </div>
                            </div>


                            <div class="modal-footer">
                                <button type="button" class="btn mb-2">Reset</button>
                                <button type="submit" class="btn btn-primary px-4">Apply</button>
                            </div>


                        </div>

                    </div>

                </div>
            </div>
        </div>

        <!-- TABLE -->
        <div class="table-responsive">
            <table id="volunteersTable" class="table align-middle">
                <thead class="table-primary align-middle">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">List of Parishes</th>
                        <th scope="col">Total number of Assigned Volunteers</th>
                        <th scope="col">Total number of Present Volunteers</th>
                        <th scope="col">Total number of Absent Volunteers</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>

                        <td>1</td>
                        <td>Parish</td>
                        <td>200</td>
                        <td>150</td>
                        <td>50</td>
                        <td><a href="/precincts" class="btn btn-outline-primary">View</a></td>
                    </tr>
            </table>
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