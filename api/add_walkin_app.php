<?php

require('config.php');

  $appointmentDate=$_POST['appointmentDate'];
  $appointmentStatus=$_POST['appointmentStatus'];
  $appointmentTime=$_POST['appointmentTime'];
  $pCity=$_POST['pCity'];
  $age=$_POST['age'];
  $pEmail=$_POST['pEmail'];
  $pFirstName=$_POST['pFirstName'];
  $pLastName=$_POST['pLastName'];
  $serviceName=$_POST['serviceName'];
  $serviceTimeMin=$_POST['serviceTimeMin'];
  $uId=$_POST['uId'];
  $pPhn=$_POST['pPhn'];
  $description=$_POST['description'];
  $searchByName=$_POST['searchByName'];
  $uName=$_POST['uName'];
  $gender=$_POST['gender'];
  $doctName=$_POST['doctName'];
 $department=$_POST['department'];
 $hName=$_POST['hName'];
  $doctId=$_POST['doctId'];
    $orderId=$_POST['orderId'];
      $isOnline=$_POST['isOnline'];
         $amount=$_POST['amount'];
          $paymentMode=$_POST['paymentMode'];
    $paymentStatus=$_POST['paymentStatus'];
      $cityId=$_POST['cityId'];
          $deptId=$_POST['deptId'];
    $clinicId=$_POST['clinicId'];
  $paymentDate=date("Y-m-d H:i:s");  
 

  $createdTimeStamp = date("Y-m-d H:i:s");  
  $updatedTimeStamp = date("Y-m-d H:i:s"); 
  $date_c=$_POST['date_c'];
  $statusCheck="Canceled";
  
  $result2=$conn->query("SELECT * FROM `appointments` where `cityId`='$cityId' AND `deptId`='$deptId' AND `clinicId`='$clinicId' AND `doctId`= '$doctId' AND `appointmentTime`='$appointmentTime' AND `appointmentDate`='$appointmentDate' AND `paymentStatus` != '$statusCheck' AND `appointmentStatus`!='Canceled' AND `appointmentStatus`!='Visited' AND `appointmentStatus`!='Rejected'");

  $data2=array();

 while($row2=$result2->fetch_assoc()){
    $data2[]=$row2;

}
       if(count($data2)>0){
           echo "error";
            
        }else{
                $insert = mysqli_query($conn,
  "INSERT INTO `appointments`(
  cityId,
  deptId,
  clinicId,
      appointmentDate,
      appointmentStatus,
      appointmentTime,
      pCity,
      age,
      pEmail,
      pFirstName,
      pLastName,
      serviceName,
      serviceTimeMin,
      uId,
      pPhn,
      description,
      searchByName,
      uName,
      gender,
      doctName,
      department,
      hName,
      doctId,
      createdTimeStamp,
      updatedTimeStamp,
         amount,
      orderId,
      paymentMode,
      paymentStatus,
      paymentDate,
      isOnline,
      date_c,
      walkin
      )
      VALUES(
     '$cityId',
          '$deptId',
    '$clinicId',
 '$appointmentDate',
 '$appointmentStatus',
 '$appointmentTime',
 '$pCity',
  '$age',
  '$pEmail',
  '$pFirstName',
  '$pLastName',
  '$serviceName',
  '$serviceTimeMin',
  '$uId',
  '$pPhn',
  '$description',
  '$searchByName',
  '$uName',
  '$gender',
  '$doctName',
  '$department',
  '$hName',
  '$doctId',
  '$createdTimeStamp',
   '$updatedTimeStamp',
       '$amount',
    '$orderId',
    '$paymentMode',
    '$paymentStatus',
   '$paymentDate',
     '$isOnline',
     '$date_c',
     true
      
      )"
            );
            
      $last_id = mysqli_insert_id($conn);
 
    if($insert){
               
                echo "$last_id";
    }
    else{
        echo "error";
        
    }
            
        }
  
 
    $conn->close();
    return;

?>