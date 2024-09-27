<?php

require('config.php');
  $firstName=$_POST['firstName'];
   $firstName =  str_replace("'", "\\'", $firstName);
  $lastName=$_POST['lastName'];
     $lastName =  str_replace("'", "\\'", $lastName);
  $email=$_POST['email'];

   $pass=$_POST['pass'];
  $pNo1=$_POST['pNo1'];
  $pNo2=$_POST['pNo2'];
  $description=$_POST['description'];
     $description =  str_replace("'", "\\'", $description);
  $whatsAppNo=$_POST['whatsAppNo'];
  $subTitle=$_POST['subTitle'];
     $subTitle =  str_replace("'", "\\'", $subTitle);
  $profileImageUrl=$_POST['profileImageUrl'];
  $address=$_POST['address'];
  $aboutUs=$_POST['aboutUs'];
     $aboutUs =  str_replace("'", "\\'", $aboutUs);
  $id=$_POST['id'];
   $hName=$_POST['hName'];
    $hName =  str_replace("'", "\\'", $hName);
  $lot=$_POST['lot'];
  $lct=$_POST['lct'];
    $fee=$_POST['fee'];
$deptId=$_POST['deptId'];
$serviceTime=$_POST['serviceTime'];

  $stopBooking=$_POST['stopBooking'];
  $opt=$_POST['opt'];
$clt=$_POST['clt'];
$dayCode=$_POST['dayCode'];
$stopWalkIn=$_POST['stopWalkIn'];
$wspd=$_POST['wspd'];

$fee_video=$_POST['fee_video'];
$fee_follow_up=$_POST['fee_follow_up'];
$fee_follow_up_video=$_POST['fee_follow_up_video'];

$comission_per = $_POST['comission_per'] ?? 100;


$result=$conn->query("SELECT *  FROM `drprofile` where `email`='$email' AND `id`!='$id' AND `isDeleted`=false");
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;
}
    if(count($data)>0){
        echo "already exists";
    }else{
   $updatedTimeStamp = date("Y-m-d H:i:s"); 
  
$sql = "UPDATE `drprofile` SET 

  `firstName`='$firstName',
  `lastName`='$lastName',
  `email`='$email',
  `pass`='$pass',
  `pNo1`='$pNo1',
  `pNo2`='$pNo2',
  `description`='$description',
  `whatsAppNo`='$whatsAppNo',
  `subTitle`='$subTitle',
  `profileImageUrl`='$profileImageUrl',
  `fee`='$fee',
  `address`='$address',
  `aboutUs`='$aboutUs',
`stopWalkIn` ='$stopWalkIn',
    `hName`='$hName',
  `lot`='$lot',
  `lct`='$lct',
    `deptId`='$deptId',
        `stopBooking`='$stopBooking',
       `opt`='$opt',
  `clt`='$clt',
  `dayCode`='$dayCode',
    `timeInt`='$serviceTime',
    `wspd`='$wspd',
    
      `fee_video`='$fee_video',
    `fee_follow_up`='$fee_follow_up',
    `fee_follow_up_video`='$fee_follow_up_video',
        `comission_per`='$comission_per',
    
  `updatedTimeStamp` ='$updatedTimeStamp'
WHERE `drprofile`.`id` = '$id'";

  $update = mysqli_query($conn, $sql );
            
 
    if($update){
               
                echo "success";
    }
    else{
        echo "error";
        
    }
    }
    $conn->close();
    return;

?>