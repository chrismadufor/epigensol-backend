<?php

require('config.php');

       $title = mysqli_real_escape_string($conn, $_POST['title']);
$sub_title = mysqli_real_escape_string($conn, $_POST['sub_title']);
$price = mysqli_real_escape_string($conn, $_POST['price']);
$tax = mysqli_real_escape_string($conn, $_POST['tax']);
$mrp_price = mysqli_real_escape_string($conn, $_POST['mrp_price']);
$stock_qty = mysqli_real_escape_string($conn, $_POST['stock_qty']);
$image = mysqli_real_escape_string($conn, $_POST['imageUrl']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
$cat_id = mysqli_real_escape_string($conn, $_POST['cat_id']);
       $id=$_POST['id'];
       

          $updatedTimeStamp = date("Y-m-d H:i:s"); 

$result=$conn->query("SELECT *  FROM `product` where `title`='$name' AND `id`!='$id'");
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;
}
    if(count($data)>0){
        echo "already exists";
    }else {

  $sql= "UPDATE `product` SET
  `title` = '$title',
  `sub_title` = '$sub_title',
    `price` = '$price',
  `tax` = '$tax',
    `mrp_price` = '$mrp_price',
  `stock_qty` = '$stock_qty',
    `image` = '$image',
  `description` = '$description',
    `cat_id` = '$cat_id',
      `updated_time_stamp` = '$updatedTimeStamp'
 
  WHERE `product`.`id` = $id";

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