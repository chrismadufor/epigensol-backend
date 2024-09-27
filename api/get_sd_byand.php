<?php

require('config.php');
$ans_ids=$_GET['ans_ids'];

 $result=$conn->query("SELECT * FROM `suggested_doctor` WHERE  `ans_ids` = '$ans_ids'");
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;

}
echo json_encode($data);
$conn->close();
return;
?>
