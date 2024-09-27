<?php

require('config.php');
  $id=$_POST['id'];
  $long=$_POST['long'];
    $lat=$_POST['lat'];


$sql = "UPDATE `drprofile` SET
`latitude` = '$lat',
`longitude` = '$long'

WHERE `drprofile`.`id` = '$id'";
 

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