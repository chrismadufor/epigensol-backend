<?php

require('config.php');


$firstName="name";
$userdata= array();
  $insert = mysqli_query($conn,
  "INSERT INTO `test`(
      name
      )
      VALUES(
     '$firstName'
      )");
 
    if($insert){
     
			$userdata['status'] = 'true';
				$userdata['id'] = $conn->insert_id;
		
               
    }
    else{
        	$userdata['status'] = 'false';
    }
    echo json_encode($userdata);
    $conn->close();
    return;

?>