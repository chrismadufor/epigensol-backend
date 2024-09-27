<?php

require('config.php');

   $id=$_POST['id'];
   $first_name=$_POST['first_name'];
   $last_name=$_POST['last_name'];
      $phone_number=$_POST['phone_number'];
   $secondary_phone=$_POST['secondary_phone'];
      $email=$_POST['email'];
   $shipping_address=$_POST['shipping_address'];
      $coutry=$_POST['country'];
   $state=$_POST['state'];
      $city=$_POST['city'];
   $zip=$_POST['zip'];
      $notes=$_POST['notes'];
      
   $delivery_date=$_POST['delivery_date'];
   $order_status=$_POST['order_status'];
   $payment_status=$_POST['payment_status'];
    


  $sql= "UPDATE `orders` SET
  `first_name` = '$first_name',
  `last_name` = '$last_name',
  `phone_number` = '$phone_number',
  `secondary_phone` = '$secondary_phone',
  `email` = '$email',
  `shipping_address` = '$shipping_address',
  `state` = '$state',
  `city` = '$city',
  `zip` = '$zip',
  `notes` = '$notes',
    `coutry` = '$coutry',
      `delivery_date` = '$delivery_date',
  `order_status` = '$order_status',
    `payment_status` = '$payment_status'
  
 
  WHERE `orders`.`id` = $id";

  $update = mysqli_query($conn,$sql);
            
 
    if($update){
               
                echo "success";
    }
    else{
        echo "error";
        
    }
    
    $conn->close();
    return;

?>