<?php

require('config.php');

   $ansId=$_POST['ansId'];
      $loopqid= $_POST['loop_qid'];
      
      if($loopqid=="null"){
            $sql= "UPDATE `answer` SET
  `loop_qid` = NULL
 
  WHERE `answer`.`id` = $ansId";

  $update = mysqli_query($conn,$sql);
    if($update){
               
                echo 'success';
    }
    else{
        echo "error";
        
    }
          
      }else{
            $sql= "UPDATE `answer` SET
  `loop_qid` = '$loopqid'
 
  WHERE `answer`.`id` = $ansId";

  $update = mysqli_query($conn,$sql);
    if($update){
               
                echo 'success';
    }
    else{
        echo "error";
        
    }
      }
     


 


    $conn->close();
    return;

?>