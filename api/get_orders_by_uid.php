<?php

require('config.php');
$uid=$_GET['uid'];
$result=$conn->query("SELECT * FROM `orders` where uid='$uid' ORDER BY created_time_stamp DESC");


$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;

}

echo json_encode($data);
$conn->close();
return;
?>
<!--$result=$conn->query("SELECT orders.*,-->
<!--// pharmacy.title as pharmacy_name-->
<!--FROM orders-->
<!--// INNER JOIN pharmacy ON product.pharma_id=pharmacy.id-->
<!-- WHERE  orders.uid ='$uid'-->
<!--ORDER BY product.created_time_stamp DESC");-->