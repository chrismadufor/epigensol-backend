<?php

function updateTimeSlot() {
    // Retrieve parameters from POST request
    $serviceTimeMin = $_POST['serviceTimeMin'] ?? null;
    $timeSlots = $_POST['timeSlots'] ?? null;
    $date = $_POST['date'] ?? null;
    $appointmentId = $_POST['appointmentId'] ?? null;
    $doctId = $_POST['doctId'] ?? null;

    // Check if any parameter is missing
    if (is_null($serviceTimeMin) || is_null($timeSlots) || is_null($date) || is_null($appointmentId) || is_null($doctId)) {
        return "error";
    }

    // Firestore REST API URL
    $url = "https://firestore.googleapis.com/v1/projects/epigensol-app/databases/(default)/documents/bookedTimeSlots/$doctId/$doctId/$date";

    // Firestore REST API request body
    $data = [
        "fields" => [
            "bookedTimeSlots" => [
                "arrayValue" => [
                    "values" => [
                        [
                            "mapValue" => [
                                "fields" => [
                                    "bookedTime" => ["stringValue" => $timeSlots],
                                    "forMin" => ["stringValue" => $serviceTimeMin],
                                    "appointmentId" => ["stringValue" => $appointmentId]
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ]
    ];

    // Encode data to JSON
    $json_data = json_encode($data);

    // Initialize cURL session
    $ch = curl_init($url);

    // Set cURL options
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Content-Length: ' . strlen($json_data)
    ]);

    // Execute cURL session
    $response = curl_exec($ch);

    // Check for errors
    if (curl_errno($ch)) {
        return "error";
    }

    // Close cURL session
    curl_close($ch);

    return $response;
}

// Call the function
echo updateTimeSlot();

?>
