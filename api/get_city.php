<?php
require('config.php');

$searchQuery = isset($_GET['q']) ? $_GET['q'] : ''; // Get the search query from the URL parameter 'q'

$searchQuery = $conn->real_escape_string($searchQuery); // Sanitize input to prevent SQL injection

$query = "SELECT * FROM `city` WHERE `isDeleted` = false";

if (!empty($searchQuery)) {
    // Add the search condition if the search query is provided
    $query .= " AND `cityName` LIKE '%$searchQuery%'";
}

$result = $conn->query($query);
$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
$conn->close();
return;
?>
