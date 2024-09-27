<?php

require('config.php');

$id=$_POST["id"];
$db="doctAptype";

    $result=mysqli_query($conn, "DELETE FROM $db WHERE `$db`.`doctId` = '$id';");

    if($result){
        echo "success";
    }else {
        echo "error";
    }
$conn->close();
return;
?>

