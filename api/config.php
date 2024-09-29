<?php
// Allow requests from all origins
header("Access-Control-Allow-Origin: *");
// Allow the following methods
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
// Allow the following headers
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

$servername="localhost";
$username="evanrgve_clinic";
$password="W..Cbanf@Vkf";
$dbname="evanrgve_clinic";

//create connection 
$conn=new mysqli($servername, $username,   $password,$dbname);

// check connection
if($conn->connect_error){
    die("Connection Faild: " . $conn->connect_error);
    return;
}

// // Test Database connection details
// $host = 'localhost';
// $port = '8889';
// $username = 'root';
// $pass = 'root';
// $db = 'evanrgve_clinic';

// // Create a connection
// $conn = new mysqli($host, $username, $pass, $db, $port);

// // Check the connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// } else {
//     // echo "Connected successfully!";
// }

?>