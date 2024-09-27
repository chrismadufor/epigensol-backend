<?php

require('config.php');
$limit=$_GET['limit'];
$id=$_GET['id'];
$result=$conn->query("SELECT * FROM `adminNotification` where `doctId`='$id' ORDER BY createdTimeStamp DESC Limit $limit");

$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;

}

echo json_encode($data);
$conn->close();
return;
?>


