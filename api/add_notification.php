<?php

require('config.php');

  $body=$_POST['body'];
  $routeTo=$_POST['routeTo'];
  $sendBy=$_POST['sendBy'];
  $sendFrom=$_POST['sendFrom'];
  $sendTo=$_POST['sendTo'];
  $title=$_POST['title'];
  $uId=$_POST['uId'];
  $createdTimeStamp = date("Y-m-d H:i:s");  
  

  $insert = $conn->query(
  "INSERT INTO `notification`( `body`, `createdTimeStamp`, `routeTo`, `sendBy`, `sendFrom`, `sendTo`, `title`, `uId`)
      VALUES(
    '$body',
   '$createdTimeStamp',
   
  '$routeTo',
  '$sendBy',
  '$sendFrom',
  '$sendTo',
  '$title',
  '$uId'

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