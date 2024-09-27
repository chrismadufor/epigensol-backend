<?php

require('config.php');

  $paymentStatus=$_GET['paymentStatus'];
  $paymentMode=$_GET['paymentMode'];
  $oderId=$_GET['oderId'];
  $amount=$_GET['amount'];
    $uid=$_GET['uid'];
  $createdTimeStamp = date("Y-m-d H:i:s");  
  

  $insert = $conn->query(
  "INSERT INTO `payments`( `paymentStatus`, `createdTimeStamp`,`uid`, `paymentMode`, `oderId`, `amount`)
      VALUES(
    '$paymentStatus',
   '$createdTimeStamp',
   '$uid',
  '$paymentMode',
  '$oderId',
  '$amount'
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