<?php

require('config.php');

  $id=$_POST['id'];
    $value=$_POST['value'];


$sql = "UPDATE setting SET `value` = $value WHERE `id` = '$id'";
  

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