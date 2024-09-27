<?php

require('config.php');

   $name=$_POST['name'];
   $description=$_POST['description'];
   $imageUrl=$_POST['imageUrl'];
    $id=$_POST['id'];
  

   $updatedTimeStamp = date("Y-m-d H:i:s"); 


  
$sql = "UPDATE `testimonials` SET 
`name` = '$name',
`imageUrl` = '$imageUrl',
`description` = '$description',
`updatedTimeStamp` ='$updatedTimeStamp'
WHERE `testimonials`.`id` = '$id'";


  $update = mysqli_query($conn, $sql );
            
 
    if($update){
               
                echo "success";
    }
    else{
        echo "error";
        
    }
    $conn->close();
    return;

?>