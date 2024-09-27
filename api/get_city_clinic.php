<?php

require('config.php');
$cityId=$_POST['cityId'];
$clinicID=$_POST['clinicId'];

$result=$conn->query("SELECT * FROM `drprofile` WHERE `email`='$email' AND `pass`='$pass'  AND `isDeleted`=false");
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;

}
echo json_encode($data);
$conn->close();
return;
?>


