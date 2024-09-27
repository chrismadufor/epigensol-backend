<?php

require('config.php');

 $status=$_GET["status"];

  $firstDate=$_GET["firstDate"];
  $lastDate=$_GET["lastDate"];
  $clinicId=$_GET["clinicId"];
//    $limit=$_GET["limit"];
  
 $array=array_map('strval', explode(',', $status));
 $array = implode("','",$array);
 

        if($firstDate=="All"&&$lastDate=="All" ){
      $result=mysqli_query($conn,"select * from appointments where  `clinicId`='$clinicId' AND `appointmentStatus` IN ('".$array."') 
      ORDER BY STR_TO_DATE(appointmentDate,'%m-%d-%Y') DESC, appointmentTime DESC");//LIMIT $limit
}
else{
      $result=mysqli_query($conn,"select * from appointments where  `clinicId`='$clinicId' AND `appointmentStatus` IN ('".$array."') AND date_c >='$firstDate' AND date_c <= '$lastDate' ORDER BY STR_TO_DATE(appointmentDate,'%m-%d-%Y') DESC, appointmentTime DESC");//LIMIT $limit
}
  
    



$data=array();
while($row=$result->fetch_assoc()){

    $data[]=$row;

}

echo json_encode($data);

$conn->close();
return;
?>