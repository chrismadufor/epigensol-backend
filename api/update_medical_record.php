<?php

require('config.php');

   $notes=mysqli_real_escape_string($conn,$_POST['notes']);
    $pName=mysqli_real_escape_string($conn,$_POST['pName']);
        $id=$_POST['id'];
    
            $primary_complaints=mysqli_real_escape_string($conn,$_POST['primary_complaints']);
      $history=mysqli_real_escape_string($conn,$_POST['history']);
         $assessment=mysqli_real_escape_string($conn,$_POST['assessment']);
            $diagnosis=mysqli_real_escape_string($conn,$_POST['diagnosis']);
               $plan_of_treatment=mysqli_real_escape_string($conn,$_POST['plan_of_treatment']);
                  $past_medical_history=mysqli_real_escape_string($conn,$_POST['past_medical_history']);
   $createdTimeStamp = date("Y-m-d H:i:s"); 
   
   $sql = "UPDATE `medical_record` SET
`primary_complaints` = '$primary_complaints',
`history` = '$history',
`assessment` = '$assessment',
`diagnosis` = '$diagnosis',
`plan_of_treatment` = '$plan_of_treatment',
`past_medical_history` = '$past_medical_history',
`notes` = '$notes',
`pName` = '$pName'

WHERE `medical_record`.`id` = '$id'";
 

   $insert = mysqli_query($conn,$sql);
            
 
    if($insert){
               
                echo "success";
    }
    else{
        echo "error";
        
    }
    


    $conn->close();
    return;

?>



<?php

require('config.php');
  $id=$_POST['id'];
  $long=$_POST['long'];
    $lat=$_POST['lat'];


$sql = "UPDATE `drprofile` SET
`latitude` = '$lat',
`longitude` = '$long'

WHERE `drprofile`.`id` = '$id'";
 

  $insert = mysqli_query($conn,$sql
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