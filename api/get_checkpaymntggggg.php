<?php

require('config.php');
$oderId=$_GET['oderId'];
$uid=$_GET['uid'];

$result=$conn->query("SELECT * FROM `payments` where `uid`='$uid' AND `oderId`='$oderId'");
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;

}
//ORDER BY createdTimeStamp DESC
echo json_encode($data);
$conn->close();
return;
?>
