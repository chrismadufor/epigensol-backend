<?php

require('config.php');

   $id=$_POST['id'];
   $status=$_POST['status'];


  $sql= "UPDATE `orders` SET
  `order_status` = '$status'
 
  WHERE `orders`.`id` = $id";

  $update = mysqli_query($conn,$sql);
            
 
    if($update){
               
                echo "success";
    }
    else{
        echo "error";
        
    }
    
    $conn->close();
    return;

?>