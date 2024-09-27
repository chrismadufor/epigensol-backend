<?php

require('config.php');

  $fcmId=$_POST['fcmId'];
    $id=$_POST['id'];


$sql = "UPDATE `drprofile` SET `fcmId` = '$fcmId' WHERE `drprofile`.`id` = '$id'";
  

  $insert = mysqli_query($conn,$sql
         );
            
  
 
    if($insert){
               
                echo "success";
    }
    else{
        echo "error";
        
    }
    $conn->close();
    return;

?>