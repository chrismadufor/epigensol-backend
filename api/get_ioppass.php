<?php


require('config.php');
$email=$_POST['email'];

$result=$conn->query("SELECT `pass` FROM `drprofile` where `email`='$email' AND `isDeleted`=false");
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;
}
echo json_encode($data);
$conn->close();
return;
?>
