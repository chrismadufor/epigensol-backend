<?php

require('config.php');
$id=$_GET['id'];

$result=$conn->query("SELECT * FROM `orders` WHERE id='$id'");
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;
}
echo json_encode($data);
$conn->close();
return;
?>
