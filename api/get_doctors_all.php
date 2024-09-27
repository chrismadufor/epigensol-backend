<?php

require('config.php');
    //  $clinicId=$_GET['clinicId'];
    //   $cityId=$_GET['cityId'];
    //      $deptId=$_GET['deptId'];

// $result=$conn->query("SELECT * FROM `drprofile` WHERE `clinic_id`='$clinicId' AND  `city_id`='$cityId'And  `deptId`='$deptId' AND `isDeleted`=false" );

$result=$conn->query("SELECT drprofile.*, department.name as deptName,clinic.title,city.cityName
FROM `drprofile`
INNER JOIN city ON city.id=drprofile.city_id
INNER JOIN clinic ON clinic.id=drprofile.clinic_id
INNER JOIN department ON department.id=drprofile.deptId

WHERE  drprofile.latitude IS NOT NULL AND drprofile.longitude IS NOT NULL AND drprofile.latitude!='' AND drprofile.longitude!='' AND drprofile.isDeleted =false" );

$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;

}
echo json_encode($data);
$conn->close();
return;
?>
$result=$conn->query("SELECT drprofile.*,city.cityName FROM drprofile
JOIN
city ON drprofile.city_id=city.id where drprofile.latitude IS NOT NULL AND drprofile.longitude IS NOT NULL AND drprofile.latitude!='' AND drprofile.longitude!='' AND drprofile.isDeleted=false");