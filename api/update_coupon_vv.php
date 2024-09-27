<?php

require('config.php');
  $couponCode=$_POST['couponCode'];
   $active=$_POST['active'];
   $rate=$_POST['rate'];
   $subTitle=$_POST['subTitle'];
   $id=$_POST['id'];
       $end=$_POST['end'];
   $start=$_POST['start'];
   $times=$_POST['times'];
  
  $result=$conn->query("SELECT * FROM `coupon` where `couponCode`= '$couponCode' AND `id`!='$id'");

$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;
}
if(count($data)>0){
    echo "already exists";
    
}else {
    $sql = "UPDATE `coupon` SET 

  `couponCode`='$couponCode',
  `active`='$active',
  `rate`='$rate',
  `subTitle`='$subTitle',
    `end`='$end',
  `start`='$start',
  `times`='$times'
  
WHERE `coupon`.`id` = '$id'";

  $update = mysqli_query($conn, $sql );
            
 
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