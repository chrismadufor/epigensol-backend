<?php

$limit=$_GET['limit'];

require('config.php');

$result=$conn->query("SELECT * FROM `blogPost` where `status` = 'Published' ORDER BY updatedTimeStamp DESC Limit $limit ");
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;

}
//ORDER BY createdTimeStamp DESC
echo json_encode($data);
$conn->close();
return;
?>
