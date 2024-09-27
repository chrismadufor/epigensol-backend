<?php

require('config.php');

   $imageUrl=$_POST['imageUrl'];
   $id=$_POST['id'];
   $url=$_POST['url'];
   $updatedTimeStamp = date("Y-m-d H:i:s"); 
   
      $title = mysqli_real_escape_string($conn, $_POST['title']);
   $subTitle = mysqli_real_escape_string($conn, $_POST['subTitle']);
   $description = mysqli_real_escape_string($conn, $_POST['description']);
  

  $sql= "UPDATE `service` SET
  `updatedTimeStamp` = '$updatedTimeStamp',
  `title` = '$title',
   `subTitle` = '$subTitle',
   `description`='$description',
  `imageUrl` = '$imageUrl',
    `url` = '$url'
 
  WHERE `service`.`id` = $id";

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