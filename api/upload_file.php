<?php 
require('config.php');


//Response object structure
$response = new stdClass;
$response->status = null;
$response->message = null;
$response->fileName = null;

//Uploading File
$base_filename = basename($_FILES["file"]["name"]);
$y="_";
$x = substr($base_filename, 0, strrpos($base_filename, '.'));
$finnalFileName=$x.$y;
$destination_dir = "../files/$finnalFileName";

//------
$temp = explode(".", $base_filename);
$target_file = $destination_dir .round(microtime(true)) . '.' . end($temp);
//$base_filename = basename($_FILES["file"]["name"]);
//$target_file = $destination_dir . $base_filename;

if (isset($_FILES["file"])) {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)){
            $fileName=substr($target_file, 9);
        $response->status = true;
        $response->message = "https://app.epigensol.co.uk/files/$fileName";
              $response->fileName = $fileName;
            
              
    }

    else {
        $response->status = false;
        $response->message = "file uploadeda faild";
         $response->fileName = "";
        
    }
}else{
    $response->status = false;
    $response->message = "file upload faild";
            $response->fileName = "";
}

header('Content-type: application/json');
echo json_encode($response);

?>