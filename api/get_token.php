<?php

require('config.php');
$doct_id=$_GET['doct_id'];
$date=$_GET['date'];


$result=$conn->query("SELECT * FROM `token` where `doct_id`='$doct_id' AND `date`='$date' AND `isDeleted`=false");
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;
}
echo json_encode($data);
$conn->close();
return;
?>
