<?php

require('config.php');

   $title=$_POST['title'];
   $forTimeMin=$_POST['forTimeMin'];
   $imageUrl=$_POST['imageUrl'];
    $subTitle=$_POST['subTitle'];
      $openingTime = $_POST['openingTime'];
  $closingTime = $_POST['closingTime'];
     $day=$_POST['day'];
 
   $createdTimeStamp = date("Y-m-d H:i:s");  
   $updatedTimeStamp = date("Y-m-d H:i:s"); 
 

  $insert = mysqli_query($conn,
  "INSERT INTO `appointmentType`(
   title,
    forTimeMin,
      imageUrl,
      subTitle,
      openingTime,
      closingTime,
      day,
     createdTimeStamp,
    updatedTimeStamp
      )
      VALUES(

   '$title',
   '$forTimeMin',
   '$imageUrl',
   '$subTitle',
   '$openingTime',
   '$closingTime',
   '$day',
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