<?php

require('config.php');

  $app_id=$_POST['appid'];

$sql = "UPDATE `token` SET `isDeleted` = true WHERE `token`.`app_id` = '$app_id'";
  

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