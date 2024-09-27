<?php

require('config.php');

   $title=$_POST['title'];
   $title= str_replace("'", "\\'", $title);


$result=$conn->query("SELECT *  FROM `question` where `title`='$title' AND `isDeleted`=false");
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;
}
    if(count($data)>0){
        echo "already exists";
    }else {
          $insert = mysqli_query($conn,
  "INSERT INTO `question`(
   title
      )
      VALUES(
   '$title'
      
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