<?php

require('config.php');

$title=$_GET["title"];



    $result=mysqli_query($conn,"select * from appointmentType where `title` = '$title'");


    

$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;

}

echo json_encode($data);
$conn->close();
return;
?>


