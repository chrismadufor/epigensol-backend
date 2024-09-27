<?php

require('config.php');

   $doct_id=$_POST['doct_id'];
   $ans_ids=$_POST['ans_ids'];

$result=$conn->query("SELECT *  FROM `suggested_doctor` where `ans_ids`='$ans_ids'");
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;
}
    if(count($data)>0){
 
$sql = "UPDATE `suggested_doctor` SET `doct_id` = '$doct_id' WHERE `suggested_doctor`.`ans_ids` = '$ans_ids'";
  

  $insert = mysqli_query($conn,$sql
         );
            
  
 
    if($insert){
               
                echo "success";
    }
    else{
        echo "error";
        
    }
    }else {
          $insert = mysqli_query($conn,
  "INSERT INTO `suggested_doctor`(
   doct_id,
      ans_ids
      )
      VALUES(
   '$doct_id',
   '$ans_ids'
      
      )"
            );
            
 
    if($insert){
               
                echo "success";
    }
    else{
        echo "error";
        
    }
    }


    $conn->close();
    return;

?>