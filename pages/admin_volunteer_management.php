<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Volunteer Management</title>
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
    <!--JS CDN -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet.heat/dist/leaflet-heat.js"></script>
</head>

<body>

    <?php
    include('includes/admin_sidebar.php');
    ?>

    <main class="container p-5">

        <div class="d-flex flex-row justify-content-between align-items-center mb-5">
            <h4>Volunteer Management</h4>
            <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="modal"
                data-bs-target="#filterModal"><i class="bi bi-filter me-2"></i>Filter</button>
        </div>

        <!-- MAP PREVIEW CONTAINER -->
        <div id="mapPreviewContainer" class="container mt-3 p-3 mb-4 border rounded" style="display: none;">
            <h5 class="text-primary">Map Preview</h5>
            <div id="#" style="height: 200px;"></div>
        </div>


        <!-- MODAL FOR FILTER -->
        <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h4 class="text-center text-primary">Filter</h4>

                        <!--FORM-->
                        <div class="container mt-2">
                            <p class="text-muted text-center mb-5">To filter results, simply select your preferred
                                criteria from the available options and click "Apply" to view the filtered items.</p>


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

        <!-- SEARCH BAR -->
        <section class="row mb-3">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                <input type="search" class="form-control" placeholder="Search name or email">
            </div>
        </section>

        <!-- VOLUNTEER INFO TABS -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="volunteer-tab" data-bs-toggle="tab"
                    data-bs-target="#volunteer-tab-pane" type="button" role="tab" aria-controls="volunteer-tab-pane"
                    aria-selected="true">List of Volunteer</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending-tab-pane"
                    type="button" role="tab" aria-controls="pending-tab-pane" aria-selected="false">Pending
                    Approval</button>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active p-3" id="volunteer-tab-pane" role="tabpanel"
                aria-labelledby="volunteer-tab" tabindex="0">
                <table class="table">
                    <thead class="table-primary">
                        <tr>
                            <th>ID</th>
                            <th>Submission Date</th>
                            <th>Name</th>
                            <th>Details</th>
                            <th>Parish Assigned</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>February 20, 2023</td>
                            <td>Jazer</td>
                            <td>Pogi</td>
                            <td>St.Peter</td>
                            <td><a href="#" class="btn btn-sm text-primary">View Details</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>




            <!--Pending Tab-->

            <div class="tab-pane fade p-3" id="pending-tab-pane" role="tabpanel" aria-labelledby="pending-tab"
                tabindex="0">
                <table class="table">
                    <thead class="table-primary">
                        <tr>
                            <th>ID</th>
                            <th>Submission Date</th>
                            <th>Name</th>
                            <th>Details</th>
                            <th>Parish Assigned</th>
                            <th>Action</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>February 20, 2023</td>
                            <td>Jazer</td>
                            <td>Pogi</td>
                            <td>St.Peter</td>
                            <td><a href="#" class="btn btn-sm text-primary">View Details</a></td>
                            <td>
                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#listofVolunteerModal">Add Remarks</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>



            <!-- MODAL FOR ADD REMARKS -->
            <div class="modal fade" id="listofVolunteerModal" tabindex="-1" aria-labelledby="listofVolunteerModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-primary py-1 px-3">

                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <h5 class="text text-primary mt-2 mb-3" id="listofVolunteerLabel">Add Remarks</h5>
                            <label for="statusSelect" class="form-label fw-bold">Status:</label>
                            <select class="form-select mb-3" id="statusSelect" onchange="toggleRemarks()">
                                <option value="" selected disabled>Select Status</option>
                                <option value="Reject">Reject</option>
                                <option value="Re-assign">Re-assign</option>
                            </select>

                            <div id="reassignFields" style="display: none;">
                                <label class="fw-bold mb-2">Assigned To:</label>
                                <div class="d-flex gap-1 mb-5">
                                    <div class="col-md-4">
                                        <select class="form-select" id="citySelect">
                                            <option value="" selected disabled>Select City</option>
                                            <option value="City1">..</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-select" id="districtSelect">
                                            <option value="" selected disabled>Select District</option>
                                            <option value="District1">..</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="form-select" id="precintSelect">
                                            <option value="" selected disabled>Precint Select</option>
                                            <option value="Precint1">..</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="rejectRemarks" style="display: none;">
                                <label for="remarksTextarea" class="form-label">Remarks:</label>
                                <textarea class="form-control" id="remarksTextarea" rows="3"
                                    placeholder="Enter remarks..."></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Get references to tabs and the map preview container
            const pendingTab = document.getElementById("pending-tab");
            const volunteerTab = document.getElementById("volunteer-tab");
            const mapContainer = document.getElementById("mapPreviewContainer");

            // Function to toggle the map container when switching tabs
            function toggleMapPreview() {
                if (pendingTab.classList.contains("active")) {
                    mapContainer.style.display = "block"; // Show map if "Pending" tab is active
                } else {
                    mapContainer.style.display = "none"; // Hide map otherwise
                }
            }

            // Event Listeners for tab switching
            pendingTab.addEventListener("click", toggleMapPreview);
            volunteerTab.addEventListener("click", toggleMapPreview);

            // Initialize the map (Leaflet.js)
            var map = L.map('map').setView([14.5995, 120.9842], 12); // Centered on Manila
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);
        });

        // Function to show/hide remarks fields based on selected status
        function toggleRemarks() {
            var status = document.getElementById("statusSelect").value; // Get selected status value

            // Show "Re-assign" fields if selected, otherwise hide
            document.getElementById("reassignFields").style.display = status === "Re-assign" ? "block" : "none";

            // Show "Reject" remarks field if selected, otherwise hide
            document.getElementById("rejectRemarks").style.display = status === "Reject" ? "block" : "none";
        }
    </script>


    <!--BOOTSTRAP JS CDN LINK-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>