<?php

require('config.php');
$appId=$_GET['app_id'];

$result=$conn->query("SELECT * FROM `doctors_review` WHERE app_id=$appId");
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;

}
echo json_encode($data);
$conn->close();
return;
?>
