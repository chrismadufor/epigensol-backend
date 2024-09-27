<?php

require('config.php');

$db=$_GET['db'];
$name=$_GET['name'];

$result=$conn->query("SELECT * FROM `$db` WHERE `searchByName` LIKE '$name%'");
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;

}
echo json_encode($data);
$conn->close();
return;
?>
