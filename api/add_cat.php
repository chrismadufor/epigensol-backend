<?php

require('config.php');

   $name=$_POST['title'];

      $updatedTimeStamp = date("Y-m-d H:i:s");
$result=$conn->query("SELECT *  FROM `product_cat` where `title`='$name'");
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;
}
    if(count($data)>0){
        echo "already exists";
    }else {
          $insert = mysqli_query($conn,
  "INSERT INTO `product_cat`(
   title,
  updated_at,
  created_at
      )
      VALUES(
   '$name',
   '$updatedTimeStamp',
   '$updatedTimeStamp'
      
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