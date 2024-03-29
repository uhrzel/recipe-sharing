<?php
session_start();
include '../DB/cred.php';

// Check if user is logged in
$email = isset($_SESSION['email']) ? $_SESSION['email'] : null;

// Connect to database
$con = mysqli_connect($server, $username, $password, $dbname);

// Check if connection is successful
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the food ID from the form data
    $foodId = $_POST['food_id'];

    // Get other form inputs
    $foodName = $_POST['foodName'];
    $cookTime = $_POST['cookTime'];
    $prepTime = $_POST['prepTime'];
    $servings = $_POST['servings'];
    $videoLink = $_POST['videoLink'];
    $proceed = $_POST['proceed'];
    $nutriInfo = $_POST['nutriInfo'];
    $price = $_POST['price'];

    // Check if a new image is uploaded
    if (isset($_FILES['foodImg']['tmp_name']) && $_FILES['foodImg']['tmp_name'] != '') {

        $targetDir = "../Ingredients/Images/";
        $imageName = time() . '.png';
        $targetFile = $targetDir . $imageName;

        if (move_uploaded_file($_FILES['foodImg']['tmp_name'], $targetFile)) {

            $updateImageQuery = "UPDATE recipe_images SET food_img = '$imageName' WHERE food_id = '$foodId'";
            $result = mysqli_query($con, $updateImageQuery);
            if (!$result) {

                echo "Error updating image: " . mysqli_error($con);
            }
        } else {
            // Failed to move uploaded image
            echo "Error uploading image";
        }
    }


    $updateFoodQuery = "UPDATE food SET 
                        food_name = '$foodName',
                        cook_time = '$cookTime',
                        prep_time = '$prepTime',
                        servings = '$servings',
                        video_link = '$videoLink',
                        proced = '$proceed',
                        nutri_info = '$nutriInfo',
                        price = '$price'
                        WHERE food_id = '$foodId'";

    $result = mysqli_query($con, $updateFoodQuery);

    if ($result) {

        

        echo "Food information updated successfully";
    } else {
        // Failed to update food information
        echo "Error updating food information: " . mysqli_error($con);
    }
} else {
    // Request method is not POST
    echo "Invalid request method";
}
