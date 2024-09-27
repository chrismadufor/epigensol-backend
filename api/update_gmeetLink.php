<?php

require('config.php');

  $gMeetLink=$_POST['gMeetLink'];
  $id=$_POST['id'];

  

$sql = "UPDATE `appointments` SET `gMeetLink` = '$gMeetLink' WHERE `appointments`.`id` = '$id'";
  

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