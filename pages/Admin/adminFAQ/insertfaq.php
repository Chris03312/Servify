<?php
include("../adminIncludes/data.php"); // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $question = isset($_POST["question"]) ? trim($_POST["question"]) : "";
    $answer = isset($_POST["answer"]) ? trim($_POST["answer"]) : "";

    if (!empty($question) && !empty($answer)) {
        $stmt = $conn->prepare("INSERT INTO faq (question, answer) VALUES (?, ?)");
        $stmt->bind_param("ss", $question, $answer);

        if ($stmt->execute()) {
            echo "<script>alert('FAQ added successfully!'); window.location.href='../adminFAQ/adminFAQ.php';</script>";
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
