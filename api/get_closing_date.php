<?php

require('config.php');
$doctId=$_GET['doctId'];

$result=$conn->query("SELECT *  FROM `closing_date` where `isDeleted`=false AND `doctId`='$doctId'");
$data=array();
$blockTime=array();
while($row=$result->fetch_assoc()){
    $blockTime=$row;
    $fetch_dateid=$row['id'];
    $blockTime['block_time']=array();
    $result2=$conn->query("SELECT *  FROM `block_slots` where `date_id`='$fetch_dateid' AND `isDeleted`=false");
while($row2=$result2->fetch_assoc()){
  
        $blockTime['block_time'][]=$row2;
    
}
$data[] = $blockTime;
    
}
echo json_encode($data);
$conn->close();
return;
?>



