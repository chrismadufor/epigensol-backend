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
  $description =  $_POST['description'];
      $description =  str_replace("'", "\\'", $description);
  $whatsAppNo=$_POST['whatsAppNo'];
    $subTitle =  $_POST['subTitle'];
    $subTitle =  str_replace("'", "\\'", $subTitle);
  $profileImageUrl=$_POST['profileImageUrl'];
     $address =  $_POST['address'];
        $address =  str_replace("'", "\\'", $address);
       $aboutUs =  $_POST['aboutUs'];
           $aboutUs =  str_replace("'", "\\'", $aboutUs);
   $hName=$_POST['hName'];
        $hName =  str_replace("'", "\\'", $hName);
  $lot=$_POST['lot'];
  $lct=$_POST['lct'];
     $fee=$_POST['fee'];
$deptId=$_POST['deptId'];
$cityId=$_POST['cityId'];
$clinicId=$_POST['clinicId'];
$serviceTime=$_POST['serviceTime'];
  $stopBooking=$_POST['stopBooking'];
  $opt=$_POST['opt'];
$clt=$_POST['clt'];
$dayCode=$_POST['dayCode'];
$comission_per = $_POST['comission_per'] ?? 100;
$fee_video=$_POST['fee_video'];
$fee_follow_up=$_POST['fee_follow_up'];
$fee_follow_up_video=$_POST['fee_follow_up_video'];
$userdata= array();
$result=$conn->query("SELECT *  FROM `drprofile` where `email`='$email' AND `isDeleted`=false");
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;
}
    if(count($data)>0){
  
        	$userdata['status'] = 'true';
        				$userdata['msg'] = 'already exists';
    }else{
   $updatedTimeStamp = date("Y-m-d H:i:s"); 
  
  $insert = mysqli_query($conn,
  "INSERT INTO `drprofile`(
  `firstName`,
  `lastName`,
  `email`,
  `pass`,
  `pNo1`,
  `pNo2`,
  `description`,
  `whatsAppNo`,
  `subTitle`,
  `profileImageUrl`,
  `address`,
  `aboutUs`,
    `hName`,
  `lot`,
  `lct`,
  `fee`,
    `deptId`,
    `clinic_id`,
    `city_id`,
        `stopBooking`,
       `opt`,
  `clt`,
  `dayCode`,
    `timeInt`,
     `fee_video`,
  `fee_follow_up`,
    `fee_follow_up_video`,
  `updatedTimeStamp`,
  `comission_per`
      )
      VALUES(

'$firstName',
'$lastName',
'$email',
'$pass',
'$pNo1',
'$pNo2',
'$description',
'$whatsAppNo',
'$subTitle',
'$profileImageUrl',
'$address',
'$aboutUs',
'$hName',
'$lot',
'$lct',
'$fee',
'$deptId',
'$clinicId',
'$cityId',
'$stopBooking',
  '$opt',
 '$clt',
'$dayCode',
'$serviceTime',
 '$fee_video',
'$fee_follow_up',
'$fee_follow_up_video',
'$updatedTimeStamp',
'$comission_per'
      
      )"
            );
            
 
    if($insert){
        	$userdata['status'] = 'true';
				$userdata['id'] = $conn->insert_id;
					$userdata['msg'] = 'added';
               
    }
    else{
        	$userdata['status'] = 'false';
        				$userdata['msg'] = 'error';
        
    }
    }
     echo json_encode($userdata);
    $conn->close();
    return;

?>
