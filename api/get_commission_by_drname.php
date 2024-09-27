<?php

require('config.php');
 $doctorName = $_GET['doctor_name'];

if (isset($_GET['start_date']) && isset($_GET['end_date'])) {
    $startDate = $_GET['start_date'];
    $endDate = $_GET['end_date'];

    // Adjust end date to the next day to capture all data of the end date
    $endDate = date('Y-m-d', strtotime($endDate . ' +1 day'));

    $query = "SELECT commision.*, drprofile.firstName, drprofile.lastName
              FROM commision
              INNER JOIN drprofile ON commision.doct_id = drprofile.id 
              WHERE drprofile.firstName LIKE '%$doctorName%' OR drprofile.lastName LIKE '%$doctorName%'
              AND commision.created_at >= '$startDate' AND commision.created_at < '$endDate'
              ORDER BY commision.created_at DESC";
} else {
    $query = "SELECT commision.*, drprofile.firstName, drprofile.lastName
              FROM commision
              INNER JOIN drprofile ON commision.doct_id = drprofile.id 
              WHERE drprofile.firstName LIKE '%$doctorName%' OR drprofile.lastName LIKE '%$doctorName%'
              ORDER BY commision.created_at DESC";
}

$result = $conn->query($query);

if (!$result) {
    echo "Query error: " . $conn->error;
    $conn->close();
    return;
}

$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
$conn->close();
return;
?>
