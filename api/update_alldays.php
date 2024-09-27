<?php

require('config.php');

  $id=$_POST['id'];
  $all_day=$_POST['all_day'];

$sql = "UPDATE `closing_date` SET `all_day` = '$all_day' WHERE `closing_date`.`id` = '$id'";
  

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