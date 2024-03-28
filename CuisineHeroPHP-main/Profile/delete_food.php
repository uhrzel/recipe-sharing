<?php
include '../DB/cred.php';

// Check if food_id is set and not empty
if (isset($_POST['food_id']) && !empty($_POST['food_id'])) {
    // Escape the food_id to prevent SQL injection
    $foodId = mysqli_real_escape_string($con, $_POST['food_id']);

    // Your deletion query here
    $query = "DELETE FROM food WHERE food_id = '$foodId'";

    // Perform the deletion
    if (mysqli_query($con, $query)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
} else {
    echo "Food ID is not set or empty";
}
