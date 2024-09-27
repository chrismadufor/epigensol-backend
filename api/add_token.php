<?php

require('config.php');

   $doctId=$_POST['doctId'];
   $app_id=$_POST['appId'];
   $token_num=$_POST['tokenNum'];
   $token_type=$_POST['tokenType'];
      $date=$_POST['date'];
      $data=array();
      $data2=array();
   $result2=$conn->query("SELECT * FROM `token` where `isDeleted`=false AND `app_id`='$app_id'");
   while($row2=$result2->fetch_assoc()){
    $data2[]=$row2;
}
if(count($data2)>0){
        echo "already exists";
    }else {
        $result=$conn->query("SELECT * FROM `token` where `token_num`='$token_num' AND `doct_id`= '$doctId'  AND `date`='$date' AND `isDeleted`=false");

while($row=$result->fetch_assoc()){
    $data[]=$row;
}
    if(count($data)>0){
        echo "already exists";
    }else {
          $insert = mysqli_query($conn,
  "INSERT INTO `token`(
     token_num,
     token_type,
      doct_id,
      app_id,
      date,
      isDeleted
      )
      VALUES(
   '$token_num',
   '$token_type',
   '$doctId',
   '$app_id',
   '$date', 
   false
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


    $conn->close();
    return;

?>