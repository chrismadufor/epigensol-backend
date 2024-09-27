<?php

require('config.php');

  $uId=$_POST['uid'];

  $updatedTimeStamp = date("Y-m-d H:i:s"); 
  

   $sql="UPDATE `userList` SET `lastmsgtime` = '$updatedTimeStamp' WHERE `userList`.`id` = '$uId'";
  

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