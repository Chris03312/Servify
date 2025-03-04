<?php
include("../adminIncludes/data.php"); // Ensure this file contains the database connection

// Fetch events from the database
$query = "SELECT * FROM event_announcement ORDER BY announcement_date DESC";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DDPAM Admin Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<style>
    
    body {
        display: flex;
        min-height: 100vh;
        margin: 0;
        overflow-x: hidden;
    }

    .main-content {
        margin-left: 270px; /* Push content to the right */
        
        padding: 20px;
        width: calc(100% - 270px); /* Adjust width */
    }

    .navbar {
        width: calc(100% - 250px);
        margin-left: 250px;
        position: fixed;
        top: 0;
        background: black;
        color: white;
        padding: 15px;
        z-index: 1000;
    }

    /* Adjust event container */
    .event-container {
        max-width: 85%;
        margin-left: 270px; /* Push it to the right */
        padding-top: 60px; /* Prevent overlap with navbar */
    }

    /* Ensure table content is responsive */
    .table-responsive {
        border-radius: 10px;
        overflow: hidden;
        margin-top: 20px;
    }

    /* Improve table styling */
    .table th, .table td {
        vertical-align: middle;
        text-align: center;
    }

    /* Ensure images inside the table are properly sized */
    .table img {
        border-radius: 5px;
        max-width: 100px;
        height: auto;
    }

    /* Make buttons fit nicely */
    .btn-sm {
        padding: 5px 10px;
        font-size: 14px;
    }

</style>
<body class="bg-light">
<?php include("../adminIncludes/adminSidePanel.php"); ?>

<div class="container event-container">
    <div class="event-card mt-3">
    <h2 class="mb-4">Event Announcements</h2>
    <a href="adminEvents.php" class="btn btn-success mb-3"> Add New Event</a>
    
    <?php if ($result->num_rows > 0): ?>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Author</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row["announcement_id"]; ?></td>
                        <td><?php echo $row["announcement_title"]; ?></td>
                        <td><?php echo $row["announcement_date"]; ?></td>
                        <td><?php echo $row["announcement_by"]; ?></td>
                        <td><?php echo $row["announcement_desc"]; ?></td>
                        <td>
                            <img src="/LandingPage/img/<?php echo $row['announcement_images']; ?>" alt="Event Image" width="80">
                        </td>
                        <td>
                        <a href="adminEditEvents.php?id=<?= $row['announcement_id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteEventModal" 
                                data-event-id="<?php echo $row['announcement_id']; ?>">
                            Delete
                        </button>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="text-center">No events found.</p>
    <?php endif; ?>
        </div>
</div>
<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteEventModal" tabindex="-1" aria-labelledby="deleteEventLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteEventLabel">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this event?
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
    var deleteEventModal = document.getElementById("deleteEventModal");
    var confirmDeleteBtn = document.getElementById("confirmDeleteBtn");

    // Listen for modal show event
    deleteEventModal.addEventListener("show.bs.modal", function(event) {
        var button = event.relatedTarget; // Button that triggered the modal
        if (button) {
            var eventId = button.getAttribute("data-event-id"); // Get event ID
            confirmDeleteBtn.href = "deleteevent.php?id=" + eventId;
        }
    });
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>

<?php
$conn->close();
?>