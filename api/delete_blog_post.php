<?php

require('config.php');

$id=$_POST["id"];
$fileName=$_POST["fileName"];


    $postTxt="../blogPost/$fileName";


    $result=mysqli_query($conn, "DELETE FROM blogPost WHERE `blogPost`.`id` = '$id';");
      unlink($postTxt);

    if($result){
        echo "success";
    }else {
        echo "error";
    }
  
$conn->close();
return;
?>

