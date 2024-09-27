<?php
 header('Access-Control-Allow-Origin: *');

require('config.php');

$result=$conn->query("SELECT *  FROM `wallet_history`");

$result=$conn->query("SELECT wallet_history.*,userList.firstName,userList.lastName,userList.pNo
FROM wallet_history
JOIN
userList ON wallet_history.uid=userList.uId");
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;

}
echo json_encode($data);
$conn->close();
return;
?>



