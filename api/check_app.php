
 <?php

require('config.php');

$doctId=$_GET['doctId'];
$time=$_GET['time'];
$date=$_GET['date'];

$result=$conn->query("SELECT * FROM `appointments` where `doctId`='$doctId' AND `appointmentTime`='$time' AND `appointmentDate`='$date' AND `appointmentStatus`!='Canceled' AND`appointmentStatus`!='Visited' AND`appointmentStatus`!='Rejected'" );
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;

}
echo json_encode($data);
$conn->close();
return;
?>
