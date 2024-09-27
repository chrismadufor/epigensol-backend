<?php

require('config.php');

 $status=$_GET["status"];
  $statusDoct=$_GET["doctList"];

  $firstDate=$_GET["firstDate"];
  $lastDate=$_GET["lastDate"];
    $limit=$_GET["limit"];
  
 $array=array_map('strval', explode(',', $status));
 $array = implode("','",$array);
  $array2=array_map('strval', explode(',', $statusDoct));
 $array2= implode("','",$array2);


if($firstDate=="All"&&$lastDate=="All" ){
    if(($statusDoct==""))
      $result=mysqli_query($conn,"select * from appointments where  `appointmentStatus` IN ('".$array."') 
      ORDER BY STR_TO_DATE(appointmentDate,'%m-%d-%Y') DESC, appointmentTime DESC LIMIT $limit");//appointmentDate DESC 
      else
          $result=mysqli_query($conn,"select * from appointments where `appointmentStatus` IN ('".$array."') AND  `doctId` IN ('".$array2."')
      ORDER BY STR_TO_DATE(appointmentDate,'%m-%d-%Y') DESC, appointmentTime DESC  LIMIT $limit");// updatedTimeStamp DESC,
}
else{
      if($statusDoct=="")
      {
        
        
               
                         $result=mysqli_query($conn,"select * from appointments where  `appointmentStatus` IN ('".$array."') AND date_c >='$firstDate' AND date_c <= '$lastDate' ORDER BY STR_TO_DATE(appointmentDate,'%m-%d-%Y') DESC, appointmentTime DESC LIMIT $limit");
      }
 
      else
      {
             $result=mysqli_query($conn,"select * from appointments where  `appointmentStatus` IN ('".$array."') AND date_c >='$firstDate' AND date_c <= '$lastDate' AND `doctId` IN ('".$array2."') ORDER BY STR_TO_DATE(appointmentDate,'%m-%d-%Y') DESC, appointmentTime DESC LIMIT $limit");
          
      }
}


$data=array();
while($row=$result->fetch_assoc()){

    $data[]=$row;

}

echo json_encode($data);

$conn->close();
return;
?>