<?php

require('config.php');

$result=$conn->query("SELECT *  FROM `clinic` where  `isDeleted`=false order by `created_time_stamp` DESC");
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;

}
echo json_encode($data);
$conn->close();
return;
?>



