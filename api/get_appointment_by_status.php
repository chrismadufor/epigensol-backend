
<?php

require('config.php');

$uId=$_GET["uid"];
$status=$_GET["status"];
 $array=array_map('strval', explode(',',$status ));
 $array = implode("','",$array);

    //   $result=mysqli_query($conn,"select * from appointments where `uId` = '$uId' AND `appointmentStatus` IN ('".$array."') ORDER BY updatedTimeStamp DESC");
            $result=$conn->query("SELECT appointments.*,clinic.title,city.cityName FROM appointments
JOIN
clinic ON appointments.clinicId=clinic.id 
JOIN
city ON appointments.cityId=city.id 
where `uId` = '$uId' AND `appointmentStatus` IN ('".$array."') ORDER BY STR_TO_DATE(appointmentDate,'%m-%d-%Y') DESC, appointmentTime DESC");


$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;

}

echo json_encode($data);
$conn->close();
return;
?>


