<?php

require('config.php');
      $id=$_POST['id'];
      $pCity=$_POST['pCity'];
      $age=$_POST['age'];
      $pEmail=$_POST['pEmail'];
      $pFirstName=$_POST['pFirstName'];
      $pLastName=$_POST['pLastName'];
      $pPhn=$_POST['pPhn'];
      $description=$_POST['description'];
      $searchByName=$_POST['searchByName'];
       $gender=$_POST['gender'];
 
      $updatedTimeStamp = date("Y-m-d H:i:s"); 

 
    

  $sql= "UPDATE `appointments` SET
      `updatedTimeStamp` = '$updatedTimeStamp',
      `pCity`='$pCity',
      `age`='$age',
      `pEmail`='$pEmail',
      `gender`='$gender',
      `pFirstName`='$pFirstName',
      `pLastName`='$pLastName',
      `pPhn`='$pPhn',
      `description`='$description',
      `searchByName`='$searchByName'
 
  WHERE `appointments`.`id` = $id";

  $update = mysqli_query($conn,$sql);
            
 
    if($update){
               
                echo "success";
    }
    else{
        echo "error";
        
    }
    $conn->close();
    return;

?>