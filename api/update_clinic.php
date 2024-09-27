<?php

require('config.php');

   $name=$_POST['name'];
   $imageUrl=$_POST['imageUrl'];
   $id=$_POST['id'];
      $gUrl=$_POST['gUrl'];
           $cityId=$_POST['cityId'];
                      $number_reveal=$_POST['number_reveal'];

$result=$conn->query("SELECT *  FROM `clinic` where `title`='$name' AND `id`!='$id' AND `isDeleted`=false AND `city_id`='$cityId'");
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;
}
    if(count($data)>0){
        echo "already exists";
    }else {
  $sql= "UPDATE `clinic` SET
  `title` = '$name',
  `imageUrl` = '$imageUrl',
  `location`='$gUrl',
  `number_reveal`='$number_reveal'
  WHERE `clinic`.`id` = $id";

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