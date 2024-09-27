<?php

require('config.php');

  $id=$_POST['id'];
  
  $qty=$_POST['qty'];


$sql = "UPDATE cart SET `qty` = '$qty' WHERE   cart.id = '$id' ";
  

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