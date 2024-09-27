<?php


require('config.php');
$payment_id=$_GET['payment_id'];


$result=$conn->query("SELECT order_payments.*,
userList.firstName,
userList.lastName,
userList.phone,
orders.id as order_id
FROM order_payments
INNER JOIN  userList ON order_payments.uid = userList.id
LEFT JOIN  orders ON order_payments.pay_stack = orders.payments_id
where order_payments.pay_stack = '$payment_id'
ORDER BY order_payments.created_time_stamp DESC");
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;

}
echo json_encode($data);
$conn->close();
return;
?>
SELECT Orders.OrderID, Customers.CustomerName, Orders.OrderDate
FROM Orders
INNER JOIN Customers ON Orders.CustomerID=Customers.CustomerID;