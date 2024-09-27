<?php

require('config.php');
$uid=$_GET['uid'];

$result=$conn->query("SELECT  cart.*,
product.image,
product.title,
product.sub_title,
product.price,
product.mrp_price,
product.tax,
product.stock_qty,
pharmacy.title as pharmacy_name
FROM cart
INNER JOIN product ON product.id=cart.product_id
LEFT JOIN pharmacy ON product.pharma_id=pharmacy.id
where cart.uid='$uid'
ORDER BY cart.created_time_stamp DESC");

$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;

}

echo json_encode($data);
$conn->close();
return;
?>


