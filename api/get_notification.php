<?php

require('config.php');
$limit=$_GET['limit'];
$uId=$_GET["uid"];
$timeStamp=$_GET["timeStamp"];


$result=mysqli_query($conn,"select * from notification where `uId` IN('$uId','forAll') AND `createdTimeStamp` >= '$timeStamp' ORDER BY createdTimeStamp DESC Limit $limit");

$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;

}

echo json_encode($data);
$conn->close();
return;
?>


