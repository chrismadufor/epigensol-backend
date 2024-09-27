<?php

require('config.php');

  $fcmId=$_POST['fcmId'];
    $id=$_POST['id'];


$sql = "UPDATE `front_desk` SET `fcmId` = '$fcmId' WHERE `front_desk`.`id` = '$id'";
  

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