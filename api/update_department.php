<?php

require('config.php');

   $name=$_POST['name'];
   $imageUrl=$_POST['imageUrl'];
   $id=$_POST['id'];
   $clinicId=$_POST['clinicId'];
   $cityId=$_POST['cityId'];

$result=$conn->query("SELECT *  FROM `department` where `name`='$name' AND `id`!='$id' AND `isDeleted`=false AND `clinic_id`='$clinicId' AND `city_id`='$cityId' ");
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;
}
    if(count($data)>0){
        echo "already exists";
    }else {

  $sql= "UPDATE `department` SET
  `name` = '$name',
  `imageUrl` = '$imageUrl'
 
  WHERE `department`.`id` = $id";

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