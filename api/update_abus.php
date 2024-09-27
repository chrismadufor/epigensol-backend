<?php

require('config.php');


  $firstName=$_POST['firstName'];
  $lastName=$_POST['lastName'];
  $email=$_POST['email'];
  $pNo1=$_POST['pNo1'];
  $pNo2=$_POST['pNo2'];
  $description=$_POST['description'];
  $whatsAppNo=$_POST['whatsAppNo'];
  $subTitle=$_POST['subTitle'];
  $profileImageUrl=$_POST['profileImageUrl'];
  $address=$_POST['address'];
  $aboutUs=$_POST['aboutUs'];
  $id=$_POST['id'];
   $hName=$_POST['hName'];
  $lot=$_POST['lot'];
  $lct=$_POST['lct'];
    $fee=$_POST['fee'];
$deptId=$_POST['deptId'];
$serviceTime=$_POST['serviceTime'];

  $stopBooking=$_POST['stopBooking'];
  $opt=$_POST['opt'];
$clt=$_POST['clt'];
$dayCode=$_POST['dayCode'];


   $updatedTimeStamp = date("Y-m-d H:i:s"); 
  
$sql = "UPDATE `aboutus` SET 

  `firstName`='$firstName',
  `lastName`='$lastName',
  `email`='$email',
  `pNo1`='$pNo1',
  `pNo2`='$pNo2',
  `description`='$description',
  `whatsAppNo`='$whatsAppNo',
  `subTitle`='$subTitle',
  `profileImageUrl`='$profileImageUrl',
  `fee`='$fee',
  `address`='$address',
  `aboutUs`='$aboutUs',
    `hName`='$hName',
  `lot`='$lot',
  `lct`='$lct',
    `deptId`='$deptId',
        `stopBooking`='$stopBooking',
       `opt`='$opt',
  `clt`='$clt',
  `dayCode`='$dayCode',
    `timeInt`='$serviceTime',
  `updatedTimeStamp` ='$updatedTimeStamp'
WHERE `aboutus`.`id` = '$id'";

  $update = mysqli_query($conn, $sql );
            
 
    if($update){
               
                echo "success";
    }
    else{
        echo "error";
        
    }
    $conn->close();
    return;

?>