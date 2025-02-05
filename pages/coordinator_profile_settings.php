<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Settings</title>
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
    <main class="container p-5">

        <h4 class="mb-5">Profile Settings</h4>

        <div class="card">
            <div class="card-body">
                <a href="#" class="btn d-flex flex-row justify-content-between align-items-center mb-3">
                    <div class="d-flex flex-row justify-content-center align-items-center gap-3">
                        <div>
                            <i class="fa-solid fa-user fs-5"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <span class="fw-bold text-start">Edit Profile</span>
                            <small class="text-muted">Change profile name, number, email.</small>
                        </div>
                    </div>

                    <div>
                        <i class="fa-solid fa-chevron-right"></i>
                    </div>
                </a>
                
                <a href="/coordinator_change_pass" class="btn d-flex flex-row justify-content-between align-items-center">
                    <div class="d-flex flex-row justify-content-center align-items-center gap-3">
                        <div>
                            <i class="fa-solid fa-lock fs-5"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <span class="fw-bold text-start">Change Password</span>
                            <small class="text-muted">Update and strengthen account security.</small>
                        </div>
                    </div>

                    <div>
                        <i class="fa-solid fa-chevron-right"></i>
                    </div>
                </a>

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