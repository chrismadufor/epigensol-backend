<?php
require('config.php');

$searchQuery = isset($_GET['q']) ? $_GET['q'] : ''; // Get the search query from the URL parameter 'q'

$searchQuery = $conn->real_escape_string($searchQuery); // Sanitize input to prevent SQL injection

$query = "SELECT  product.*,product_cat.title as cat_name
FROM product
INNER JOIN product_cat ON product.cat_id=product_cat.id
";

if (!empty($searchQuery)) {
    // Add the search condition if the search query is provided
    $query .= "WHERE product.title LIKE '%$searchQuery%'";
}

$result = $conn->query($query);
$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
$conn->close();
return;
?>

