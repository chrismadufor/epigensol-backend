<?php

require('config.php');
 $uid=$_GET['uid'];

$result=$conn->query("SELECT medical_record.*, drprofile.firstName, drprofile.lastName,userList.firstName as uFirstName,userList.lastName as uLastName
FROM medical_record
INNER JOIN drprofile ON medical_record.doct_id=drprofile.id 
INNER JOIN userList ON medical_record.uid=userList.uId
 where medical_record.isDeleted=false AND medical_record.uid='$uid' order by medical_record.created_time_stamp DESC
");



$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;

}
echo json_encode($data);
$conn->close();
return;
?>


