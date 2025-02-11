<?php
// Assuming you have a database connection set up
require_once __DIR__ . '/../configuration/Database.php';

$query = "
    SELECT 
        app.APPLICATION_ID, 
        CONCAT(app.FIRST_NAME, ' ', app.MIDDLE_NAME, ' ', app.SURNAME) AS FullName, 
        app.Parish, 
        add_info.PREFERRED_PPCRV_VOL_ASS
    FROM 
        application_info AS app
    INNER JOIN
        application_add_info AS add_info 
    ON 
        app.APPLICATION_ID= add_info.APPLICATION_ADD_ID
";

$db = Database::getConnection();
$stmt = $db->prepare($query);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

if($rows) {
    echo "<table border='1'>
            <thead>
                <tr>
                    <th>Application No</th>
                    <th>Name</th>
                    <th>Parish</th>
                    <th>Preferred Mission</th>
                    <th>Action</th>
                    <th>Remarks</th>
                </tr>
            </thead>
            <tbody>";

    foreach($rows as $row) {
        echo "<tr>
                <td>{$row['APPLICATION_ID']}</td>
                <td>{$row['FullName']}</td>
                <td>{$row['Parish']}</td>
                <td>{$row['PREFERRED_PPCRV_VOL_ASS']}</td>
                <td>
                    <button class='review-btn' data-id='{$row['APPLICATION_ID']}'>Review</button>
                    <button class='approve-btn' data-id='{$row['APPLICATION_ID']}'>Approve</button>
                    <button class='reject-btn' data-id='{$row['APPLICATION_ID']}'>Reject</button>
                </td>
              </tr>";
    }

    echo "</tbody></table>";
} else {
    echo "No records found.";
}
?>

<script>
    // Listen for clicks on review buttons
    document.querySelectorAll('.review-btn').forEach(button => {
        button.addEventListener('click', function() {
            // Get the application ID from the button's data-id attribute
            let applicationId = this.getAttribute('data-id');
            
            // Send the application ID to the server using AJAX
            let xhr = new XMLHttpRequest();
            xhr.open('POST', 'fetch_application_details.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    // Show the returned data (e.g., the application details)
                    document.getElementById('application-details').innerHTML = xhr.responseText;
                }
            };
            xhr.send('application_id=' + applicationId);  // Send the application ID to the server
        });
    });
</script>

<div id="application-details">
    <!-- This is where application details will be displayed after review button click -->
</div>

