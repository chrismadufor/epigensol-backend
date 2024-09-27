<?php
require('config.php');

$cityId = isset($_GET['cityId']) ? $_GET['cityId'] : ''; // Get the cityId from the URL parameter 'cityId'
$searchQuery = isset($_GET['q']) ? $_GET['q'] : ''; // Get the search query from the URL parameter 'q'

$cityId = $conn->real_escape_string($cityId); // Sanitize cityId to prevent SQL injection
$searchQuery = $conn->real_escape_string($searchQuery); // Sanitize search query to prevent SQL injection

$query = "SELECT * FROM `clinic` WHERE `city_id` = '$cityId' AND `isDeleted` = false";

if (!empty($searchQuery)) {
    // Add the search condition if the search query is provided
    $query .= " AND `title` LIKE '%$searchQuery%'";
}

$query .= " ORDER BY `created_time_stamp` DESC";

$result = $conn->query($query);
$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
$conn->close();
return;
?>



