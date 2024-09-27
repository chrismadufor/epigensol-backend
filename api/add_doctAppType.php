<?php

require('config.php');

   $doctId=$_POST['doctId'];
   $appointmentTypeId=$_POST['appointmentTypeId'];
  
    $insert = mysqli_query($conn,
  "INSERT INTO `doctAptype`(
   doctId,
    appointmentTypeId
      )
      VALUES(

   '$doctId',
   '$appointmentTypeId'
      
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