<?php

require('config.php');

   $name=$_POST['name'];
   $imageUrl=$_POST['imageUrl'];

$result=$conn->query("SELECT *  FROM `city` where `cityName`='$name' AND `isDeleted`=false");
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;
}
    if(count($data)>0){
        echo "already exists";
    }else {
          $insert = mysqli_query($conn,
  "INSERT INTO `city`(
   cityName,
      imageUrl
      )
      VALUES(
   '$name',
   '$imageUrl'
      
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