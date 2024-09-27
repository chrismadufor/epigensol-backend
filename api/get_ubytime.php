<?php

require('config.php');

$doctId=$_GET['doctId'];
$result=$conn->query(
                        "SELECT DISTINCT userList.*
FROM userList
LEFT JOIN appointments ON appointments.uId = userList.uId
WHERE appointments.doctId IN ($doctId)"
                        
                        );

$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;
}

echo json_encode($data);
$conn->close();
return;
?>

