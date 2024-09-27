<?php

require('config.php');

   $name=$_POST['title'];
   $id=$_POST['id'];
      $updatedTimeStamp = date("Y-m-d H:i:s"); 

$result=$conn->query("SELECT *  FROM `product_cat` where `title`='$name' AND `id`!='$id'");
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;
}
    if(count($data)>0){
        echo "already exists";
    }else {

  $sql= "UPDATE `product_cat` SET
  `title` = '$name',
  `updated_at` = '$updatedTimeStamp'
 
  WHERE `product_cat`.`id` = $id";

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