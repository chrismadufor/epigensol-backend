<?php

require('config.php');

   $primary_complaints=mysqli_real_escape_string($conn,$_POST['primary_complaints']);
      $history=mysqli_real_escape_string($conn,$_POST['history']);
         $assessment=mysqli_real_escape_string($conn,$_POST['assessment']);
            $diagnosis=mysqli_real_escape_string($conn,$_POST['diagnosis']);
               $plan_of_treatment=mysqli_real_escape_string($conn,$_POST['plan_of_treatment']);
                  $past_medical_history=mysqli_real_escape_string($conn,$_POST['past_medical_history']);
                  
   $notes=mysqli_real_escape_string($conn,$_POST['notes']);
    $pName=mysqli_real_escape_string($conn,$_POST['pName']);
    
      $uid=$_POST['uid'];
            $appId=$_POST['appId'];
         $doct_id=$_POST['doct_id'];
 
         
   $createdTimeStamp = date("Y-m-d H:i:s"); 


          $insert = mysqli_query($conn,
  "INSERT INTO `medical_record`(
   uid,
      primary_complaints,
      history,
      assessment,
      diagnosis,
      plan_of_treatment,
      past_medical_history,
         notes,
      doct_id,
         created_time_stamp,
      updated_time_stamp,
      isDeleted,
      pName,
      appId
      )
      VALUES(
   '$uid',
   '$primary_complaints',
   '$history',
   '$assessment',
   '$diagnosis',
   '$plan_of_treatment',
   '$past_medical_history',
   '$notes',
   '$doct_id',
      '$createdTimeStamp',
         '$createdTimeStamp',
   'false',
   '$pName',
   '$appId'
 
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