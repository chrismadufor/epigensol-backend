<?php

require('config.php');
  $uid=$_POST['uid'];
  $rating=$_POST['rating'];
  $review=$_POST['review'];
  $doct_id=$_POST['doct_id'];
  $app_id=$_POST['app_id'];
  
   $createdTimeStamp = date("Y-m-d H:i:s"); 
  
  $insert = mysqli_query($conn,
  "INSERT INTO `doctors_review`(
  `user_id`,
  `rating`,
  `review`,
  `doct_id`,
  `app_id`,
  `created_at`,
  `updated_at`
      )
      VALUES(

'$uid',
'$rating',
'$review',
'$doct_id',
'$app_id',
'$createdTimeStamp',
'$createdTimeStamp'
      
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