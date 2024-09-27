
 <?php
header('Access-Control-Allow-Origin: *');
require('config.php');

$result=$conn->query("SELECT * FROM `blog` ORDER BY created_at DESC");
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;

}
echo json_encode($data);
$conn->close();
return;
?>
