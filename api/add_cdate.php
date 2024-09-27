<?php

require('config.php');

   $doctId=$_POST['doctId'];
   $date=$_POST['date'];

$result=$conn->query("SELECT *  FROM `closing_date` where `doctId`='$doctId' AND `date`= '$date' AND `isDeleted`=false");
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;
}
    if(count($data)>0){
        echo "already exists";
    }else {
          $insert = mysqli_query($conn,
  "INSERT INTO `closing_date`(
   doctId,
      date,
      all_day,
      isDeleted
      )
      VALUES(
   '$doctId',
   '$date',
   true,
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