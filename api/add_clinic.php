<?php

require('config.php');

$name = $_POST['name'];
$imageUrl = $_POST['imageUrl'];
$lName = $_POST['lName'];
$gUrl = $_POST['gUrl'];
$cityId = $_POST['cityId'];
$number_reveal = $_POST['number_reveal'];

$createdTimeStamp = date("Y-m-d H:i:s");
$result = $conn->query("SELECT *  FROM `clinic` where `title`='$name' AND `isDeleted`=false AND `city_id`='$cityId'");
$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}
if (count($data) > 0) {
    echo "already exists";
} else {
    $insert = mysqli_query(
        $conn,
        "INSERT INTO `clinic`(
   title,
      imageUrl,
      location,
      city_id,
      location_name,
      number_reveal,
      created_time_stamp
      )
      VALUES(
   '$name',
   '$imageUrl',
   '$gUrl',
   '$cityId',
   '$lName',
   '$number_reveal',
   '$createdTimeStamp'
      
      )"
    );


    if ($insert) {

        echo "success";
    } else {
        echo "error";

    }
}


$conn->close();
return;

?>