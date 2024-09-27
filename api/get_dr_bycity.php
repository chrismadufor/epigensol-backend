<?php

require('config.php');
$conn->set_charset("utf8mb4");

$cityId=$_GET['cityId'];

$result=$conn->query("SELECT drprofile.*,
department.name

FROM `drprofile`
INNER JOIN department ON drprofile.deptId=department.id

WHERE drprofile.city_id ='$cityId' AND  drprofile.isDeleted = false");
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;

}
echo json_encode($data);
$conn->close();
return;
?>

