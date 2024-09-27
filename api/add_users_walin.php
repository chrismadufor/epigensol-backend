<?php

require('config.php');

  
  $firstName=$_POST['firstName'];
  $lastName=$_POST['lastName'];
  $uId=$_POST['uId'];
  $city=$_POST['city'];
  $email=$_POST['email'];
  $fcmId=$_POST['fcmId'];
  $imageUrl=$_POST['imageUrl'];
  $pNo=$_POST['pNo'];
  $searchByName=$_POST['searchByName'];
  $age=$_POST['age'];
    $gender=$_POST['gender'];
        $phone=$_POST['phone'];
  

  $createdTimeStamp = date("Y-m-d H:i:s");  
  $updatedTimeStamp = date("Y-m-d H:i:s"); 
  
$userdata=array();
  

  $insert = mysqli_query($conn,
  "INSERT INTO `userList`(
     firstName,
     lastName,
     uId,
     city,
     email,
     fcmId,
     imageUrl,
     pNo,
     searchByName,
     age,
     gender,
     phone,
     createdTimeStamp,
     updatedTimeStamp
      )
      VALUES(
     '$firstName',
     '$lastName',
     '$uId',
     '$city',
     '$email',
     '$fcmId',
     '$imageUrl',
     '$pNo',
     '$searchByName',
     '$age',
     '$gender',
     '$phone',
     '$createdTimeStamp',
     '$updatedTimeStamp'
      
      )"
            );
            

 
    if($insert){
        $lastId= $conn->insert_id;
$sql = "UPDATE `userList` SET `uId` = '$lastId' WHERE `userList`.`id` = '$lastId'";
  

  $insert = mysqli_query($conn,$sql );
            
              	$userdata['status'] = 'true';
				$userdata['id'] = $lastId;
					$userdata['msg'] = 'added';
               
      
    }
    else{
       	$userdata['status'] = 'false';
					$userdata['msg'] = 'error';
        
    }
    echo json_encode($userdata);
    $conn->close();
    return;

?>
