<?php

require('config.php');

   $name=$_POST['first_name'];
   $imageUrl=$_POST['imageUrl'];
      $lName=$_POST['last_name'];
         $clinicId=$_POST['clinicId'];
            $email=$_POST['email'];
      $pass=$_POST['pass'];
         
   $createdTimeStamp = date("Y-m-d H:i:s");  
$result=$conn->query("SELECT *  FROM `front_desk` where `email`='$email' AND `isDeleted`=false");
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;
}
    if(count($data)>0){
        echo "already exists";
    }else {
          $insert = mysqli_query($conn,
  "INSERT INTO `front_desk`(
   first_name,
      image_url,
      last_name,
      clinic_id,
      email,
      pass,
      created_time_stamp
      )
      VALUES(
   '$name',
   '$imageUrl',
   '$lName',
   '$clinicId',
   '$email',
   '$pass',
   '$createdTimeStamp'
      
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