<?php

require('config.php');

// $db=$_GET['db'];
// $id=$_GET['id'];
// $idName=$_GET['idName'];

$result=$conn->query("SELECT * FROM `appointments` WHERE `appointmentDate` >='4-21-2021' AND appointmentDate <= '4-21-2021'");
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;

}
echo json_encode($data);
$conn->close();
return;
?>
