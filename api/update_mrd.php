<?php

require('config.php');

  $uid=$_POST['uid'];
  $mrd=$_POST['mrd'];


   $sql="UPDATE `userList` SET `mrd` = '$mrd' WHERE `userList`.`id` = '$uid'";
  

  $insert = mysqli_query($conn,$sql);
            
    if($insert){
               
                echo "success";
    }
    else{
        echo "error";
        
    }
    $conn->close();
    return;

?>