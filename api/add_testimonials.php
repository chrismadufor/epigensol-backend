<?php

require('config.php');

   $name=$_POST['name'];
   $description=$_POST['description'];
   $imageUrl=$_POST['imageUrl'];
   
   $createdTimeStamp = date("Y-m-d H:i:s");  
   $updatedTimeStamp = date("Y-m-d H:i:s"); 
  

  

  $insert = mysqli_query($conn,
  "INSERT INTO `testimonials`(
   name,
   description,
   imageUrl,
    createdTimeStamp,
    updatedTimeStamp
      )
      VALUES(

   '$name',
   '$description',
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