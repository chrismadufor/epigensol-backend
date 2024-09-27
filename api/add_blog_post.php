<?php

 require('config.php');

  $body=$_POST['body'];
    $body =  str_replace("'", "\\'", $body);
  $title=$_POST['title'];
      $title =  str_replace("'", "\\'", $title);
  $thumbImageUrl=$_POST['thumbImageUrl'];
  $status=$_POST['status'];
  
 
  $createdTimeStamp = date("Y-m-d H:i:s");  
  $updatedTimeStamp = date("Y-m-d H:i:s"); 
  
      
     $fileName = time();
     $newName="../blogPost/$fileName.text";
    $fp = fopen($newName, 'a');
    fwrite($fp, $body);
    fclose($fp);
    $body="https://app.epigensol.co.uk/blogPost/$fileName.text";
  $insert = mysqli_query($conn,
  "INSERT INTO `blogPost`(
         body,
         title,
         thumbImageUrl,
         status,
         fileName,
         
    createdTimeStamp,
     updatedTimeStamp

      )
      VALUES(

  '$body',
  '$title',
  '$thumbImageUrl',
  '$status',
     '$fileName.text',
   '$createdTimeStamp',

  '$updatedTimeStamp'

      )"
           );
    
 
    if($insert){
               
                echo "success";
    }
    else{
        echo "error";
        
    }
    $conn->close();
              
    return;



?>