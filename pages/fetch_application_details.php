<?php
// Include your PDO connection
include('db_connection.php');

// Check if application_id is provided
if (isset($_POST['application_id'])) {
    $applicationId = $_POST['application_id'];

    // Prepare the query to fetch application details
    $query = "
        SELECT 
            app.Application_no, 
            app.Name, 
            app.Middlename, 
            app.Surname, 
            app.Parish, 
            add_info.Preferred_Mission 
        FROM 
            application_info AS app
        INNER JOIN 
            application_add_info AS add_info 
        ON 
            app.Application_no = add_info.Application_no
        WHERE 
            app.Application_no = :application_id
    ";

    // Prepare and execute the query
    $stmt = $pdo->prepare($query);
    $stmt->execute([':application_id' => $applicationId]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        // Return application details as HTML
        echo "<h3>Application Details</h3>";
        echo "<p><strong>Application No:</strong> {$row['Application_no']}</p>";
        echo "<p><strong>Name:</strong> {$row['Name']} {$row['Middlename']} {$row['Surname']}</p>";
        echo "<p><strong>Parish:</strong> {$row['Parish']}</p>";
        echo "<p><strong>Preferred Mission:</strong> {$row['Preferred_Mission']}</p>";
    } else {
        echo "No details found for this application.";
    }
}
?>