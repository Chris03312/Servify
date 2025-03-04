<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DDPAM Admin Website</title>
    <link rel="stylesheet" href="../DDPAM Voting/css/styles.css">
    <link rel="stylesheet" href="../DPPAM Voting/css/bootstrap.css">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
</head>
<style>
    body{
        background-color: #EAEAEA !important;
    }
</style>
<body>

<?php include('includes/admin_sidebar.php');?>
    
    <div class="event-container">
        <div class="admin-event m-5">
            <h2 class="mb-4">Edit Event</h2>
            
            <form action="adminEditEvents.php?id=<?= $id ?>" id="updateEventForm" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="event_id" value="<?= $event['announcement_id']; ?>">

                <div class="mb-3">
                    <label class="form-label fw-semibold">Title</label>
                    <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($event['announcement_title']); ?>" required>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Publish Date</label>
                        <input type="date" name="date" class="form-control" value="<?= $event['announcement_date']; ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Author</label>
                        <input type="text" name="author" class="form-control" value="<?= htmlspecialchars($event['announcement_by']); ?>" required>
                    </div>
                </div>

                <div class="mb-3 mt-3">
                    <label class="form-label fw-semibold">Description</label>
                    <textarea name="description" class="form-control" rows="5" required><?= htmlspecialchars($event['announcement_desc']); ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Current Image</label><br>
                    <img src="/LandingPage/img/<?= $event['announcement_images']; ?>" class="img-fluid img-thumbnail" width="200">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Upload New Picture (Optional)</label>
                    <input type="file" class="form-control" name="image" accept=".jpeg, .jpg, .png" onchange="previewImage(event)">
                    <small class="text-muted">Only upload if you want to change the image.</small>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">New Image Preview</label><br>
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
