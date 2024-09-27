<?php

require('config.php');

  $appointmentId=$_POST['appointmentId'];
  $patientId=$_POST['patientId'];
  $appointmentTime=$_POST['appointmentTime'];
  $appointmentDate=$_POST['appointmentDate'];
  $appointmentName=$_POST['appointmentName'];
  $imageUrl=$_POST['imageUrl'];
  $drName=$_POST['drName'];
  $patientName=$_POST['patientName'];
  $prescription=$_POST['prescription'];
  $updatedTimeStamp = date("Y-m-d H:i:s"); 
  $createdTimeStamp = date("Y-m-d H:i:s");  
  

  $insert = $conn->query(
  "INSERT INTO `prescription`(
  `appointmentId`,
  `patientId`,
  `appointmentTime`,
  `appointmentDate`,
  `appointmentName`,
  `imageUrl`,
   `drName`,
  `patientName`,
  `prescription`,
  `updatedTimeStamp`,
  `createdTimeStamp`
  )
      VALUES(
      
  '$appointmentId',
  '$patientId',
  '$appointmentTime',
  '$appointmentDate',
  '$appointmentName',
  '$imageUrl',
  '$drName',
  '$patientName',
  '$prescription',
  '$updatedTimeStamp',
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