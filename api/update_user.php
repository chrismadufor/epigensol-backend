<?php

require('config.php');

    $mrd=$_POST['mrd'];
  $firstName=$_POST['firstName'];
  $lastName=$_POST['lastName'];
  $city=$_POST['city'];
  $email=$_POST['email'];
  $imageUrl=$_POST['imageUrl'];
  $searchByName=$_POST['searchByName'];
  $age=$_POST['age'];
  $uId=$_POST['uId'];
    $gender=$_POST['gender'];
    $sql;

  $updatedTimeStamp = date("Y-m-d H:i:s"); 
  if($mrd==''){
         $sql="UPDATE `userList` SET
  `firstName`='$firstName',
  `lastName`='$lastName',
  `city`='$city',
  `email`='$email',
  `imageUrl`='$imageUrl',
  `searchByName`='$searchByName',
  `age`='$age',
  `gender`='$gender',
  `mrd`=NULL,
  `updatedTimeStamp`='$updatedTimeStamp'
 
   WHERE `userList`.`uId` = '$uId'";
      
  }else{
         $sql="UPDATE `userList` SET
  `firstName`='$firstName',
  `lastName`='$lastName',
  `city`='$city',
  `email`='$email',
  `imageUrl`='$imageUrl',
  `searchByName`='$searchByName',
  `age`='$age',
  `gender`='$gender',
  `mrd`='$mrd',
  `updatedTimeStamp`='$updatedTimeStamp'
 
   WHERE `userList`.`uId` = '$uId'";
      
  }
 

   $update = mysqli_query($conn,$sql );
            

 
    if($update){
               
                echo "success";
    }
    else{
        echo "error";
        
    }
    $conn->close();
    return;

?>