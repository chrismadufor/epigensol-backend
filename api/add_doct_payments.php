<?php

require('config.php');

   $doct_id=$_POST['doct_id'];
   $month=$_POST['month'];
      $year=$_POST['year'];
      $grandTotal=$_POST['grandTotal'];
         $appFee=$_POST['appFee'];
           $vatPer=$_POST['vatPer'];
          $scPer=$_POST['scPer'];
          
          
   $createdTimeStamp = date("Y-m-d H:i:s");  
      
          $insert = mysqli_query($conn,
  "INSERT INTO `doct_payments`(
   doct_id,
      month,
      year,
      grand_total,
      app_fee,
      vat_per,
      sc_per,
      created_time_stamp,
      updated_time_stamp
      )
      VALUES(
      '$doct_id',
      '$month',
      '$year',
      '$grandTotal',
      '$appFee',
      '$vatPer',
      '$scPer',
      '$createdTimeStamp',
      '$createdTimeStamp'
      
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