<?php
require('config.php');
$doctId=$_GET['doct_id'];
$month=$_GET['month'];
$year=$_GET['year'];

$query = "SELECT doct_payments.*,
drprofile.firstName,
drprofile.lastName

From doct_payments
INNER JOIN drprofile ON drprofile.id=doct_payments.doct_id
WHERE doct_payments.doct_id = '$doctId' AND  doct_payments.month = '$month' AND doct_payments.year = '$year'
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
