<?php

require('config.php');
$id=$_GET['doctId'];
$result=$conn->query("SELECT drprofile.*,clinic.title FROM drprofile
JOIN
clinic ON drprofile.clinic_id=clinic.id where drprofile.id='$id'");
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;

}
echo json_encode($data);
$conn->close();
return;
?>
