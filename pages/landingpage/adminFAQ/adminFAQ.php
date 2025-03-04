<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DDPAM Admin Website</title>
    <link rel="stylesheet" href="../DDPAM Voting/css/styles.css">
    <link rel="stylesheet" href="../DDPAM Voting/css/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
    .faq-container {
        max-width: 85%;
        margin-left: 270px; /* Push it to the right */
        padding-top: 60px; /* Prevent overlap with navbar */
    }
</style>
<body>
    <?php
    include("../adminIncludes/adminSidePanel.php")
    ?>
    <div class="faq-container">
        <div class="admin-faq">
            <h2 class="mt-3">Add FAQ</h2>
            <form action="../adminFAQ/insertfaq.php" method="POST">
                <div class="mb-3">
                    <label for="question" class="form-label">Question</label>
                    <input type="text" name="question" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="answer" class="form-label">Answer</label>
                    <textarea name="answer" class="form-control" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
</body>
</html>