<?php

require('config.php');

  $date=$_POST['date'];
$array = array("my", "litte", "array");

$serialized_array = serialize($array);
  

  $insert = $conn->query(
  "INSERT INTO `check`(
      date
  
      )
      VALUES(

 '$serialized_array'
 
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