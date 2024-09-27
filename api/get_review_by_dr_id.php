<?php

require('config.php');
$doct_id=$_GET['doct_id'];

$result=$conn->query("SELECT doctors_review.*, userList.firstName,userList.lastName
FROM doctors_review
INNER JOIN userList ON userList.id=doctors_review.user_id

 WHERE doctors_review.doct_id=$doct_id");
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;

}
echo json_encode($data);
$conn->close();
return;
?>
