<?php
require('config.php');


$query = "SELECT doct_payments.*,
drprofile.firstName,
drprofile.lastName

From doct_payments
INNER JOIN drprofile ON drprofile.id=doct_payments.doct_id
ORDER BY doct_payments.created_time_stamp DESC";


$result = $conn->query($query);
$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
$conn->close();
return;
?>
