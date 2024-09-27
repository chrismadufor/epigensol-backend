<?php
header('Access-Control-Allow-Origin: *');

require('config.php');

   $title=$_POST['title'];
    $body=$_POST['body'];
        $thumb_url=$_POST['thumb_url'];
    
 
      $createdTimeStamp = date("Y-m-d H:i:s");  
      
      $result=$conn->query("SELECT *  FROM `blog` where `title`='$title'");
$data=array();
while($row=$result->fetch_assoc()){
    $data[]=$row;
}
    if(count($data)>0){
           $dataE['status']=false;
           $dataE['msg']="title already exist";
           
           echo json_encode($dataE);
$conn->close();
return;
    
    }else {
                  $insert = mysqli_query($conn,
  "INSERT INTO `blog`(
    title,
     body,
      created_at,
      updated_at,
      thumb_url
      )
      VALUES(
      '$title',
     '$body',
      '$createdTimeStamp',
            '$createdTimeStamp',
            '$thumb_url'
      )"
            );
 
    if($insert){
               
              $data['status']=true;
           $data['msg']="success";
          $data['id']= mysqli_insert_id($conn);;
           
    }
    else{
        $data['status']=false;
           $data['msg']="error";
        
    }
    echo json_encode($data);
$conn->close();
return;
    }
      

    



?>