<?php

require('config.php');
$limit=$_GET['limit'];
$pharmaId=$_GET['pharmaId'];
$result=$conn->query("SELECT * FROM `product` where product.pharma_id='$pharmaId' ORDER BY created_time_stamp DESC Limit $limit");

$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;

}

echo json_encode($data);
$conn->close();
return;
?>


