<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DDPAM Admin Website</title>
    <link rel="stylesheet" href="../DPPAM Voting/css/styles.css">
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

    <div class="container faq-container">
        <div class="faq-card m-4">
            <h2 class="mb-3">Manage Frequently Asked Questions</h2>
            <a href="/adminFAQ?token=<?php echo urlencode($_GET['token'] ?? ''); ?>" class="btn btn-success mb-3">Add New FAQ</a>

            <?php
            #include("../adminIncludes/data.php"); // Database connection

            // Fetch FAQs
            // $query = "SELECT * FROM faq";
            // $result = $conn->query($query);

            // if ($result->num_rows > 0) {
            //     echo "<div class='table-responsive'>";
            //     echo "<table class='table table-bordered table-hover'>";
            //     echo "<thead class='table-dark'>
            //             <tr>
            //                 <th>Question</th>
            //                 <th>Answer</th>
            //                 <th>Actions</th>
            //             </tr>
            //         </thead>";
            //     echo "<tbody>";

            //     while ($row = $result->fetch_assoc()) {
            //         echo "<tr>";
            //         echo "<td>" . htmlspecialchars($row["question"]) . "</td>";
            //         echo "<td>" . htmlspecialchars($row["answer"]) . "</td>";
            //         echo "<td>
            //                 <a href='../adminFAQ/adminEditFAQ.php?id=" . $row["id"] . "' class='btn btn-warning btn-sm'>Edit</a>
            //                 <button class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#deleteFaqModal' 
            //                         data-faq-id='" . $row["id"] . "'>
            //                     Delete
            //                 </button>
            //             </td>";
            //         echo "</tr>";
            //     }

            //     echo "</tbody></table>";
            //     echo "</div>";
            // } else {
            //     echo "<p class='alert alert-warning text-center'>No FAQs found.</p>";
            // }

            #$conn->close();
            ?>
            <table class="table">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">Question</th>
                        <th scope="col">Answer</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td><?php #echo $row["question"; ?></td>
                    <td><?php #echo $row["answer"]; ?></td>
                        <td>
                        <a href="/adminEditFAQ?token=<?php echo urlencode($_GET['token'] ?? ''); ?>" class='btn btn-warning btn-sm'>Edit</a>
                        <button class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#deleteFaqModal' 
                            data-faq-id='" . $row["id"] . "'>Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="text-center mt-3">
            </div>
        </div>
    </div>

        <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteFaqModal" tabindex="-1" aria-labelledby="deleteFaqLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteFaqLabel">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this FAQ?
                </div>
                <div class="modal-footer">
                    <a href="#" id="confirmDeleteBtn" class="btn btn-danger">Yes, Delete</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>


    <script>
document.addEventListener("DOMContentLoaded", function() {
    var deleteFaqModal = document.getElementById("deleteFaqModal");
    var confirmDeleteBtn = document.getElementById("confirmDeleteBtn");

    deleteFaqModal.addEventListener("show.bs.modal", function(event) {
        var button = event.relatedTarget; // Button that triggered the modal
        var faqId = button.getAttribute("data-faq-id"); // Get FAQ ID
        confirmDeleteBtn.href = "deletefaq.php?id=" + faqId; // Set delete link
    });
});
</script>

</body>
</html>