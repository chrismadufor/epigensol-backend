<?php

require('config.php');

$uId=$_GET["uid"];



    $result=mysqli_query($conn,"select * from appointments where `uId` = '$uId' ORDER BY createdTimeStamp DESC");


    

$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;

}

echo json_encode($data);
$conn->close();
return;
?>


