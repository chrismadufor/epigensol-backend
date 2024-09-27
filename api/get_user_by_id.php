<?php

require('config.php');

$uId=$_GET["uid"];

$result=$conn->query("SELECT * FROM `userList` WHERE  `id` = '$uId'");
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;

}
echo json_encode($data);
$conn->close();
return;
?>



