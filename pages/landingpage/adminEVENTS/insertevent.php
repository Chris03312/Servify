<?php
include("../adminIncludes/data.php"); // Ensure this contains the database connection

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form inputs
    if (empty($_POST['title']) || empty($_POST['date']) || empty($_POST['author']) || empty($_POST['description'])) {
        die("<script>alert('All fields are required!'); history.back();</script>");
    }

    $title = trim($_POST['title']);
    $publish_date = trim($_POST['date']);
    $author = trim($_POST['author']);
    $description = trim($_POST['description']);

    // Check if file input is set
    if (!isset($_FILES["image"])) {
        die("<script>alert('Error: Image file not sent.'); history.back();</script>");
    }

    // Check if there's an upload error
    if ($_FILES["image"]["error"] !== 0) {
        die("<script>alert('Upload error: " . $_FILES["image"]["error"] . "'); history.back();</script>");
    }

    // Ensure upload directory exists
    $targetDir = $_SERVER['DOCUMENT_ROOT'] . "/LandingPage/img/";
    if (!file_exists($targetDir)) {
        die("<script>alert('Error: Upload directory does not exist.'); history.back();</script>");
    }
    if (!is_writable($targetDir)) {
        die("<script>alert('Error: Upload directory is not writable.'); history.back();</script>");
    }

    // Get file details
    $imageFile = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $imageFile;
    $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

    // Allowed file types
    $allowedTypes = ["jpg", "jpeg", "png"];
    if (!in_array($imageFileType, $allowedTypes)) {
        die("<script>alert('Invalid file type. Only JPG, JPEG, and PNG allowed.'); history.back();</script>");
    }

    // Move file to upload directory
    if (!move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
        die("<script>alert('Error: Image upload failed.'); history.back();</script>");
    }

    // Insert into database
    $query = "INSERT INTO event_announcement (announcement_title, announcement_date, announcement_by, announcement_desc, announcement_images) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        die("<script>alert('Error: " . $conn->error . "'); history.back();</script>");
    }
    
    $stmt->bind_param("sssss", $title, $publish_date, $author, $description, $imageFile);

    if ($stmt->execute()) {
        echo "<script>alert('Event added successfully!'); window.location.href='../adminEVENTS/adminViewEvents.php';</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "'); history.back();</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
