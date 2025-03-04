<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DDPAM Admin Website</title>
    <link rel="stylesheet" href="../DDPAM Voting/css/styles.css">
    <link rel="stylesheet" href="../DPPAM Voting/css/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
    .event-container {
        max-width: 85%;
        margin-left: 270px; /* Push it to the right */
        padding-top: 60px; /* Prevent overlap with navbar */
    }
</style>
<body>
    <?php
    include("../adminIncludes/adminSidePanel.php")
    ?>
    <div class="event-container">
    <div class="admin-faq mt-3">
        <h2 class="mb-4">Add Event</h2>
        <form action="../adminEVENTS/insertevent.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="row">
                <div class="col">
                    <label class="form-label">Publish Date:</label>
                    <input type="date" name="date" class="form-control" required>
                </div>
                <div class="col">
                    <label class="form-label">Author</label>
                    <input type="text" name="author" class="form-control" required>
                </div>
            </div>

            <div class="mb-3 mt-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="5" required></textarea>
            </div>

            <div class="mb-3">
                <label class="mb-1">Upload Picture</label><br>
                <input type="file" class="form-control" name="image" accept=".jpeg, .jpg, .png" onchange="previewImage(event)" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Image Preview</label><br>
                <img id="imagePreview" class="img-fluid img-thumbnail" width="200" style="display: none;">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
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