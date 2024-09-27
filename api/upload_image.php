<?php
// Allow requests from all origins
header("Access-Control-Allow-Origin: *");
// Allow the following methods
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
// Allow the following headers
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

require('config.php');

$image=$_FILES['image']["name"];
$name=$_POST['name'];
$size=$_FILES['image']["size"];
$imageUrl='';
$status='';



// $imagePath='../images/'.$image;
// $tmp_name=$_FILES['image']["tmp_name"];
// $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $tmp_name);
// $newfilename = round(microtime(true)) . '.' . end($withoutExt);

 
 
function compressImage($source, $destination, $quality) { 
    // Get image info 
    $imgInfo = getimagesize($source); 
    $mime = $imgInfo['mime']; 
     
    // Create a new image from file 
    switch($mime){ 
        case 'image/jpeg': 
            $image = imagecreatefromjpeg($source); 
            break; 
        case 'image/png': 
            $image = imagecreatefrompng($source); 
            break; 
        case 'image/gif': 
            $image = imagecreatefromgif($source); 
            break; 
        default: 
            $image = imagecreatefromjpeg($source); 
    } 
     
    // Save image 
    imagejpeg($image, $destination, $quality); 
     
    // Return compressed image 
    return $destination; 
} 
 
 
// File upload path 
$uploadPath = "../images/"; 
 
// If file upload form is submitted 
$status = $statusMsg = ''; 

    $status = 'error';
    
    if($_FILES['image']["size"]<=10000000){
        
    if(!empty($_FILES["image"]["name"])) { 
        // File info 
        $fileName = basename($_FILES["image"]["name"]); 
        $imageUploadPath = $uploadPath . $fileName; 
        $fileType = pathinfo($imageUploadPath, PATHINFO_EXTENSION); 
        
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            // Image temp source 
            $imageTemp = $_FILES["image"]["tmp_name"]; 
             
            // Compress size and upload image 
            $compressedImage = compressImage($imageTemp, $imageUploadPath, 75); 
             
            if($compressedImage){ 
            
                $status="https://app.epigensol.co.uk/images/$fileName";
           
            }else{ 
                  $status = "3"; 
            } 
        }else{ 
                 $status = "2";
                 //"Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload";
      
        } 
    }
    }
    else{
        //"Image size must be less the 1MB";
        $status="1";
    }

 
// Display status message 

  echo $status; 



 






?>