<?php

require('config.php');

   $appointmentStatus=$_POST['appointmentStatus'];
   $id=$_POST['id'];
   $updatedTimeStamp = date("Y-m-d H:i:s"); 
  
  $sql= "UPDATE `appointments` SET
  `appointmentStatus` = '$appointmentStatus',
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