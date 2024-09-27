<?php

require('config.php');

$userId=$_GET["userId"];
$doctId=$_GET["doctId"];

    $result=mysqli_query($conn,"select * from appointments where `uId` = '$userId' AND doctId ='$doctId'");

$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;

}

echo json_encode($data);
$conn->close();
return;
?>


