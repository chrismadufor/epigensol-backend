<?php

require('config.php');

 $month=$_GET["month"];
 $doctId=$_GET["doctId"];
  $year=$_GET["year"];
  
 $array=array_map('strval', explode(',', $status));
 $array = implode("','",$array);
 

      $result=mysqli_query($conn,"SELECT *
FROM appointments
WHERE doctId='$doctId' AND MONTH(createdTimeStamp) = '$month' AND YEAR(createdTimeStamp) = '$year'");
$doctorFee = 0;

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $doctorFee += $row['doct_fee']; // Summing up the doctor's fees
    }
}

$data=array();
while($row=$result->fetch_assoc()){

    $data[]=$row;

}

$response = array(
    'totalDoctorFee' => $doctorFee // Adding the total doctor's fee to the response
);

echo json_encode($response);

$conn->close();
return;
?>