<?php

require('config.php');

$active="true";
$couponCode=$_GET['couponCode'];


$result=$conn->query("SELECT * FROM `coupon` where `active`='$active' AND `couponCode`='$couponCode' ");

$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;

}

echo json_encode($data);
$conn->close();
return;
?>

