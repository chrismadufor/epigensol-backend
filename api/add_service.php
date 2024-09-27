<?php

require('config.php');

   $imageUrl=$_POST['imageUrl'];
   $url=$_POST['url'];
   $createdTimeStamp = date("Y-m-d H:i:s");  
   $updatedTimeStamp = date("Y-m-d H:i:s"); 
  
   $title = mysqli_real_escape_string($conn, $_POST['title']);
   $subTitle = mysqli_real_escape_string($conn, $_POST['subTitle']);
   $description = mysqli_real_escape_string($conn, $_POST['description']);

  $insert = mysqli_query($conn,
  "INSERT INTO `service`(
   title,
    subTitle,
      imageUrl,
      description,
      url,
 
    createdTimeStamp,
    updatedTimeStamp
      )
      VALUES(

   '$title',
   '$subTitle',
   '$imageUrl',
    '$description',
      '$url',
   '$createdTimeStamp',
   '$updatedTimeStamp'
   
      
      )"
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