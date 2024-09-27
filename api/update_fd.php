<?php

require('config.php');
$id=$_POST['id'];
   $name=$_POST['first_name'];
   $imageUrl=$_POST['imageUrl'];
      $lName=$_POST['last_name'];
         $clinicId=$_POST['clinicId'];
            $email=$_POST['email'];
      $pass=$_POST['pass'];

$result=$conn->query("SELECT *  FROM `front_desk` where `email`='$email' AND `id`!='$id' AND `isDeleted`=false");
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;
}
    if(count($data)>0){
        echo "already exists";
    }else {
  $sql= "UPDATE `front_desk` SET
    first_name='$name',
      image_url='$imageUrl',
      last_name='$lName',
      clinic_id='$clinicId',
      email='$email',
      pass='$pass'
  WHERE `front_desk`.`id` = $id";

  $update = mysqli_query($conn,$sql);
            
 
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