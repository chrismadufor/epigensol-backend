<?php

require('config.php');

  $selectedAns=$_POST['selectedAns'];
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
      $isFollowUp=$_POST['isFollowUp'];
  $paymentDate=date("Y-m-d H:i:s");  
       $image_url=$_POST['image_url'];
 

  $createdTimeStamp = date("Y-m-d H:i:s");  
  $updatedTimeStamp = date("Y-m-d H:i:s"); 
  $date_c=$_POST['date_c'];
  $statusCheck="Canceled";
  
 $dateList = explode(",", $appointmentDate);
$timeList = explode(",", $appointmentTime);
$idList=array();

for ($i = 0; $i < count($dateList); $i++){
    

  $result2=$conn->query("SELECT * FROM `appointments` where `cityId`='$cityId' AND `deptId`='$deptId' AND `clinicId`='$clinicId' AND `doctId`= '$doctId' AND `appointmentTime`='$timeList[$i]' AND `appointmentDate`='$dateList[$i]' AND `paymentStatus` != '$statusCheck' AND `appointmentStatus`!='Canceled' AND `appointmentStatus`!='Visited' AND `appointmentStatus`!='Rejected'");

  $data2=array();

 while($row2=$result2->fetch_assoc()){
    $data2[]=$row2;

}
       if(count($data2)>0){
       
            
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
      isFollowUp,
      selectedAns,
      image_url
      )
      VALUES(
     '$cityId',
          '$deptId',
    '$clinicId',
 '$dateList[$i]',
 '$appointmentStatus',
 '$timeList[$i]',
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
     '$isFollowUp',
     '$selectedAns',
     '$image_url'
      
      )"
            );
            
 
  $last_id = mysqli_insert_id($conn);

    if($insert){
       
          $idList[]=array(
        "id" => $last_id,
        "date" => $dateList[$i],
        "time" => $timeList[$i]
    );
   
           
        if(isset($amount)){
          
            if($amount>0){
           
                $result=$conn->query("SELECT * FROM `setting` where id = 1");
                    $data=array();
                    while($row=$result->fetch_assoc()){
                        $data[]=$row;
                    
                    }
                    if(count($data)>0){
                   
                        $comission_per=$data[0]['value'];
                        $calculated_new_price=($amount*$comission_per)/100;
                           $calculated_new_price_round = round($calculated_new_price, 2);
                           
                                     $insert = mysqli_query($conn,
                                  "INSERT INTO `commision`(
                                      app_id,
                                      doct_id,
                                       app_price,
                                      comm_price,
                                       comm_per,
                                      created_at,
                                       updated_at
                               
                                      )
                                      VALUES(
                                   '$last_id',
                                   '$doctId',
                                   '$amount',
                                   '$calculated_new_price_round',
                                   '$comission_per',
                                   '$createdTimeStamp',
                                   '$createdTimeStamp'
                                      
                                      )"
                                            );
                                             
                        
                    }
                
            }
                
            }
        
               
                   
    }
    else{
       
        
    }
            
        }
  }
  
      echo json_encode($idList);
    $conn->close();
    return;

?>