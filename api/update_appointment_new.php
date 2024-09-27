<?php

require('config.php');
      $id=$_POST['id'];
      $pCity=$_POST['pCity'];
      $age=$_POST['age'];
      $pEmail=$_POST['pEmail'];
      $pFirstName=$_POST['pFirstName'];
      $pLastName=$_POST['pLastName'];
      $pPhn=$_POST['pPhn'];
      $description=$_POST['description'];
      $searchByName=$_POST['searchByName'];
       $gender=$_POST['gender'];
       
     $appointmentStatus=$_POST['appointmentStatus'];
        $appointmentDate=$_POST['appointmentDate'];
   $appointmentTime=$_POST['appointmentTime'];
 $date_c=$_POST['date_c'];
 
      $gmeetLink=$_POST['gmeetLink'];
        $meetingId=$_POST['meetingId'];
   $serviceName=$_POST['serviceName'];
 $serviceTimeMin=$_POST['serviceTimeMin'];
      $amount=$_POST['amount'];
        $paymentMode=$_POST['paymentMode'];
   $paymentDate=$_POST['paymentDate'];
 $paymentStatus=$_POST['paymentStatus'];
      $isOnline=$_POST['isOnline'];
        $doct_fee=$_POST['doct_fee'];


 
      $updatedTimeStamp = date("Y-m-d H:i:s"); 

  $sql= "UPDATE `appointments` SET
      `updatedTimeStamp` = '$updatedTimeStamp',
      `pCity`='$pCity',
      `age`='$age',
      `pEmail`='$pEmail',
      `gender`='$gender',
      `pFirstName`='$pFirstName',
      `pLastName`='$pLastName',
      `pPhn`='$pPhn',
      `description`='$description',
      `searchByName`='$searchByName',
       `appointmentStatus`='$appointmentStatus',
             `appointmentDate`='$appointmentDate',
      `appointmentTime`='$appointmentTime',
       `date_c`='$date_c',
       
         `gmeetLink`='$gmeetLink',
      `meetingId`='$meetingId',
      `serviceName`='$serviceName',
      `serviceTimeMin`='$serviceTimeMin',
      `amount`='$amount',
      `paymentMode`='$paymentMode',
       `paymentDate`='$paymentDate',
             `paymentStatus`='$paymentStatus',
      `appointmentTime`='$isOnline',
       `doct_fee`='$doct_fee'
 
  WHERE `appointments`.`id` = $id";

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