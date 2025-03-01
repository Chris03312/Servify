<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coordinator | Approved Submissions</title>
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

        <div class="row align-items-center mb-5">
            <div class="col-md-4">
                <h4>Approved Submissions</h4>
            </div>

            <div class="col-md-8">
                <div class="d-flex justify-content-end gap-2">

                    <div class="input-group flex-grow-1 w-auto">
                        <span class="input-group-text"><i class="bi bi-search"></i></span>
                        <input type="search" class="form-control" name="search" id="search" placeholder="Search here">
                    </div>
                    <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
                        data-bs-target="#filterModal"><i class="bi bi-sliders"></i></button>
                    <button type="button" class="btn btn-outline-secondary d-md-block d-none"><i
                            class="bi bi-plus me-2"></i>Add Submission</button>

                    <!--FILTER MODAL-->
                    <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">

                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <div id="emptySearch" class="text-center text-danger" style="display: none;"></div>



                                    <div class="row align-items-center mb-3">
                                        <div class="col-auto">
                                            <label for="submissionDate"
                                                class="col-form-label col-auto"><strong>Submission
                                                    Date:</strong></label>
                                        </div>
                                        <div class="col-auto">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                                                <input type="text" id="submissionDate" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row align-items-center mb-3">
                                        <div class="col-auto">
                                            <label for="applicationType" class="col-form-label"><strong>Application
                                                    Type:</strong></label>
                                        </div>
                                        <div class="col-auto">
                                            <select id="applicationType" class="form-select">
                                                <option selected>Select application type</option>
                                                <option value="New Volunteer">New</option>
                                                <option value="Renewal">Renewal</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row align-items-center mb-3">
                                        <div class="col-auto">
                                            <label for="role" class="col-form-label"><strong>Role:</strong></label>
                                        </div>
                                        <div class="col-auto">
                                            <select id="role" class="form-select">
                                                <option selected>Select Role</option>
                                                <option value="">Election Monitoring System Encoders (EMS)</option>
                                                <option value="">Finance & Solicitation</option>
                                                <option value="">Logistics (Food & Supplies)</option>
                                                <option value="">Precinct Poll Monitoring (PPM)</option>
                                                <option value="">Special Witnesses of Truth (SWOT-Roving Team)</option>
                                                <option value="">Transportation & Communications</option>
                                                <option value="">Voters’ Assistance Desk (VAD)</option>
                                                <option value="">Voters’ Education (Speakers’ Bureau/Training)</option>
                                                <option value="">Voters’ List Cleansing & Verification</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row align-items-center mb-3">
                                        <div class="col-auto">
                                            <label for="pollingPlace" class="col-form-label"><strong>Polling
                                                    Place:</strong></label>
                                        </div>
                                        <div class="col-auto">
                                            <select id="pollingPlace" class="form-select">
                                                <option selected>Select Polling Place</option>
                                                <option value="">Election Monitoring System Encoders (EMS)</option>
                                                <option value="">Finance & Solicitation</option>
                                                <option value="">Logistics (Food & Supplies)</option>
                                                <option value="">Precinct Poll Monitoring (PPM)</option>
                                                <option value="">Special Witnesses of Truth (SWOT-Roving Team)</option>
                                                <option value="">Transportation & Communications</option>
                                                <option value="">Voters’ Assistance Desk (VAD)</option>
                                                <option value="">Voters’ Education (Speakers’ Bureau/Training)</option>
                                                <option value="">Voters’ List Cleansing & Verification</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row align-items-center mb-5">
                                        <div class="col-auto">
                                            <label for="cancellationDate"
                                                class="col-form-label col-auto"><strong>Cancellation
                                                    Date:</strong></label>
                                        </div>
                                        <div class="col-auto">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                                                <input type="text" id="cancellationDate" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row justify-content-center align-items-center gap-3">
                                        <button type="button" class="btn btn-outline-secondary px-4">Reset</button>
                                        <button type="search" class="btn btn-primary px-5">Search</button>
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="d-block d-md-none">
                        <div class="dropdown">
                            <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <button type="button" class="dropdown-item"><i class="bi bi-plus me-2"></i>Add
                                    Submission</button>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <ul class="nav nav-underline mb-5">
            <li class="nav-item">
                <a class="nav-link px-3" href="/pending_submissions">Pending
                    <small>(<?php echo $pendingCount; ?>)</small></a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-3" href="/under_review_submissions">Under Review
                    <small>(<?php echo $underReviewCount; ?>)</small></a>
            </li>
            <li class="nav-item">
                <a class="nav-link active px-3" href="/approved_submissions">Approved/Completed
                    <small>(<?php echo $approvedCount; ?>)</small></a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-3" href="/cancelled_submissions">Withdrawn/Cancelled
                    <small>(<?php echo $cancelledCount; ?>)</small></a>
            </li>
        </ul>


        <!--TABLE-->

        <div class="table-responsive">
            <table id="approve" class="table table-hover align-middle">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">Submission Date/Time</th>
                        <th scope="col">Application Type</th>
                        <th scope="col">Volunteer Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php if (!empty($approvedApplications)): ?>
                        <?php foreach ($approvedApplications as $application): ?>
                            <tr>
                                <td scope="row"><?php echo $application['APPLICATION_DATE']; ?></td>
                                <td><?php echo 'New ' . $application['ROLE'] . '<br><br>
                                    Precinct no.: ' . $application['PRECINCT_NO'] . '<br>
                                    Address: ' . $application['STREETADDRESS'] . ', ' . $application['BARANGAY'] . ', ' . $application['CITY'] . '<br>
                                    Preferred Role: ' . $application['PREFERRED_PPCRV_VOL_ASS']; ?>
                                </td>
                                <td><?php echo $application['FIRST_NAME'] . ' ' . $application['SURNAME']; ?></td>
                                <td>
                                    <select name="status" class="form-select">
                                        <?php
                                        $statuses = ['Pending', 'Approved for Assignment', 'Generate ID', 'Completed', 'Generate Certificate', 'Returned for update', 'Rejected']; // List of statuses
                                        foreach ($statuses as $status) {
                                            $selected = ($application['STATUS'] == $status) ? 'selected' : '';
                                            echo "<option value='$status' $selected>$status</option>";
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <div class="d-none d-md-flex flex-row gap-2">
                                        <?php if ($application['STATUS'] === 'Requesting for Approval'): ?>
                                            <label class="text-danger"><?php echo $application['STATUS']; ?></label>
                                        <?php elseif ($application['STATUS'] === 'Approved'): ?>
                                            <label class="text-success"><?php echo $application['STATUS']; ?></label>
                                        <?php endif; ?>
                                    </div>

                                    <!--BTN FOR SMALLER SCREEN-->
                                    <div class="d-flex d-md-none flex-column">
                                        <div class="dropdown">
                                            <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-three-dots-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <div class="d-md-none d-flex flex-row gap-2">
                                                    <?php if ($application['STATUS'] === 'Requesting for Approval'): ?>
                                                        <label
                                                            class=" dropdown-item text-danger"><?php echo $application['STATUS']; ?></label>
                                                    <?php elseif ($application['STATUS'] === 'Approved'): ?>
                                                        <label
                                                            class="dropdown-item text-success"><?php echo $application['STATUS']; ?></label>
                                                    <?php endif; ?>
                                                </div>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-danger">No volunteers found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>
    </div>
    </div>


    <!--SCRIPT FOR DATE PICKER-->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            flatpickr('#submissionDate', {
                dateFormat: 'M-d-Y', // Customize the format (e.g., YYYY-MM-DD)
            });
        });
        document.addEventListener('DOMContentLoaded', function () {
            flatpickr('#cancellationDate', {
                dateFormat: 'M-d-Y', // Customize the format (e.g., YYYY-MM-DD)
            });
        });
    </script>


    <!--SCRIPT FOR FILTERING-->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const searchButton = document.querySelector("#filterModal .btn-primary"); // Search button
            const resetButton = document.querySelector("#filterModal .btn-outline-secondary"); // Reset button
            const searchInput = document.querySelector("#search"); // Volunteer Name search input
            const tableBody = document.querySelector("tbody"); // Table body
            const tableRows = document.querySelectorAll("tbody tr"); // All table rows
            let emptySearchDiv = document.getElementById("emptySearch");


            // Create "No matches found" message
            const noMatchesMessage = document.createElement("tr");
            noMatchesMessage.innerHTML = `<td colspan="5" class="text-center text-muted">No matches found</td>`;
            noMatchesMessage.style.display = "none"; // Hidden by default
            tableBody.appendChild(noMatchesMessage);

            // Function to check if any rows are visible
            function checkIfEmpty() {
                let visibleRows = Array.from(tableRows).some(row => row.style.display !== "none");
                noMatchesMessage.style.display = visibleRows ? "none" : "";
            }

            // Function to filter table based on search input (Volunteer Name)
            searchInput.addEventListener("keyup", function () {
                let searchValue = searchInput.value.toLowerCase().trim();

                tableRows.forEach(row => {
                    let volunteerName = row.cells[2].textContent.toLowerCase(); // Volunteer Name column
                    row.style.display = volunteerName.includes(searchValue) ? "" : "none";
                });

                checkIfEmpty();
            });

            searchButton.addEventListener("click", function () {
                // Get filter values
                let submissionDate = document.querySelector("#submissionDate").value.trim();
                let applicationType = document.querySelector("#applicationType").value;
                let role = document.querySelector("#role").value;
                let pollingPlace = document.querySelector("#pollingPlace").value;
                let cancellationDate = document.querySelector("#cancellationDate").value.trim();

                // Check if at least one filter is selected
                if (
                    submissionDate === "" &&
                    applicationType === "Select application type" &&
                    role === "Select Role" &&
                    pollingPlace === "Select Polling Place" &&
                    cancellationDate === ""
                ) {
                    emptySearchDiv.textContent = "Please select at least one filter before searching.";
                    emptySearchDiv.style.display = "block"; // Show message
                    return;
                }

                // Loop through table rows
                tableRows.forEach(row => {
                    let rowDate = row.cells[0].textContent.toLowerCase(); // Submission Date
                    let rowType = row.cells[1].textContent.toLowerCase(); // Application Type
                    let rowVolunteer = row.cells[2].textContent.toLowerCase(); // Volunteer Name
                    let rowStatus = row.cells[3].textContent.toLowerCase(); // Status

                    // Check if row matches filter criteria (allow empty fields to act as wildcards)
                    let match =
                        (submissionDate === "" || rowDate.includes(submissionDate.toLowerCase())) &&
                        (applicationType === "Select application type" || rowType.includes(applicationType.toLowerCase())) &&
                        (role === "Select Role" || rowVolunteer.includes(role.toLowerCase())) &&
                        (pollingPlace === "Select Polling Place" || rowStatus.includes(pollingPlace.toLowerCase())) &&
                        (cancellationDate === "" || rowDate.includes(cancellationDate.toLowerCase()));

                    // Show/hide row based on match
                    row.style.display = match ? "" : "none";
                });

                checkIfEmpty();

                // Close modal after searching
                let modal = bootstrap.Modal.getInstance(document.getElementById("filterModal"));
                modal.hide();
            });

            resetButton.addEventListener("click", function () {
                // Clear all input fields
                document.querySelector("#submissionDate").value = "";
                document.querySelector("#applicationType").selectedIndex = 0; // Reset to default option
                document.querySelector("#role").selectedIndex = 0;
                document.querySelector("#pollingPlace").selectedIndex = 0;
                document.querySelector("#cancellationDate").value = "";
                searchInput.value = ""; // Clear the volunteer name search bar

                // Show all rows again
                tableRows.forEach(row => {
                    row.style.display = "";
                });

                checkIfEmpty();
            });
        });
    </script>

    <!-- Flatpickr JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>








    <!--BOOTSTRAP JS CDN LINK-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>