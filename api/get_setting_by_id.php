
 <?php

require('config.php');
$id=$_GET['id'];
$result=$conn->query("SELECT * FROM `setting` where id = '$id'");
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;
}
echo json_encode($data);
$conn->close();
return;
?>
