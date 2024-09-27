<?php
 header('Access-Control-Allow-Origin: *');

require('config.php');
$uid=$_GET["uid"];
$result=$conn->query("SELECT *  FROM `wallet_history` where `uid`='$uid'");
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;

}
echo json_encode($data);
$conn->close();
return;
?>



