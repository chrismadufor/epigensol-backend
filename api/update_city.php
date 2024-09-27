<?php

require('config.php');

   $name=$_POST['name'];
   $imageUrl=$_POST['imageUrl'];
   $id=$_POST['id'];

$result=$conn->query("SELECT *  FROM `city` where `cityName`='$name' AND `id`!='$id' AND `isDeleted`=false");
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;
}
    if(count($data)>0){
        echo "already exists";
    }else {

  $sql= "UPDATE `city` SET
  `cityName` = '$name',
  `imageUrl` = '$imageUrl'
 
  WHERE `city`.`id` = $id";

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