<?php

require('config.php');

$doctId=$_GET["doctId"];
$date=$_GET["date"];
$time=$_GET["time"];

    $result=mysqli_query($conn,"select * from appointments where
    `doctId` = '$doctId' AND    `appointmentDate` = '$date' AND `appointmentTime` = '$time' AND appointmentStatus!='Canceled'");

$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;

}

echo json_encode($data);
$conn->close();
return;
?>


