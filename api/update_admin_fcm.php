<?php

require('config.php');

  $fcmId=$_POST['fcmId'];


$sql = "UPDATE `aboutus` SET `fcmId` = '$fcmId' WHERE `aboutus`.`id` = 1";
  

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