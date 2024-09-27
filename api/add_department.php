<?php

require('config.php');

   $name=$_POST['name'];
   $imageUrl=$_POST['imageUrl'];
     $clinicId=$_POST['clinicId'];
      $cityId=$_POST['cityId'];

$result=$conn->query("SELECT *  FROM `department` where `name`='$name' AND `isDeleted`=false AND `clinic_id`='$clinicId' AND `city_id`='$cityId' ");
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;
}
    if(count($data)>0){
        echo "already exists";
    }else {

  $insert = mysqli_query($conn,
  "INSERT INTO `department`(
   name,
      imageUrl,
      clinic_id,
      city_id
      )
      VALUES(
   '$name',
   '$imageUrl',
   '$clinicId',
   '$cityId'
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