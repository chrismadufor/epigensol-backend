<?php

require('config.php');

$id=$_GET["id"];


    $result=mysqli_query($conn,
    
    "select appointments.*,

department.name as dept_name

FROM appointments

INNER JOIN department ON department.id = appointments.deptId
Where appointments.id = '$id'

ORDER BY appointments.createdTimeStamp DESC");


$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;

}

echo json_encode($data);
$conn->close();
return;
?>


