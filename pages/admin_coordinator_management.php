<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Coordinator Management</title>
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
    <main class="container p-5">


        <div class="d-flex flex-row justify-content-between align-items-center mb-5">
            <h4>Coordinator Management</h4>
            <!-- BUTTONS -->
            <div>
                <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#registerCoordinatorModal"><i class="bi bi-plus me-2"></i>Register new Coordinator</button>
                <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#filterModal"><i class="bi bi-filter me-2"></i>Filter</button>

            </div>
        </div>

        <!-- MODAL FOR REGISTER NEW COORDINATOR -->
        <div class="modal fade" id="registerCoordinatorModal" tabindex="-1" aria-labelledby="registerCoordinatorModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h4 class="text-center text-primary">Register New Coordinator</h4>

                        <!--FORM-->
                        <div class="container mt-2">
                            <p class="text-muted text-center mb-5">Please fill in the following details to create a new coordinator account.</p>

                            <form id="registrationForm" class="row" action="" method="POST">

                                <div class="col-md-3 mb-2">
                                    <label for="surname" class="form-label">Surname</label>
                                    <input type="text" class="form-control" id="surname" name="surname">
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="firstname" class="form-label">First name</label>
                                    <input type="text" class="form-control" id="firstname" name="firstname">
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="middlename" class="form-label">Middle name</label>
                                    <input type="text" class="form-control" id="middlename" name="middlename">
                                </div>
                                <div class="col-md-3">
                                    <label for="suffix" class="form-label">Suffix</label>
                                    <input type="text" class="form-control" id="suffix" name="suffix">
                                </div>

                                <span class="mb-2 mt-3">Assigned to:</span>
                                <div class="col-md-4 mb-2">
                                    <label for="city" class="form-label visually-hidden">City</label>
                                    <select id="city" class="form-select">
                                        <option selected>Select City</option>
                                        <option>...</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="district" class="form-label visually-hidden">District No.</label>
                                    <select id="district" class="form-select">
                                        <option selected>Select District No.</option>
                                        <option>...</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="parishName" class="form-label visually-hidden">Parish Name</label>
                                    <select id="parishName" class="form-select">
                                        <option selected>Select Parish Name</option>
                                        <option>...</option>
                                    </select>
                                </div>

                                <span class="mb-2 mt-3">Account Details</span>
                                <div class="col-md-6 mb-2">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username">
                                </div>

                                <div class="col-12 mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group mb-3">
                                        <button class="btn btn-outline-secondary" type="button">Generate Password</button>
                                        <input type="text" class="form-control" placeholder="" aria-label="Generate password">
                                        <button class="btn btn-outline-secondary" type="button"><i class="bi bi-clipboard"></i></button>
                                    </div>
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

        <!-- MODAL FOR FILTER -->
        <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
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
                                <label for="filterDistrict" class="col-sm-2 col-form-label">District:</label>
                                <div class="col-sm-10">
                                <select id="filterDistrict" class="form-select">
                                    <option selected>Select District No.</option>
                                    <option>...</option>
                                </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="filterParishName" class="col-sm-2 col-form-label">Parish Assigned:</label>
                                <div class="col-sm-10">
                                <select id="filterParishName" class="form-select">
                                    <option selected>Select Parish Name</option>
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
            <table id="coordinatorsTable" class="table">
                <caption class="caption-top text-primary">List of Coordinator</caption>
                <thead class="table-primary">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Coordinator's Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">City</th>
                        <th scope="col">District</th>
                        <th scope="col">Parish Assigned</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                <tbody>

                    <tr>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td><a href="#" class="btn btn-sm text-primary">View Details</a></td>
                    </tr>

                </tbody>
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