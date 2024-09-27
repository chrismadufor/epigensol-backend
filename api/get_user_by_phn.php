<?php

require('config.php');

$phn=$_POST["phn"];


$result=$conn->query("SELECT * FROM `userList` WHERE  `phone` = '$phn'");
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;

}
echo json_encode($data);
$conn->close();
return;
?>



