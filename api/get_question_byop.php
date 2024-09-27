<?php

require('config.php');
$id=$_GET['id'];

$result=$conn->query("SELECT * FROM `question` where isDeleted=false AND `id`='$id' ");
$data=array();
   $newData=array();
while($row=$result->fetch_assoc()){
    $data=$row;
     $qid=$row['id'];
     $result4=$conn->query("SELECT * FROM `answer` where `q_id`='$qid' AND isDeleted=false ");
        $data['answer']=array();
        while($row4=$result4->fetch_assoc()){
       $data['answer'][]=$row4;
     $qid=$row['id'];

}
$newData[] = $data;  

}
echo json_encode($newData);
$conn->close();
return;
?>



