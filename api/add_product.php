<?php

require('config.php');

$title = mysqli_real_escape_string($conn, $_POST['title']);
$sub_title = mysqli_real_escape_string($conn, $_POST['sub_title']);
$price = mysqli_real_escape_string($conn, $_POST['price']);
$tax = mysqli_real_escape_string($conn, $_POST['tax']);
$mrp_price = mysqli_real_escape_string($conn, $_POST['mrp_price']);
$stock_qty = mysqli_real_escape_string($conn, $_POST['stock_qty']);
$image = mysqli_real_escape_string($conn, $_POST['imageUrl']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
$cat_id = mysqli_real_escape_string($conn, $_POST['cat_id']);

$result = $conn->query("SELECT * FROM `product` WHERE `title`='$title'");

if ($result->num_rows > 0) {
    echo "Product already exists";
} else {
    $timeStamp = date("Y-m-d H:i:s");

    $insert = mysqli_query($conn, "
        INSERT INTO `product` (
            title,
            sub_title,
            price,
            tax,
            mrp_price,
            stock_qty,
            image,
            description,
            created_time_stamp,
            updated_time_stamp,
            cat_id
        ) VALUES (
            '$title',
            '$sub_title',
            '$price',
            '$tax',
            '$mrp_price',
            '$stock_qty',
            '$image',
            '$description',
            '$timeStamp',
            '$timeStamp',
            '$cat_id'
        )"
    );

    if ($insert) {
        echo "success";
    } else {
        echo "error";
    }
}

$conn->close();
return;

?>
