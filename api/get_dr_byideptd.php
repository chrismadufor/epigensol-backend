<?php

require('config.php');
$deptId=$_GET['deptId'];

$result=$conn->query("SELECT * FROM `drprofile` WHERE `deptId`='$deptId'");
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;

}
echo json_encode($data);
$conn->close();
return;
?>
