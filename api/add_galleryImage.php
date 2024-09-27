<?php

require('config.php');

   $imageUrl=$_POST['imageUrl'];
   
   $createdTimeStamp = date("Y-m-d H:i:s");  
   $updatedTimeStamp = date("Y-m-d H:i:s"); 
  
  $insert = mysqli_query($conn,
  "INSERT INTO `gallery`(
   imageUrl,
    createdTimeStamp,
    updatedTimeStamp
      )
      VALUES(

   '$imageUrl',
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