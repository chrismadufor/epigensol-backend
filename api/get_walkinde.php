<?php

require('config.php');
$deptId=$_GET['deptId'];
$clinicId=$_GET['clinicId'];
$cityId=$_GET['cityId'];

$result=$conn->query("SELECT * FROM `drprofile` WHERE `deptId`='$deptId' AND `clinic_id`='$clinicId' AND  `city_id`='$cityId' AND  `isDeleted`=false AND `stopWalkIn`=false");
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;

}
echo json_encode($data);
$conn->close();
return;
?>
