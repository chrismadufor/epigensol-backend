<?php
require('config.php');
$conn->set_charset("utf8mb4");
$deptId = isset($_GET['deptId']) ? $_GET['deptId'] : ''; // Get the deptId from the URL parameter 'deptId'
$clinicId = isset($_GET['clinicId']) ? $_GET['clinicId'] : ''; // Get the clinicId from the URL parameter 'clinicId'
$cityId = isset($_GET['cityId']) ? $_GET['cityId'] : ''; // Get the cityId from the URL parameter 'cityId'
$searchQuery = isset($_GET['q']) ? $_GET['q'] : ''; // Get the search query from the URL parameter 'q'

$deptId = $conn->real_escape_string($deptId); // Sanitize deptId to prevent SQL injection
$clinicId = $conn->real_escape_string($clinicId); // Sanitize clinicId to prevent SQL injection
$cityId = $conn->real_escape_string($cityId); // Sanitize cityId to prevent SQL injection
$searchQuery = $conn->real_escape_string($searchQuery); // Sanitize search query to prevent SQL injection

$query = "SELECT drprofile.*,
   department.name
   FROM drprofile
   INNER JOIN department ON drprofile.deptId=department.id
   WHERE drprofile.deptId ='$deptId' AND drprofile.clinic_id ='$clinicId' AND drprofile.city_id ='$cityId' AND drprofile.isDeleted = false";

if (!empty($searchQuery)) {
    // Add the search condition if the search query is provided
    $searchQuery = $conn->real_escape_string($searchQuery); // Sanitize search query to prevent SQL injection
    $query .= " AND ((`firstName` LIKE '%$searchQuery%') OR (`lastName` LIKE '%$searchQuery%'))";
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
