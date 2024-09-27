<?php

require('config.php');

   $title=$_POST['title'];
      $id=$_POST['id'];


$result=$conn->query("SELECT *  FROM `question` where `title`='$title' AND `id`!='$id' AND `isDeleted`=false");
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;
}
    if(count($data)>0){
        echo "already exists";
    }else {

   $sql= "UPDATE `question` SET
  `title` = '$title'
 
  WHERE `question`.`id` = $id";

  $update = mysqli_query($conn,$sql);
    if($update){
               
                echo 'success';
    }
    else{
        echo "error";
        
    }
    }


    $conn->close();
    return;

?>