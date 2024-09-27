<?php

require('config.php');
$conn->set_charset("utf8mb4");
$id=$_GET['id'];

$result=$conn->query("SELECT drprofile.*, department.name, clinic.location_name
FROM drprofile
INNER JOIN clinic ON drprofile.clinic_id=clinic.id
INNER JOIN department ON drprofile.deptId=department.id
WHERE drprofile.id='$id'");
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;

}
echo json_encode($data);
$conn->close();
return;
?>
