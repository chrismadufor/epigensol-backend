<?php

require('config.php');

   $uid=$_POST['uid'];
   $couponId=$_POST['couponId'];
  
   $insert = mysqli_query($conn,
  "INSERT INTO `usedCoupon`(
   uid,
   couponId
      )
      VALUES(

   '$uid',
   '$couponId'
      )"
            );
            
 
    if($insert){
               
                echo "success";
    }
    else{
        echo "error";
        
    }
    $conn->close();
    return;

?>