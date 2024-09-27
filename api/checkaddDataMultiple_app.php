<?php

require('config.php');

$doctId=$_GET["doctId"];
$date=$_GET["date"];
$time=$_GET["time"];
$dateList = explode(",", $date);
$timeList = explode(",", $time);

$data=array();
 $subData[]=array();
for ($i = 0; $i < count($dateList); $i++){
    $subData[]=[];
       $result=mysqli_query($conn,"select * from appointments where
    `doctId` = '$doctId' AND    `appointmentDate` = '$dateList[$i]' AND `appointmentTime` = '$timeList[$i]' AND appointmentStatus!='Canceled'");


  while ($row = $result->fetch_assoc()) {
        $data[] = $row;

    }
  

    
    
}

echo json_encode($data);
$conn->close();
return;
?>


