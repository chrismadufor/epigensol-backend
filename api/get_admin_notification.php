<?php

require('config.php');
$limit=$_GET['limit'];
$result=$conn->query("SELECT * FROM `adminNotification` ORDER BY createdTimeStamp DESC Limit $limit");

$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;

}

echo json_encode($data);
$conn->close();
return;
?>


