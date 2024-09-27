<?php

require('config.php');
$id=$_POST['id'];

$result=$conn->query("SELECT * FROM `blog` WHERE `id`='$id'");

$data=array();
while($row=$result->fetch_assoc())
{
    $data[]=$row;

}
echo json_encode($data);
$conn->close();
return;
?>


