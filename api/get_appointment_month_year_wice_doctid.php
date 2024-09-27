<?php

require('config.php');

 $month=$_GET["month"];
 $doctId=$_GET["doctId"];
  $year=$_GET["year"];
  
 $array=array_map('strval', explode(',', $status));
 $array = implode("','",$array);
 

      $result=mysqli_query($conn,"SELECT *
FROM appointments
WHERE doctId='$doctId' AND MONTH(createdTimeStamp) = '$month' AND YEAR(createdTimeStamp) = '$year'");



$data=array();
while($row=$result->fetch_assoc()){

    $data[]=$row;

}

echo json_encode($data);

$conn->close();
return;
?>