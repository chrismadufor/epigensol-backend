<?php

require('config.php');

   $title=$_POST['title'];
   $forTimeMin=$_POST['forTimeMin'];
   $imageUrl=$_POST['imageUrl'];
   $id=$_POST['id'];
   $subTitle=$_POST['subTitle'];
   $openingTime=$_POST['openingTime'];
   $closingTime=$_POST['closingTime'];
      $day=$_POST['day'];
   
   $updatedTimeStamp = date("Y-m-d H:i:s"); 
  

  $sql= "UPDATE `appointmentType` SET
  `updatedTimeStamp` = '$updatedTimeStamp',
  `title` = '$title',
    `subTitle` = '$subTitle',
   `forTimeMin` = '$forTimeMin',
  `imageUrl` = '$imageUrl',
  `day`='$day',
  `openingTime` = '$openingTime',
  `closingTime` = '$closingTime'
  
 
  WHERE `appointmentType`.`id` = $id";

            

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
  
  
   