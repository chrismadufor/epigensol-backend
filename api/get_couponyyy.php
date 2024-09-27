<?php

require('config.php');

$result=$conn->query("SELECT * FROM `coupon` ORDER BY createdTimeStamp DESC");
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;

}
//ORDER BY createdTimeStamp DESC
echo json_encode($data);
$conn->close();
return;
?>
