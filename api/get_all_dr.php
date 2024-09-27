<?php

require('config.php');


$result=$conn->query("SELECT drprofile.*,city.cityName FROM drprofile
JOIN
city ON drprofile.city_id=city.id where drprofile.latitude IS NOT NULL AND drprofile.longitude IS NOT NULL AND drprofile.latitude!='' AND drprofile.longitude!='' AND drprofile.isDeleted=false");
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;

}
echo json_encode($data);
$conn->close();
return;
?>
