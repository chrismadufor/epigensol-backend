<?php

require('config.php');

   $appointmentDate=$_POST['appointmentDate'];
   $appointmentTime=$_POST['appointmentTime'];
   $appointmentStatus=$_POST['appointmentStatus'];
   $id=$_POST['id'];
      $date_c=$_POST['date_c'];
   $updatedTimeStamp = date("Y-m-d H:i:s"); 
  
  $sql= "UPDATE `appointments` SET
  `appointmentStatus` = '$appointmentStatus',
  `appointmentTime`='$appointmentTime',
  `appointmentDate`='$appointmentDate',
  `date_c`='$date_c',
  `updatedTimeStamp` = '$updatedTimeStamp'
 
  WHERE `appointments`.`id` = $id";

  $update = mysqli_query($conn,$sql);
            
 
    if($update){
               
                echo "success";
    }
    else{
        echo "error";
        
    }
    $conn->close();
    return;

?>