<?php

require('config.php');

  $uId=$_POST['uid'];
  $lat=$_POST['lat'];
  $long=$_POST['long'];
  
  

   $sql="UPDATE `userList` SET `latitude` = '$lat',
   `longitude` = '$long'
   WHERE `userList`.`uId` = '$uId'";
  

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