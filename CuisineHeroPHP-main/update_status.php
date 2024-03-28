<?php
// Include database connection
include "./DB/cred.php";

// Check if food ID and status are set in the POST request
if (isset($_POST['foodId']) && isset($_POST['status'])) {
    // Sanitize input
    $foodId = mysqli_real_escape_string($con, $_POST['foodId']);
    $status = mysqli_real_escape_string($con, $_POST['status']);

    // Update status in the database
    $query = "UPDATE food SET status = '$status' WHERE food_id = '$foodId'";
    if (mysqli_query($con, $query)) {

        echo json_encode(array('success' => true));
    } else {
        // Error updating status
        echo json_encode(array('success' => false, 'message' => 'Error updating status.'));
    }
} else {
    // Invalid request
    echo json_encode(array('success' => false, 'message' => 'Invalid request.'));
}
