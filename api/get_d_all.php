<?php

require('config.php');


$result=$conn->query("SELECT drprofile.*,city.cityName FROM drprofile
JOIN
city ON drprofile.city_id=city.id
where drprofile.isDeleted=false");
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;

}
echo json_encode($data);
$conn->close();
return;
?>
