<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DDPAM Admin Website</title>
    <link rel="stylesheet" href="../DDPAM Voting/css/styles.css">
    <link rel="stylesheet" href="../LandingPage/css/bootstrap.css">
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

<div class="mission-container">
    <div class="admin-volunteer m-5">
        <h2 class="mb-4">Edit Mission</h2>
        <form action="insertMission.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="event_id" value="<?= $event['MISSIONS_ID']; ?>">
            <div class="row">
                <div class="col mb-3 md-4">
                    <label class="form-label fw-semibold">Mission Name</label>
                    <input type="text" name="mission_name" class="form-control" value="<?= htmlspecialchars($event['MISSION_NAME']); ?>" required>
                </div>

                <div class="col mb-3 md-4">
                    <label class="form-label fw-semibold">Mission Type</label>
                    <input type="text" name="mission_type" class="form-control" value="<?= htmlspecialchars($event['MISSION_TYPE']); ?>" required>
                </div>
                    
                <div class="col mb-3 md-4">
                    <label class="form-label fw-semibold">Mission Acronym</label>
                    <input type="text" name="mission_desc" class="form-control" rows="3" value="<?= htmlspecialchars($event['MISSION_DESC']); ?>" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Description</label>
                <textarea name="mission_description" class="form-control" rows="3" required><?= htmlspecialchars($event['MISSION_WORK']); ?></textarea>
            </div>


            <div class="mb-3">
                <label class="form-label fw-semibold">Work</label>
                <textarea name="mission_work" class="form-control" rows="3" required> <?= htmlspecialchars($event['MISSION_WORK']); ?></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Qualification</label>
                <textarea name="mission_qualification" class="form-control" rows="3" required> <?= htmlspecialchars($event['MISSION_WORK']); ?></textarea>
            </div>

            <div class="mb-3">
                    <label class="form-label fw-semibold">Current Image</label><br>
                    <img src="/LandingPage/img/<?= $event['MISSION_IMAGE']; ?>" class="img-fluid img-thumbnail" width="200">
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
                Are you sure you want to update this Mission?
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
    var reader = new FileReader();
    reader.onload = function() {
        var output = document.getElementById('imagePreview');
        output.src = reader.result;
        output.style.display = 'block';
    }
    reader.readAsDataURL(event.target.files[0]);
}
</script>
</body>
</html>