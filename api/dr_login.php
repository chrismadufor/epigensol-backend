<?php

require('config.php');
$email=$_POST['email'];
$pass=$_POST['pass'];

$result=$conn->query("SELECT * FROM `drprofile` WHERE `email`='$email' AND `pass`='$pass' AND `isDeleted`=false");
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;

}
echo json_encode($data);
$conn->close();
return;
?>


