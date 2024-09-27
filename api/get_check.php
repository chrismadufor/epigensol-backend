<?php

require('config.php');

$result=$conn->query("SELECT * FROM `check`");
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;

}
echo json_encode($data);
$conn->close();
return;
?>
