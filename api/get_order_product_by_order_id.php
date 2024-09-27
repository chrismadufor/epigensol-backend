<?php

require('config.php');
$id=$_GET['id'];

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
INNER JOIN orders ON orders.id=order_product.order_id
INNER JOIN product ON product.id=order_product.product_id
INNER JOIN pharmacy ON product.pharma_id=pharmacy.id

WHERE order_product.order_id='$id'
ORDER BY order_product.created_time_stamp DESC");

$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;

}

echo json_encode($data);
$conn->close();
return;
?>


FROM Orders
INNER JOIN Customers ON Orders.CustomerID=Customers.CustomerID;