<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coordinator | Renewal Submissions</title>
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

    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


</head>

<body>

    <?php
    include('includes/coordinator_sidebar.php');
    ?>


    <!--MAIN CONTENT-->
    <main class="container-fluid p-3">

        <div class="d-flex flex-row justify-content-between align-items-center mb-3">
            <h4>Renewal Submmissions</h4>
            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#renewalSubmissionModal">Set Renewal Date</button>
        </div>

        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger">
                <?php echo $_SESSION['error'];
                unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success">
                <?php echo $_SESSION['success'];
                unset($_SESSION['success']); ?>
            </div>
        <?php endif; ?>

        <div class="modal fade" id="renewalSubmissionModal" tabindex="-1"
            aria-labelledby="renewalSubmissionModalLabel" aria-hidden="true" data-bs-backdrop="static">

            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-primary p-2">
                    </div>
                    <div class="modal-body">
                        <div class="d-flex flex-row justify-content-start align-items-center gap-2 mb-4">
                            <span class="text-danger fs-4 fw-bold">Set Renewal Date</span>
                        </div>

                        <form action="/renewals_submission?token=<?php echo urlencode($_GET['token'] ?? ''); ?>" id="renewalForm" method="POST">
                            <input type="hidden" id="event_id" name="event_id" value="1"> <!-- Replace with dynamic event ID -->

                            <div class="mb-3">
                                <label for="datepicker" class="form-label mb-3">Select Date</label>

                                <p><strong>From:</strong></p>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                                    <input type="text" id="renewal_from" name="renewal_from" class="form-control">
                                </div>

                                <p><strong>To:</strong></p>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                                    <input type="text" id="renewal_to" name="renewal_to" class="form-control">
                                </div>
                            </div>

                            <div class="d-flex flex-row justify-content-around align-items-center gap-3">
                                <button type="button" class="btn btn-outline-secondary px-5" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" name="saveRenewalDate" class="btn btn-primary px-5">Save</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </main>
    </div>
    </div>


    <!-- Flatpickr JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Initialize date pickers
            flatpickr("#renewal_from", {
                enableTime: false,
                dateFormat: "F j, Y"
            });
            flatpickr("#renewal_to", {
                enableTime: false,
                dateFormat: "F j, Y"
            });
        });
    </script>






    <!--BOOTSTRAP JS CDN LINK-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>