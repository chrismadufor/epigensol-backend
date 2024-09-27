<?php

require('config.php');
$app_id=$_GET['app_id'];



$result=$conn->query("SELECT * FROM `token` where `app_id`='$app_id' AND `isDeleted`=false");
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;
}
echo json_encode($data);
$conn->close();
return;
?>
