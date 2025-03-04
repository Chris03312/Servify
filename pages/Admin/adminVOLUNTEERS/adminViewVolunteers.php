
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DDPAM Admin Website</title>
    <link rel="stylesheet" href="../css/volunteer_sidebar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

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
<style>
    
    body {
        background-color: #EAEAEA !important;
    }

</style>
<body>
<?php include('includes/admin_sidebar.php');?>

<div class="container event-container">
    <div class="event-card mt-3">
        <h2 class="mb-4">Missions</h2>
        <a href="/adminVolunteers?token=<?php echo urlencode($_GET['token'] ?? ''); ?>" class="btn btn-success mb-3"> Add Mission</a>
    
    <?php #if ($result->num_rows > 0): ?>
        <table class="table">
            <thead class="table-primary">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Type</th>
                    <th scope="col">Short Description</th>
                    <th scope="col">Mission Acronym</th>
                    <th scope="col">Work</th>
                    <th scope="col">Qualification</th>
                    <th scope="col">Image</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                // if ($result->num_rows > 0): 
                //     while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php #echo $row["MISSIONS_ID"]; ?></td>
                            <td><?php #echo $row["MISSION_NAME"]; ?></td>
                            <td><?php #echo $row["MISSION_TYPE"]; ?></td>
                            <td><?php #echo $row["MISSION_DESCRIPTION"]; ?></td>
                            <td><?php #echo $row["MISSION_DESC"]; ?></td>
                            <td><?php #echo $row["MISSION_WORK"]; ?></td>
                            <td><?php #echo $row["MISSION_QUALIFICATION"]; ?></td>
                            <td>
                                <img src="/missions/img/<?php #echo $row['MISSION_IMAGE']; ?>" alt="Mission Image" width="80">
                            </td>
                            <td>
                                <a href="/adminEditVolunteers?token=<?php echo urlencode($_GET['token'] ?? ''); ?>" class="btn btn-warning btn-sm">Edit</a>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteVolunteerModal" 
                                    data-mission-id="<?php #echo $row['MISSIONS_ID']; ?>">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    <?php #endwhile;
                #else: ?>
                    <tr>
                        <td colspan="9" class="text-center">No missions available</td>
                    </tr>
                <?php #endif; ?>
            </tbody>
        </table>
        </div>
</div>
<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteVolunteerModal" tabindex="-1" aria-labelledby="deleteVolunteerLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteVolunteerLabel">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this mission?
            </div>
            <div class="modal-footer">
                <!-- Button that sends DELETE request -->
                <a href="#" id="confirmDeleteBtn" class="btn btn-danger">Yes, Delete</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function() {
    var deleteVolunteerModal = document.getElementById("deleteVolunteerModal");
    var confirmDeleteBtn = document.getElementById("confirmDeleteBtn");

    // Listen for modal show event
    deleteVolunteerModal.addEventListener("show.bs.modal", function(event) {
        var button = event.relatedTarget; // Button that triggered the modal
        if (button) {
            var eventId = button.getAttribute("data-event-id"); // Get event ID
            confirmDeleteBtn.href = "#?id=" + eventId;
        }
    });
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>

