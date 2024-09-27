<?php

require('config.php');

   $payment_id=$_POST['payment_id'];
   $uid=$_POST['uid'];
      $amount=$_POST['amount'];
          $pr_amount=$_POST['pr_amount'];
   $desc=$_POST['desc'];
     $status=$_POST['status'];
     $total=0;
   $createdTimeStamp = date("Y-m-d H:i:s");
   if($status=="0"){
      $total=$pr_amount+$amount;
   }
      if($status=="1"){
          if($pr_amount<$amount){
                    echo "error";
                $conn->close();
                return;
          }
       
             
          
          else{
               $total=$pr_amount-$amount;  
          }
   
   }
 
        
   
    $sql = "UPDATE `userList` SET `amount` = '$total' WHERE `userList`.`uId` = '$uid'";
      $insert = mysqli_query($conn,$sql
         );

          $insert = mysqli_query($conn,
          
          "INSERT INTO `wallet_history` (`id`, `status`, `description`, `amount`, `payment_id`, `uid`, `created_time_stamp`)
          VALUES (NULL, '$status', '$desc', '$amount', '$payment_id', '$uid', '$createdTimeStamp')"

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