<?php
include("../adminIncludes/data.php"); // Include database connection

if (isset($_GET["id"])) {
    $id = intval($_GET["id"]); // Sanitize input

    // Delete query
    $query = "DELETE FROM faq WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>alert('FAQ deleted successfully!'); window.location.href='../adminFAQ/adminViewFAQ.php';</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
    }

    $stmt->close();
}

$conn->close();
?>
