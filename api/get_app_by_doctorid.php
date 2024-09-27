<?php

require('config.php');

 $status=$_GET["status"];
 $doctId=$_GET["doctId"];
  $firstDate=$_GET["firstDate"];
  $lastDate=$_GET["lastDate"];
    $limit=$_GET["limit"];
  
 $array=array_map('strval', explode(',', $status));
 $array = implode("','",$array);
 
if($firstDate=="All"&&$lastDate=="All" ){
      $result=mysqli_query($conn,"select * from appointments where  `appointmentStatus` IN ('".$array."') AND `doctId`='$doctId' ORDER BY STR_TO_DATE(appointmentDate,'%m-%d-%Y') DESC, appointmentTime DESC LIMIT $limit");
}
else{
      $result=mysqli_query($conn,"select * from appointments where  `appointmentStatus` IN ('".$array."') AND date_c >='$firstDate' AND date_c <= '$lastDate' AND `doctId`='$doctId' ORDER BY STR_TO_DATE(appointmentDate,'%m-%d-%Y') DESC, appointmentTime DESC LIMIT $limit");
}


$data=array();
while($row=$result->fetch_assoc()){

    $data[]=$row;

}

echo json_encode($data);

$conn->close();
return;
?>