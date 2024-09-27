<?php

require('config.php');

  $qty=$_POST['qty'];
    $product_id=$_POST['pid'];
   $data=array();
        $productList=$conn->query("SELECT *  FROM `product` where `id`='$product_id'");
           
        while($row=$productList->fetch_assoc()){
            $data[]=$row;
        
        }
  

      
        if(count($data)>0){
             
            $oldQty=$data[0]['stock_qty'];
            if($oldQty>=$qty){
                $newQty= $oldQty-$qty; 
                 $sql = "UPDATE `product` SET `stock_qty` = $newQty WHERE `id`='$product_id'";
                  $insert = mysqli_query($conn,$sql
         );
            
  
 
    if($insert){
               
                echo "success";
    }
    else{
        echo "error";
        
    }
            }
            
        }
  


    $conn->close();
    return;

?>