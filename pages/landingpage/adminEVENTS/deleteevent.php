<?php
include("../adminIncludes/data.php"); // Database connection

if (isset($_GET['id'])) {
    $event_id = $_GET['id'];

    $query = "DELETE FROM event_announcement WHERE announcement_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $event_id);

    if ($stmt->execute()) {
        echo "<script>
                alert('Event deleted successfully!');
                window.location.href = '../adminEVENTS/adminViewEvents.php';
              </script>";
    } else {
        echo "<script>alert('Error: Could not delete event.'); history.back();</script>";
    }

    $stmt->close();
} else {
    echo "<script>alert('Error: No event ID provided.'); history.back();</script>";
}

$conn->close();
?>
