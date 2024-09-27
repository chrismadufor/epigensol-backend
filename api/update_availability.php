<?php

require('config.php');

    $mon=$_POST['mon'];
    $tue=$_POST['tue'];
    $wed=$_POST['wed'];
    $thu=$_POST['thu'];
    $fri=$_POST['fri'];
    $sat=$_POST['sat'];
    $sun=$_POST['sun'];
    $id=$_POST['id'];
   
   $updatedTimeStamp = date("Y-m-d H:i:s"); 
  
$sql = "UPDATE `availability` SET 
    `mon`='$mon',
    `tue`='$tue',
    `wed`='$wed',
    `thu`='$thu',
    `fri`='$fri',
    `sat`='$sat',
    `sun`='$sun',
`updatedTimeStamp` ='$updatedTimeStamp'
WHERE `availability`.`id` = '$id'";

  $update = mysqli_query($conn, $sql );
            
 
    if($update){
               
                echo "success";
    }
    else{
        echo "error";
        
    }
    $conn->close();
    return;

?>