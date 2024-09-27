<?php

require('config.php');

  $timeStamp = date("Y-m-d");  
$result=$conn->query("SELECT * FROM `coupon` where `end`>='$timeStamp' ORDER BY createdTimeStamp DESC");
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;

}
//ORDER BY createdTimeStamp DESC
echo json_encode($data);
$conn->close();
return;
?>
