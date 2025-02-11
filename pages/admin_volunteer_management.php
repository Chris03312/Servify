<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Volunteer Management</title>
    <link rel="stylesheet" href="../css/volunteer_sidebar.css">

    <!--BOOTSTRAP CSS CDN LINK-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!--BOOTSTRAP CDN ICONS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <?php include('includes/admin_sidebar.php'); ?>

    <div class="container p-5">
        <div class="d-flex flex-row justify-content-between align-items-center mb-5">
            <h4>Volunteer Management</h4>
            <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#filterModal">
                <i class="bi bi-filter me-2"></i>Filter
            </button>
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
                <button class="nav-link active" id="volunteer-tab" data-bs-toggle="tab" data-bs-target="#volunteer-tab-pane" type="button" role="tab">List of Volunteer</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending-tab-pane" type="button" role="tab">Pending Approval</button>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active p-3" id="volunteer-tab-pane" role="tabpanel">
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
                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#listofVolunteerModal">Add Remarks</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- MODAL FOR ADD REMARKS -->
    <div class="modal fade" id="listofVolunteerModal" tabindex="-1" aria-labelledby="listofVolunteerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-primary py-2 px-3">
                    
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                    <option value="" selected disabled>Precint Select></option>
                                    <option value="Precint1">..</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div id="rejectRemarks" style="display: none;">
                        <label for="remarksTextarea" class="form-label">Remarks:</label>
                        <textarea class="form-control" id="remarksTextarea" rows="3" placeholder="Enter remarks..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Add</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleRemarks() {
            var status = document.getElementById("statusSelect").value;
            document.getElementById("reassignFields").style.display = status === "Re-assign" ? "block" : "none";
            document.getElementById("rejectRemarks").style.display = status === "Reject" ? "block" : "none";
        }
    </script>

    <!--BOOTSTRAP JS CDN LINK-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>