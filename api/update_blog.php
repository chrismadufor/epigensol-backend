<?php
header('Access-Control-Allow-Origin: *');
require('config.php');

   $title=$_POST['title'];
    $body=$_POST['body'];
        $thumb_url=$_POST['thumb_url'];
           $id=$_POST['id'];
    
   $updatedTimeStamp = date("Y-m-d H:i:s"); 
        $sql = "UPDATE `blog` SET 

  `title`='$title',
  `body`='$body',
  `thumb_url`='$thumb_url',
    `updated_at` = '$updatedTimeStamp'
  
WHERE `blog`.`id` = '$id'";

  $update = mysqli_query($conn, $sql );
            
 
    if($update){
              
     
              $data['status']=true;
           $data['msg']="success";
    }
    else{
        $data['status']=false;
           $data['msg']="error";
    
    }
    

echo json_encode($data);
$conn->close();
return;

?>

