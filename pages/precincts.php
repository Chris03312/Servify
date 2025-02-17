<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Precincts</title>
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

        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb align-items-center">
                <li class="breadcrumb-item"><a href="/admin_attendance_tracking"><h4>Attendance Tracking</h4></a></li>
                <li class="breadcrumb-item active" aria-current="page">Precincts</li>
            </ol>
        </nav>



        <section>
            <div class="card">
                <div class="card-body">
                    <div class="mb-2 d-flex flex-row justify-content-start align-items-center gap-2">
                        <i class="bi bi-person-circle fs-5 me-2"></i>Corrdinator Name: <span>Name</span>
                    </div>
                    <div class="mb-2 d-flex flex-row justify-content-start align-items-center gap-2">
                        <i class="bi bi-envelope-fill fs-5 me-2"></i>Email: <span>Name</span>
                    </div>
                    <div class="mb-2 d-flex flex-row justify-content-start align-items-center gap-2">
                        <i class="bi bi-telephone-fill fs-5 me-2"></i>Mobile No: <span>Name</span>
                    </div>
                </div>
            </div>
        </section>



     


        <!-- FILTER BUTTON AND SEARCH BAR -->
        <section class="d-flex justify-content-end align-items-center gap-2 my-3">
            <div class="input-group" style="width: 500px;">
                <span class="input-group-text" id="basic-addon1">
                    <i class="bi bi-search"></i>
                </span>
                <input type="search" class="form-control" placeholder="Search precinct">
            </div>
        </section>



        <!-- TABLE -->
        <div class="table-responsive">
            <table id="volunteersTable" class="table align-middle">
                <thead class="table-primary align-middle">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">List of Precinct</th>
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
                        <td><a href="#" class="btn btn-outline-primary">View</a></td>
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