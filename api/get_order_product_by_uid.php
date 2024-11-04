<?php

// Enable error reporting for troubleshooting
error_reporting(E_ALL);
ini_set('display_errors', 1);

require('config.php');
$uid=$_GET['uid'];

$result=$conn->query("SELECT order_product.*,
pharmacy.id as pharmacy_id,
pharmacy.title as pharmacy_name,
product.sub_title,
product.title,
product.image,
orders.id as order_id,
orders.order_status,
orders.payment_status
FROM order_product
LEFT JOIN orders ON orders.id=order_product.order_id
LEFT JOIN product ON product.id=order_product.product_id
LEFT JOIN pharmacy ON product.pharma_id=pharmacy.id
 WHERE orders.uid='$uid'
ORDER BY order_product.created_time_stamp DESC");

$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;

}

echo json_encode($data);
$conn->close();
return;
?>
<!-- 
FROM Orders
INNER JOIN Customers ON Orders.CustomerID=Customers.CustomerID; -->