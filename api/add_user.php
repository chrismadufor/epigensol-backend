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
  

  
$result=$conn->query("SELECT *  FROM `userList` where `phone`='$phone'");
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;
}
    if(count($data)>0){
        echo "already exists";
    }else {
        
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
               
                echo "success";
    }
    else{
        echo "error";
        
    }
    }

  
    $conn->close();
    return;

?>