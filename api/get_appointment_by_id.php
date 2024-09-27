<?php

require('config.php');

$id=$_GET["id"];

    $result=mysqli_query($conn,"select * from appointments where `id` = '$id'");

$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;

}

echo json_encode($data);
$conn->close();
return;
?>


