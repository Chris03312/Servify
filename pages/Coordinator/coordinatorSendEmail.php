<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Table with Email Action</title>
</head>
<body>
    <table border="1">
        <thead>
            <tr>
                <th>ACCOUNT ID</th>
                <th>USERNAME</th>
                <th>EMAIL</th>
                <th>PASSWORD</th>
                <th>STATUS</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once __DIR__ . '/../configuration/Database.php';
            // Database connection (replace with your credentials)
            $db = Database::getConnection();
            // Query to fetch data
            $stmt = $db->prepare('SELECT * FROM ACCOUNTS');
            $stmt->execute();

            // Fetch data as associative array
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($row['ACCOUNT_ID']) . '</td>';
                echo '<td>' . htmlspecialchars($row['USERNAME']) . '</td>';
                echo '<td>' . htmlspecialchars($row['EMAIL']) . '</td>';
                echo '<td>' . htmlspecialchars($row['PASSWORD']) . '</td>';
                echo '<td>' . htmlspecialchars($row['STATUS']) . '</td>';
                // Create simple email link
                echo '<td>
                        <a href="/../controllers/send_email.php?email=' . htmlspecialchars($row['EMAIL']) . '">Send Email</a>
                      </td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</body>
</html>
