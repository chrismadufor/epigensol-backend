<?php

require('config.php');

  $id=$_POST['id'];
    $dbName=$_POST['dbName'];


$sql = "UPDATE `$dbName` SET `isDeleted` = true WHERE `$dbName`.`id` = '$id'";
  

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