<?php
include("../adminIncludes/data.php"); // Include database connection

// Fetch existing event details
if (isset($_GET["id"])) {
    $id = intval($_GET["id"]); // Sanitize input

    $query = "SELECT * FROM event_announcement WHERE announcement_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $event = $result->fetch_assoc();

    if (!$event) {
        echo "<script>alert('Event not found.'); window.location.href='adminViewEvents.php';</script>";
        exit();
    }

    $stmt->close();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim($_POST["title"]);
    $date = trim($_POST["date"]);
    $author = trim($_POST["author"]);
    $description = trim($_POST["description"]);
    $newImage = $_FILES["image"]["name"] ?? "";

    if (!empty($title) && !empty($date) && !empty($author) && !empty($description)) {
        // If new image is uploaded, process it
        if (!empty($newImage)) {
            $targetDir = $_SERVER['DOCUMENT_ROOT'] . "/LandingPage/img/";
            $targetFilePath = $targetDir . basename($_FILES["image"]["name"]);
            $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
            $allowedTypes = ["jpg", "jpeg", "png"];

            if (!in_array($imageFileType, $allowedTypes)) {
                echo "<script>alert('Invalid file type. Only JPG, JPEG, and PNG allowed.');</script>";
            } elseif (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
                // Update query with new image
                $updateQuery = "UPDATE event_announcement SET announcement_title = ?, announcement_date = ?, announcement_by = ?, announcement_desc = ?, announcement_images = ? WHERE announcement_id = ?";
                $stmt = $conn->prepare($updateQuery);
                $stmt->bind_param("sssssi", $title, $date, $author, $description, $newImage, $id);
            } else {
                echo "<script>alert('Error uploading new image.');</script>";
                exit();
            }
        } else {
            // Update query without changing the image
            $updateQuery = "UPDATE event_announcement SET announcement_title = ?, announcement_date = ?, announcement_by = ?, announcement_desc = ? WHERE announcement_id = ?";
            $stmt = $conn->prepare($updateQuery);
            $stmt->bind_param("ssssi", $title, $date, $author, $description, $id);
        }

        if ($stmt->execute()) {
            echo "<script>alert('Event updated successfully!'); window.location.href='adminViewEvents.php';</script>";
        } else {
            echo "<script>alert('Error: " . $stmt->error . "');</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Please fill in all fields.');</script>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DDPAM Admin Website</title>
    <link rel="stylesheet" href="../DPPAM Voting/css/styles.css">
    <link rel="stylesheet" href="../DPPAM Voting/css/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
    .container {
        max-width: 85%;
        margin-left: 270px; /* Push it to the right */
        padding-top: 60px; /* Prevent overlap with navbar */
    }
</style>
<body>
    <?php include("../adminIncludes/adminSidePanel.php"); ?>
    
    <div class="container ">
        <div class="admin-edit-event mt-3">
            <h2 class="mb-4">Edit Event</h2>
            
            <form action="adminEditEvents.php?id=<?= $id ?>" id="updateEventForm" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="event_id" value="<?= $event['announcement_id']; ?>">

                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($event['announcement_title']); ?>" required>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Publish Date</label>
                        <input type="date" name="date" class="form-control" value="<?= $event['announcement_date']; ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Author</label>
                        <input type="text" name="author" class="form-control" value="<?= htmlspecialchars($event['announcement_by']); ?>" required>
                    </div>
                </div>

                <div class="mb-3 mt-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="5" required><?= htmlspecialchars($event['announcement_desc']); ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Current Image</label><br>
                    <img src="/LandingPage/img/<?= $event['announcement_images']; ?>" class="img-fluid img-thumbnail" width="200">
                </div>

                <div class="mb-3">
                    <label class="form-label">Upload New Picture (Optional)</label>
                    <input type="file" class="form-control" name="image" accept=".jpeg, .jpg, .png" onchange="previewImage(event)">
                    <small class="text-muted">Only upload if you want to change the image.</small>
                </div>

                <div class="mb-3">
                    <label class="form-label">New Image Preview</label><br>
                    <img id="imagePreview" class="img-fluid img-thumbnail" width="200" style="display: none;">
                </div>

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmEditModal">Save Changes</button>
                <a href="adminViewEvents.php" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>

    <!-- Confirmation Modal -->
    <div class="modal fade" id="confirmEditModal" tabindex="-1" aria-labelledby="confirmEditLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmEditLabel">Confirm Changes</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to update this event?
                </div>
                <div class="modal-footer">
                    <button type="submit" form="updateEventForm" class="btn btn-success">Yes, Update</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <script>
    function previewImage(event) {
        let imagePreview = document.getElementById("imagePreview");
        let file = event.target.files[0];

        if (file) {
            let reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                imagePreview.style.display = "block";
            };
            reader.readAsDataURL(file);
        }
    }
    </script>

</body>
</html>
