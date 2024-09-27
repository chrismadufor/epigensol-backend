<?php

require('config.php');

$uId=$_GET["uid"];
$status=$_GET["status"];
if($status=="Visited")
{ 
    $result=mysqli_query($conn,"select * from appointments where `uId` = '$uId' AND `appointmentStatus`='$status' ORDER BY createdTimeStamp DESC");
}
else{
   
$result=mysqli_query($conn,"select * from appointments where `uId` = '$uId' AND `appointmentStatus`!='Visited' ORDER BY createdTimeStamp DESC");
    
}
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;

}

echo json_encode($data);
$conn->close();
return;
?>


