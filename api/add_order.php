<?php

// Enable error reporting for troubleshooting
error_reporting(E_ALL);
ini_set('display_errors', 1);

require('config.php');

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$phone_number = $_POST['phone_number'];
$secondary_phone = $_POST['secondary_phone'];
$email = $_POST['email'];
$shipping_address = $_POST['shipping_address'];
$coutry = $_POST['coutry'];
$state = $_POST['state'];
$city = $_POST['city'];
$zip = $_POST['zip'];
$notes = $_POST['notes'];
$uid = $_POST['uid'];
$payStackPaymentId = $_POST['payStackPaymentId'];
$paidAmt = $_POST['paidAmt'];
$createdTimeStamp = date("Y-m-d H:i:s");
$insertPayments = mysqli_query(
   $conn,
   "INSERT INTO `order_payments`(
   uid,
   pay_stack,
   amount,
      created_time_stamp,
      updated_time_stamp
      )
      VALUES(
      '$uid',
      '$payStackPaymentId',
      '$paidAmt',
      '$createdTimeStamp',
      '$createdTimeStamp'
      )"
);


if ($insertPayments) {
   $last_id_p = mysqli_insert_id($conn);

   $insert = mysqli_query(
      $conn,
      "INSERT INTO `orders`(
   first_name,
   last_name,
      phone_number,
   secondary_phone,
      email,
   shipping_address,
      coutry,
    state,
      city,
     zip,
      notes,
      uid,
      payment_status,
      order_status,
      created_time_stamp,
      updated_time_stamp,
      payments_id
      )
      VALUES(
       '$first_name',
   '$last_name',
      '$phone_number',
   '$secondary_phone',
      '$email',
   '$shipping_address',
      '$coutry',
    '$state',
      '$city',
     '$zip',
      '$notes',
      '$uid',
      1,
     0,
      '$createdTimeStamp',
      '$createdTimeStamp',
      '$last_id_p'
      
      )"
   );


   if ($insert) {
      $last_id = mysqli_insert_id($conn);

      $result = $conn->query("SELECT cart.*, 
        product.price,
         product.tax
        FROM cart
        INNER JOIN product ON product.id=cart.product_id
        where cart.uid='$uid'");
      $data = array();
      while ($row = $result->fetch_assoc()) {
         $data[] = $row;
      }

      for ($i = 0; $i < count($data); $i++) {

         $cart_id = $data[$i]['id'];
         $product_id = $data[$i]['product_id'];
         $qty = $data[$i]['qty'];
         $tax = $data[$i]['tax'];
         $purchase_price = $data[$i]['price'];
         $totalPrice = $purchase_price * $qty;
         $taxPrice = ($totalPrice * $tax) / 100;
         $totalPriceWihtax = $totalPrice + $taxPrice;
         $totalPriceWithTaxRounded = number_format($totalPriceWihtax, 2);

         $insert = mysqli_query(
            $conn,
            "INSERT INTO `order_product`(
   order_id,
   product_id,
   qty,
   purchase_price,
      created_time_stamp,
      updated_time_stamp,
      price,
      tax,
    payment_id 
      )
      VALUES(
       '$last_id',
      '$product_id',
      '$qty',
      '$totalPriceWithTaxRounded',
      '$createdTimeStamp',
      '$createdTimeStamp',
      '$purchase_price',
       '$tax',
       '$last_id_p'
      )"
         );
         mysqli_query($conn, "DELETE FROM cart WHERE id = '$cart_id'");

      }

      $data = array();
      $productList = $conn->query("SELECT *  FROM `product` where `id`='$product_id'");

      while ($row = $productList->fetch_assoc()) {
         $data[] = $row;

      }

      if (count($data) > 0) {

         $oldQty = $data[0]['stock_qty'];
         if ($oldQty >= $qty) {
            $newQty = $oldQty - $qty;
            $sql = "UPDATE `product` SET `stock_qty` = $newQty WHERE `id`='$product_id'";
            $insert = mysqli_query(
               $conn,
               $sql
            );
         }
      }


      echo "$last_id";
   } else {

      echo "error";

   }



} else {

   echo "error";
}

$conn->close();
return;

?>