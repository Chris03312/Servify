<?php
include("../adminIncludes/data.php"); // Include database connection

if (isset($_GET["id"])) {
    $id = intval($_GET["id"]); // Sanitize input

    // Fetch existing FAQ details
    $query = "SELECT * FROM faq WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $faq = $result->fetch_assoc();

    if (!$faq) {
        echo "<script>alert('FAQ not found.'); window.location.href='../adminFAQ/adminEditFAQ.php';</script>";
        exit();
    }

    $stmt->close();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $question = trim($_POST["question"]);
    $answer = trim($_POST["answer"]);

    if (!empty($question) && !empty($answer)) {
        $updateQuery = "UPDATE faq SET question = ?, answer = ? WHERE id = ?";
        $stmt = $conn->prepare($updateQuery);
        $stmt->bind_param("ssi", $question, $answer, $id);

        if ($stmt->execute()) {
            echo "<script>alert('FAQ updated successfully!'); window.location.href='../adminFAQ/adminViewFAQ.php';</script>";
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
    <title>Edit FAQ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php
    include("../adminIncludes/adminSidePanel.php")
    ?>

<div class="container">
    <h2 class="mt-3">Edit FAQ</h2>
    
    <form id="editFAQForm" method="POST">
        <div class="mb-3">
            <label class="form-label">Question</label>
            <input type="text" name="question" class="form-control" value="<?php echo htmlspecialchars($faq['question']); ?>" required>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Answer</label>
            <textarea name="answer" class="form-control" rows="5" required><?php echo htmlspecialchars($faq['answer']); ?></textarea>
        </div>
        
        <!-- Button to trigger the modal -->
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#confirmEditModal">
            Update
        </button>
        
        <a href="../adminFAQ/adminViewFAQ.php" class="btn btn-secondary">Cancel</a>
    </form>
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
                Are you sure you want to update this FAQ?
            </div>
            <div class="modal-footer">
                <!-- Form submission on confirmation -->
                <button type="submit" form="editFAQForm" class="btn btn-success">Yes, Update</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS (Ensure this is included) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    
</body>
</html>
