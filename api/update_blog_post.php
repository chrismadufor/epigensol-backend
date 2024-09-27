<?php

 require('config.php');

  $body=$_POST['body'];
     $body =  str_replace("'", "\\'", $body);
  $title=$_POST['title']; 
  $title =  str_replace("'", "\\'", $title);
  $thumbImageUrl=$_POST['thumbImageUrl'];
  $status=$_POST['status'];
    $id=$_POST['id'];
     $fileName=$_POST['fileName'];
   $updatedTimeStamp = date("Y-m-d H:i:s"); 
  
      
     $newName="../blogPost/$fileName";
    if(unlink($newName)){
        
    $fp = fopen($newName, 'a');
    fwrite($fp, $body);
    fclose($fp);
    $body="https://app.epigensol.co.uk/blogPost/$fileName";
  $sql = "UPDATE `blogPost` SET 

  `body`='$body',
  `title`='$title',
  `thumbImageUrl`='$thumbImageUrl',
  `status`='$status',
  `updatedTimeStamp` ='$updatedTimeStamp'
   WHERE `blogPost`.`id` = '$id'";

  $update = mysqli_query($conn, $sql );
            
 
    if($update){
               
                echo "success";
    }
    else{
        echo "error";
        
    }
    }
    else { echo "error";}
    $conn->close();
    return;

?>