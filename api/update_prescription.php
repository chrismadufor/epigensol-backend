<?php

require('config.php');

  
  $id=$_POST['id'];
  $imageUrl=$_POST['imageUrl'];
  $drName=$_POST['drName'];
  $patientName=$_POST['patientName'];
  $prescription=$_POST['prescription'];
  $updatedTimeStamp = date("Y-m-d H:i:s"); 
  
  
   $sql="UPDATE `prescription` SET
  `imageUrl`='$imageUrl',
  `drName`='$drName',
  `patientName`='$patientName',
  `prescription`='$prescription',
  `updatedTimeStamp`='$updatedTimeStamp'

   WHERE `prescription`.`id` = '$id'";
  

  $update = mysqli_query($conn,$sql );
            

 
    if($update){
               
                echo "success";
    }
    else{
        echo "error";
        
    }
    $conn->close();
    return;

?>