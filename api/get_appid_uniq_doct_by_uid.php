<?php

require('config.php');

$uId=$_GET["uid"];


$result = mysqli_query($conn, "SELECT * FROM appointments WHERE `uId` = '$uId' GROUP BY doctId ORDER BY createdTimeStamp DESC");




$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;

}

echo json_encode($data);
$conn->close();
return;
?>


