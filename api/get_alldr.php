<?php

require('config.php');
     $clinicId=$_GET['clinicId'];
      $cityId=$_GET['cityId'];
         $deptId=$_GET['deptId'];

$result=$conn->query("SELECT * FROM `drprofile` WHERE `clinic_id`='$clinicId' AND  `city_id`='$cityId'And  `deptId`='$deptId' AND `isDeleted`=false" );

$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;

}
echo json_encode($data);
$conn->close();
return;
?>
