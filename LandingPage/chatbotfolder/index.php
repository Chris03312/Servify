<?php
include("data.php");
// Query to fetch FAQ data
$query = "SELECT * FROM faq";
$result = $conn->query($query);

if (!$result) {
    echo json_encode(["message" => $conn->error]);
    exit;
}

$id = [];
$question = [];
$asnwer = [];

while ($row = $result->fetch_assoc()) {
    $id[] = $row['id'];
    $question[] = $row['question'];
    $answer[] = $row['answer'];
}

header('Content-Type: application/json');
echo json_encode(["id" => $id, "question" => $question, "answer" => $answer]);

$conn->close();

?>