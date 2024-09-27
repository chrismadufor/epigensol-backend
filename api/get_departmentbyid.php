<?php
require('config.php');

$clinicId = isset($_GET['clinicId']) ? $_GET['clinicId'] : ''; // Get the clinicId from the URL parameter 'clinicId'
$cityId = isset($_GET['cityId']) ? $_GET['cityId'] : ''; // Get the cityId from the URL parameter 'cityId'
$searchQuery = isset($_GET['q']) ? $_GET['q'] : ''; // Get the search query from the URL parameter 'q'

$clinicId = $conn->real_escape_string($clinicId); // Sanitize clinicId to prevent SQL injection
$cityId = $conn->real_escape_string($cityId); // Sanitize cityId to prevent SQL injection
$searchQuery = $conn->real_escape_string($searchQuery); // Sanitize search query to prevent SQL injection

$query = "SELECT * FROM `department` WHERE `clinic_id` = '$clinicId' AND `city_id` = '$cityId' AND `isDeleted` = false";

if (!empty($searchQuery)) {
    // Add the search condition if the search query is provided
    $query .= " AND `name` LIKE '%$searchQuery%'";
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
