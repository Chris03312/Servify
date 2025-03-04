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
    .faq-container {
        max-width: 85%;
        margin-left: 270px; /* Push it to the right */
        padding-top: 100px; /* Prevent overlap with navbar */
    }
    .faq-card {
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        background-color: white;
    }
    .table-responsive {
        border-radius: 10px;
        overflow: hidden;
    }
    .table th, .table td {
        vertical-align: middle;
        text-align: center;
    }
</style>
<body class="bg-light">

    <?php include("../adminIncludes/adminSidePanel.php"); ?>

    <div class="container faq-container">
        <div class="faq-card">
            <h2 class="mb-4">Manage Frequently Asked Questions</h2>

            <?php
            include("../adminIncludes/data.php"); // Database connection

            // Fetch FAQs
            $query = "SELECT * FROM faq";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                echo "<div class='table-responsive'>";
                echo "<table class='table table-bordered table-hover'>";
                echo "<thead class='table-dark'>
                        <tr>
                            <th>Question</th>
                            <th>Answer</th>
                            <th>Actions</th>
                        </tr>
                    </thead>";
                echo "<tbody>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row["question"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["answer"]) . "</td>";
                    echo "<td>
                            <a href='../adminFAQ/adminEditFAQ.php?id=" . $row["id"] . "' class='btn btn-warning btn-sm'>Edit</a>
                            <button class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#deleteFaqModal' 
                                    data-faq-id='" . $row["id"] . "'>
                                Delete
                            </button>
                        </td>";
                    echo "</tr>";
                }

                echo "</tbody></table>";
                echo "</div>";
            } else {
                echo "<p class='alert alert-warning text-center'>No FAQs found.</p>";
            }

            $conn->close();
            ?>


            <div class="text-center mt-3">
                <a href="../adminFAQ/adminFAQ.php" class="btn btn-success">Add New FAQ</a>
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