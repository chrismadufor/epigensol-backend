<?php

require('config.php');

if (isset($_GET['start_date']) && isset($_GET['end_date'])) {
    $startDate = $_GET['start_date'];
    $endDate = $_GET['end_date'];
    $endDate = date('Y-m-d', strtotime($endDate . ' +1 day'));
    $query = "SELECT commision.*, drprofile.firstName, drprofile.lastName
              FROM commision
              INNER JOIN drprofile ON commision.doct_id = drprofile.id
              WHERE commision.created_at BETWEEN '$startDate' AND '$endDate'
              ORDER BY commision.created_at DESC";
} else {
    $query = "SELECT commision.*, drprofile.firstName, drprofile.lastName
              FROM commision
              INNER JOIN drprofile ON commision.doct_id = drprofile.id
              ORDER BY commision.created_at DESC";
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
