<?php

require('config.php');
$clinicId=$_GET['clinicId'];
$result=$conn->query("SELECT clinic.*,city.cityName
FROM clinic
INNER JOIN city ON clinic.city_id=city.id

where clinic.id='$clinicId' AND clinic.isDeleted=false order by clinic.created_time_stamp DESC");

$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;

}
echo json_encode($data);
$conn->close();
return;
?>



