<?php

require('config.php');
$email=$_POST['email'];
$pass=$_POST['pass'];

$result=$conn->query("SELECT front_desk.*,clinic.title,clinic.location_name,clinic.imageUrl,clinic.kiosk_t1,clinic.kiosk_t2,clinic.kiosk_img
FROM front_desk
INNER JOIN clinic ON front_desk.clinic_id =clinic.id

WHERE front_desk.email='$email' AND front_desk.pass='$pass' AND front_desk.isDeleted=false");
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;

}
echo json_encode($data);
$conn->close();
return;
?>