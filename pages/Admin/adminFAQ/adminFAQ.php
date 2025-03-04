<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DDPAM Admin Website</title>
    <link rel="stylesheet" href="../DDPAM Voting/css/styles.css">
    <link rel="stylesheet" href="../DDPAM Voting/css/bootstrap.css">
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

    <div class="faq-container">
        <div class="admin-faq m-5">
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