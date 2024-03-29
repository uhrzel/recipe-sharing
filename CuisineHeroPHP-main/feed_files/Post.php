<?php
include 'DB/cred.php';
$email = isset($_SESSION['email']) ? $_SESSION['email'] : null;

$con = mysqli_connect($server, $username, $password, $dbname);
$query = "SELECT * FROM food WHERE status != 'pending' AND status != 'cancelled' ORDER BY regdate DESC"; // Modify the query to exclude 'pending' and 'cancelled' statuses
if ($result = $con->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $food_id = $row['food_id'];
        $queryfood = "SELECT * FROM food WHERE food_id='$food_id'";
        $queryImg = "SELECT * FROM recipe_images WHERE food_id='$food_id'";
        /*$queryliked = "SELECT * FROM like_log WHERE food_id='$food_id' AND email='$email'";*/
        $result1 = $con->query($queryfood);
        while ($row1 = $result1->fetch_array()) {
            $email1 = $row1['author'];
            $queryname = "SELECT * FROM acc WHERE email='$email1'";
            $result2 = $con->query($queryname);
            // Check if there are rows in the result
            if ($result2 && $result2->num_rows > 0) {
                while ($row2 = $result2->fetch_array()) {
                    // Fetching user role
                    $userRole = $row2['role'];
                    // Display card only for users with admin role
                    if ($userRole == 'user') {
                        echo '<div class="card">
                        <a href="javascript:void(0)" class="link1" var="' . $row1['author'] . '">
                        <div class="dp">';
                        echo '<img src="Profile/images/' . $row2['dispic'] . '">
                        </div>
                        <div class="usrnm">
                        <p>' . $row2['firstname'] . ' ' . $row2['lastname'] . '</p>
                        </div></a>';
                        echo '<a href="javascript:void(0)" class="link" var="' . $row['food_id'] . '">
                        <div class="foodpic">';
                        $resultImg = $con->query($queryImg);
                        if ($resultImg) {
                            $rowImg = $resultImg->fetch_assoc();
                            if ($rowImg) {
                                echo '<img class="img-fluid" src="Ingredients/Images/' . $rowImg['food_img'] . '">';
                            } else {
                                echo "No image available for food ID: $food_id<br>"; // Debugging: Print if no image found
                            }
                        } else {
                            echo "Error executing query: " . $con->error . "<br>"; // Debugging: Print SQL error message
                        }
                        echo '</div>
                        <div class="foodlabel">
                        <h2>' . $row1['food_name'] . '</h2>         
                        <p>Date Posted: ' . substr($row1['regdate'], 0, 16) . '</p>
                        </div>
                        </a>
                        <form method="post" action="Profile/ingr-transfer.php" name="redirect" class="redirect">
                        <input type="hidden" class="post" name="post" value="">
                        <input type="submit" style="display: none;">
                        </form>
                        <form method="post" action="feed_files/to-profile.php" name="redirect1" class="redirect1">
                        <input type="hidden" class="post1" name="post1" value="">
                        <input type="submit" style="display: none;">
                        </form>
                        </div>';
                    }
                }
            }
        }
    }
}
