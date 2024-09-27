<?php

require('config.php');

  $body=$_POST['body'];
  $sendBy=$_POST['sendBy'];
  $title=$_POST['title'];
  $uId=$_POST['uId'];
    $doctId=$_POST['doctId'];
  $createdTimeStamp = date("Y-m-d H:i:s");  
  

  $insert = $conn->query(
  "INSERT INTO `adminNotification`( `body`, `createdTimeStamp`,`sendBy`, `title`, `uId`,`doctId`)
      VALUES(
    '$body',
   '$createdTimeStamp',
  '$sendBy',
  '$title',
  '$uId',
  '$doctId'

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