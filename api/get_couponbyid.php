<?php

require('config.php');

$active="true";
$id=$_GET['id'];


$result=$conn->query("SELECT * FROM `coupon` where `active`='$active' AND `id`='$id' ");

$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;

}

echo json_encode($data);
$conn->close();
return;
?>

