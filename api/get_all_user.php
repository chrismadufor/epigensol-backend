<?php
// Enable error reporting for troubleshooting
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

require('config.php');

$uId=$_GET["uid"];

$result=$conn->query("SELECT * FROM `userList` ORDER BY createdTimeStamp DESC");
// $result=$conn->query("SELECT * FROM `userList` ORDER BY createdTimeStamp DESC");

$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;

}

echo json_encode($data);
$conn->close();
return;
?>

