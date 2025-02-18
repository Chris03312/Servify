<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Caloocan Directory</title>
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
                <h4><?php echo $_GET['City']; ?> DIRECTORY</h4>
            </div>

            <div class="d-flex flex-row gap-2">
                <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal"
                    data-bs-target="#addNewParishModal"><i class="bi bi-plus me-2"></i>Add New Parish</button>
                <button type="button" class="btn btn-sm btn-outline-secondary"><i
                        class="bi bi-filter me-2"></i>Filter</button>
            </div>
        </div>

        <!-- MODAL: ADD NEW PARISH -->
        <div class="modal fade" id="addNewParishModal" tabindex="-1" aria-labelledby="addNewParishModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h4 class="text-center text-primary">Add New Parish</h4>

                        <!--FORM-->
                        <div class="container mt-2">
                            <p class="text-muted text-center mb-5">Add new parish by filling out the required details.
                            </p>

                            <form id="registrationForm" class="row" action="" method="POST">

                                <div class="col-12 mb-2">
                                    <label for="parishName" class="form-label">Parish Name</label>
                                    <input type="text" class="form-control" id="parishName" name="parishName">
                                </div>
                                <div class="col-12 mb-2">
                                    <label for="vicariate" class="form-label">Vicariate</label>
                                    <input type="text" class="form-control" id="vicariate" name="vicariate">
                                </div>
                                <div class="col-12 mb-2">
                                    <label for="district" class="form-label">District</label>
                                    <input type="text" class="form-control" id="district" name="district">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="coordinatorName" class="form-label">Coordinator Name</label>
                                    <input type="text" class="form-control" id="coordinatorName" name="coordinatorName">
                                </div>



                                <div class="modal-footer">
                                    <button type="button" class="btn px-4 mb-2" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Register</button>
                                </div>

                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>





        <!-- Breadcrumb -->
        <div class="mt-3">

            <nav aria-label="breadcrumb" class="mb-5" style="--bs-breadcrumb-divider: '>';">
                <ol class="breadcrumb" id="breadcrumbList">
                    <li class="breadcrumb-item">
                        <a href="/admin_directory">Cities Directory</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $_GET['City']; ?></li>
                </ol>
            </nav>

            <!-- TABLE -->


            <!-- TABLE -->
            <div class="table-responsive">
                <table id="coordinatorsTable" class="table">
                    <caption class="caption-top text-primary">List of Parishes</caption>
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Parish Name</th>
                            <th scope="col">Vicariate</th>
                            <th scope="col">District</th>
                            <th scope="col">Name of Coordinator</th>
                            <th scope="col">Precinct</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tbody>
                        <?php if (!empty($listofparish)): ?>
                            <?php foreach ($listofparish as $list): ?>
                                <tr>
                                    <td><?php echo $list['PARISHES_ID']; ?></td>
                                    <td><?php echo $list['PARISH_NAME']; ?></td>
                                    <td><?php echo $list['VICARIATE']; ?></td>
                                    <td><?php echo $list['DISTRICT']; ?></td>
                                    <td><?php echo $list['CNAME']; ?></td>
                                    <td><?php echo $list['PRECINCT']; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-sm text-primary"><i
                                                class="bi bi-eye me-2"></i>View</button>
                                        <button type="button" class="btn btn-sm text-primary" data-bs-toggle="modal"
                                            data-bs-target="#editParishModal"><i class="bi bi-pen me-2"></i>Edit</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <td> NO PARISH AVAILABLE </td>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- MODAL: EDIT PARISH -->
        <div class="modal fade" id="editParishModal" tabindex="-1" aria-labelledby="editParishModallabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h4 class="text-center text-primary">Edit Parish Details</h4>

                        <!--FORM-->
                        <div class="container mt-2">
                            <p class="text-muted text-center mb-5">Edit parish by filling out the required details.</p>

                            <form id="registrationForm" class="row" action="" method="POST">

                                <div class="col-12 mb-2">
                                    <label for="parishName" class="form-label">Parish Name</label>
                                    <input type="text" class="form-control" id="parishName" name="parishName">
                                </div>
                                <div class="col-12 mb-2">
                                    <label for="vicariate" class="form-label">Vicariate</label>
                                    <input type="text" class="form-control" id="vicariate" name="vicariate">
                                </div>
                                <div class="col-12 mb-2">
                                    <label for="district" class="form-label">District</label>
                                    <input type="text" class="form-control" id="district" name="district">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="coordinatorName" class="form-label">Coordinator Name</label>
                                    <input type="text" class="form-control" id="coordinatorName" name="coordinatorName">
                                </div>



                                <div class="modal-footer">
                                    <button type="button" class="btn px-4 mb-2" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>

                            </form>
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