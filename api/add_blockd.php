<?php

require('config.php');

   $doctId=$_POST['doctId'];
   $date_id=$_POST['date_id'];
   $opt=$_POST['opt'];
   $clt=$_POST['clt'];
   
$result=$conn->query("SELECT * FROM `block_slots` where `date_id`='$date_id' AND `clt`= '$clt' AND `opt`='$opt' AND `isDeleted`=false");
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;
}
    if(count($data)>0){
        echo "already exists";
    }else {
          $insert = mysqli_query($conn,
  "INSERT INTO `block_slots`(
     doct_id,
     date_id,
      opt,
      clt,
      isDeleted
      )
      VALUES(
   '$doctId',
   '$date_id',
   '$opt',
   '$clt',
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


    $conn->close();
    return;

?>