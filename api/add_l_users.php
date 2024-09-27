<?php

require('config.php');

   $email=$_POST['email'];
   $password=$_POST['password'];
   $l_name=$_POST['l_name'];
    $f_name=$_POST['f_name'];
    
    
    function hashPassword($password) {
    // You may want to adjust the cost parameter based on your server's performance
    $options = ['cost' => 12];
    return password_hash($password, PASSWORD_BCRYPT, $options);
}
  
$encodedPassword = hashPassword($password);
$result=$conn->query("SELECT * FROM `users` where `email`='$email'");

$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;
}
    if(count($data)>0){
        echo "email already exists";
    }else {
          $insert = mysqli_query($conn,
  "INSERT INTO `users`(
     email,
     password,
      l_name,
      f_name
      )
      VALUES(
   '$email',
   '$encodedPassword',
   '$l_name',
   '$f_name'
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