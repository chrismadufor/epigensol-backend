<?php

require('config.php');

   $title=$_POST['title'];
      $title= str_replace("'", "\\'", $title);

   $q_id=$_POST['q_id'];


$result=$conn->query("SELECT *  FROM `answer` where `title`='$title' AND `q_id`='$q_id' AND `isDeleted`=false");
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;
}
    if(count($data)>0){
        echo "already exists";
    }else {
          $insert = mysqli_query($conn,
  "INSERT INTO `answer`(
   title,
   q_id
      )
      VALUES(
   '$title',
   '$q_id'
      
      )"
            );
 
    if($insert){
           $last_id = mysqli_insert_id($conn);
               
                echo $last_id;
    }
    else{
        echo "error";
        
    }
    }


    $conn->close();
    return;

?>