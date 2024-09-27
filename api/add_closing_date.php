<?php

require('config.php');

   $date=$_POST['date'];
   $doctId=$_POST['doctId'];
$result=$conn->query("SELECT * FROM `closing_date` where `date`='$date' AND `doctId`='$doctId' AND `isDeleted`=false");
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;
}
    if(count($data)>0){
        echo "already exists";
    }else {
          $insert = mysqli_query($conn,
  "INSERT INTO `closing_date`(
      date,
      doctId,
      all_day
      
      )
      VALUES(
   '$date',
   '$doctId',
   true
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