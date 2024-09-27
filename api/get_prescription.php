<?php
$uId=$_POST['uId'];

require('config.php');

$result=$conn->query("SELECT * FROM `prescription` where `patientId` = '$uId' ORDER BY createdTimeStamp DESC");
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;

}
echo json_encode($data);
$conn->close();
return;
?>
