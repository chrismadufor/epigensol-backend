<?php

require('config.php');

$doct_id = $_GET['doct_id'];

// Fetch reviews and calculate average rating
$result = $conn->query("SELECT *, AVG(rating) AS avg_rating, COUNT(*) AS rating_count FROM `doctors_review` WHERE doct_id = $doct_id");

$data = array();
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $avgRating = $row['avg_rating'];
    $ratingCount = $row['rating_count'];

    // Store average rating and rating count in the data array
    $data['average_rating'] = $avgRating;
    $data['rating_count'] = $ratingCount;
} else {
    $data['average_rating'] = 0;
    $data['rating_count'] = 0;
}



echo json_encode($data);

$conn->close();

return;

?>
