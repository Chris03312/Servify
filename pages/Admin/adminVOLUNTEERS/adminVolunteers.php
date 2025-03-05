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
    <div class="admin-mission m-5">
        <h2 class="mb-4">Add Mission</h2>
        <form action="insertMission.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col mb-3 md-4">
                    <label class="form-label fw-semibold">Mission Name</label>
                    <input type="text" name="mission_name" class="form-control" required>
                </div>

                <div class="col mb-3 md-4">
                    <label class="form-label fw-semibold">Mission Type</label>
                    <input type="text" name="mission_type" class="form-control" required>
                </div>
                    
                <div class="col mb-3 md-4">
                    <label class="form-label fw-semibold">Mission Acronym</label>
                    <input type="text" name="mission_desc" class="form-control" rows="3" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Description</label>
                <textarea name="mission_description" class="form-control" rows="3" required></textarea>
            </div>


            <div class="mb-3">
                <label class="form-label fw-semibold">Work</label>
                <textarea name="mission_work" class="form-control" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Qualification</label>
                <textarea name="mission_qualification" class="form-control" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label class="mb-1 fw-semibold">Upload Picture</label><br>
                <input type="file" class="form-control" name="mission_image" accept=".jpeg, .jpg, .png" onchange="previewImage(event)" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Image Preview</label><br>
                <img id="imagePreview" class="img-fluid img-thumbnail" width="200" style="display: none;">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
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