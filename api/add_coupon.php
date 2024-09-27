<?php

require('config.php');

   $couponCode=$_POST['couponCode'];
   $active=$_POST['active'];
   $rate=$_POST['rate'];
   $subTitle=$_POST['subTitle'];
   $createdTimeStamp = date("Y-m-d H:i:s");  
    $end=$_POST['end'];
   $start=$_POST['start'];
   $times=$_POST['times'];
  

$result=$conn->query("SELECT * FROM `coupon` where `couponCode`= '$couponCode'");

$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;

}
if(count($data)>0){
    echo "already exists";
    
}else {
     $insert = mysqli_query($conn,
  "INSERT INTO `coupon`(
   couponCode,
    active,
    rate,
     subTitle,
     createdTimeStamp,
     start,
     end,
     times
      )
      VALUES(
   '$couponCode',
   '$active',
   '$rate',
   '$subTitle',
   '$createdTimeStamp',
      '$start',
   '$end',
   '$times'
      )"
            );
 
    if($insert){
               
                echo "success";
    }
    else{
        echo "error";
        
    }
    
}
 
    $conn->close();
    return;

?>