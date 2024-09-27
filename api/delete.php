<?php

require('config.php');

$id=$_POST["id"];
$db=$_POST["db"];

    $result=mysqli_query($conn, "DELETE FROM $db WHERE `$db`.`id` = '$id';");

    if($result){
        echo "success";
    }else {
        echo "error";
    }
$conn->close();
return;
?>

