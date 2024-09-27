<?php

require('config.php');
$doctId=$_GET['doctId'];

$result=$conn->query("SELECT * FROM `doctAptype` WHERE `doctId`='$doctId'");
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;

}
echo json_encode($data);
$conn->close();
return;
?>
