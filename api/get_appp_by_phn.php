<?php

require('config.php');

$phn=$_GET["phn"];
$date=$_GET["date"];

$result=$conn->query("SELECT * FROM `appointments` WHERE  `pPhn` = '$phn' AND `appointmentDate`='$date' AND  `appointmentStatus`!='Canceled' AND`appointmentStatus`!='Visited' AND`appointmentStatus`!='Rejected'");
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;

}
echo json_encode($data);
$conn->close();
return;
?>



