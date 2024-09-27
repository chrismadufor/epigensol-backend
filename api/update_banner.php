<?php

require('config.php');

   $banner=$_POST['banner'];
   $imageUrl=$_POST['imageUrl'];
   $id=$_POST['id'];
   $updatedTimeStamp = date("Y-m-d H:i:s"); 
  

$sql = "UPDATE `bannerImage` SET 
`$banner` = '$imageUrl' WHERE `bannerImage`.`id` = '$id'";
 

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
  
  
   