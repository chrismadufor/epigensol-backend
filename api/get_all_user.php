<?php

require('config.php');

$uId=$_GET["uid"];

$result=$conn->query("SELECT * FROM `userList` ORDER BY createdTimeStamp DESC");

$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;

}

echo json_encode($data);
$conn->close();
return;
?>
