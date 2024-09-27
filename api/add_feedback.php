<?php

require('config.php');
  $uid=$_POST['uid'];
  $name=$_POST['name'];
  $phn=$_POST['phn'];
  $feedback_text=$_POST['feedback_text'];
   $createdTimeStamp = date("Y-m-d H:i:s"); 
  
  $insert = mysqli_query($conn,
  "INSERT INTO `feedback`(
  `uid`,
  `name`,
  `phn`,
  `feedback_text`,
  `created_time_stamp`
      )
      VALUES(

'$uid',
'$name',
'$phn',
'$feedback_text',
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