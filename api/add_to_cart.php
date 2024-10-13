<?php

// Enable error reporting for troubleshooting
error_reporting(E_ALL);
ini_set('display_errors', 1);

require('config.php');

   $uid=$_POST['uid'];
   $product_id=$_POST['product_id'];
      $qty=$_POST['qty'];
 $data=array();
        $productList=$conn->query("SELECT *  FROM `product` where `id`='$product_id'");
           
        while($row=$productList->fetch_assoc()){
            $data[]=$row;
        
        }
      
        if(count($data)>0){
            
            $oldQty=$data[0]['stock_qty'];
            if($oldQty>=$qty){
    $result=$conn->query("SELECT * FROM `cart` where `uid`='$uid' AND `product_id`='$product_id'");
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;
}
    if(count($data)>0){
        echo "already exists";
    }else {
          $insert = mysqli_query($conn,
  "INSERT INTO `cart`(
   uid,
      product_id,
      qty,
      created_time_stamp,
      updated_time_stamp
      )
      VALUES(
   '$uid',
   '$product_id',
   '$qty',
    NOW(),
    NOW()
      )"
            );
            
 
    if($insert){
               
                echo "success";
    }
    else{
        echo "error";
        
    }
    }
            }
        }else{
            echo "error";
        }



    $conn->close();
    return;

?>