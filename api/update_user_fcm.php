<?php

require('config.php');

  $uId=$_POST['uid'];
  $fcmId=$_POST['fcmId'];

  $updatedTimeStamp = date("Y-m-d H:i:s"); 
  

   $sql="UPDATE `userList` SET `fcmId` = '$fcmId' WHERE `userList`.`uId` = '$uId'";
  

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