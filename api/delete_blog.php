<?php
header('Access-Control-Allow-Origin: *');

require('config.php');

   $id=$_POST['id'];

 
          $insert = mysqli_query($conn,
  "DELETE FROM blog WHERE id='$id'" );
 
    if($insert){
               
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