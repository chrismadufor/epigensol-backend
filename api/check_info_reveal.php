 <?php

require('config.php');
$clinicId=$_GET['clinicId'];

$result=$conn->query("SELECT * FROM `clinic` where `id`='$clinicId'");
$data=array();
while($row=$result->fetch_assoc()){
    $data[number_reveal]=$row['number_reveal'];

}
echo json_encode($data);
$conn->close();
return;
?>
