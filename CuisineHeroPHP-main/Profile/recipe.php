<?php
include '../DB/cred.php';
$email = isset($_SESSION['email']) ? $_SESSION['email'] : null;

$con = mysqli_connect($server, $username, $password, $dbname);
$query = "SELECT * FROM acc WHERE email = '$email'";
$queryf = "SELECT food.*, recipe_images.food_img FROM food JOIN recipe_images ON food.food_id = recipe_images.food_id WHERE food.author = '$email'";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <link rel="shortcut icon" href="../Images/logo white.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.css">
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Krub' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php
    if ($result = $con->query($queryf)) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="card col-12 col-md-4">
            <a href="javascript:void(0)" class="link" var="' . $row['food_id'] . '">
                <div class="foodpic recp-tab">';
            $queryImg = "SELECT * FROM recipe_images WHERE food_id=" . $row['food_id'] . "";
            $resultImg = $con->query($queryImg);
            $rowImg = $resultImg->fetch_assoc();
            echo '<img class="img-fluid" src="../Ingredients/Images/' . $rowImg['food_img'] . '">
                </div>
                <div class="foodlabel">
                    <h2>' . $row['food_name'] . '</h2>         
                    <p>Date Posted: ' . substr($row['regdate'], 0, 16) . '</p>';
            // Display status
            echo '<p>Status: ' . $row['status'] . '</p>';
            echo '</div>
            </a>
            <div class="buttons">
        
                    <input type="hidden" name="food_id" value="' . $row['food_id'] . '">
                    <button class="btn" data-toggle= "modal" data-target="#editModal' . $row['food_id'] . '">Edit</button>
    
               
                    <input type="hidden" name="food_id" value="' . $row['food_id'] . '">
                    <button class="btn options delete-button" data-toggle="modal" data-target="#deleteModal' . $row['food_id'] . '">Delete</button>
   
            </div>
        </div>';

            //for edit

            echo '<div class="modal fade" id="editModal' . $row['food_id'] . '" tabindex="-1" role="dialog" aria-labelledby="editModalLabel' . $row['food_id'] . '" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel' . $row['food_id'] . '">Edit Food</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
        <label for="foodImg">Current Food Image</label>
        <img class="img-fluid" src="../Ingredients/Images/' . $rowImg['food_img'] . '" style="width: 200px; height: auto;">
    </div>
                            <form id="editForm' . $row['food_id'] . '">
                                   <div class="form-group">
            <label for="foodImg">Choose New Food Image</label>
            <input type="file" class="form-control-file" id="foodImg' . $row['food_id'] . '" name="foodImg" accept="image/*">
        </div>
                                <div class="form-group">
                                    <label for="foodName">Food Name</label>
                                    <input type="text" class="form-control" id="foodName' . $row['food_id'] . '" name="foodName" value="' . $row['food_name'] . '" style="color: black;">
                                </div>
                                <div class="form-group">
                                    <label for="cookTime">Cook Time</label>
                                    <input type="text" class="form-control" id="cookTime' . $row['food_id'] . '" name="cookTime" value="' . $row['cook_time'] . '" style="color: black;">
                                </div>
                                  <div class="form-group">
                                    <label for="prepTime">Prep Time</label>
                                    <input type="text" class="form-control" id="prepTime' . $row['food_id'] . '" name="prepTime" value="' . $row['prep_time'] . '" style="color: black;">
                                </div>
                                 <div class="form-group">
                                    <label for="servings">Servings</label>
                                    <input type="text" class="form-control" id="servings' . $row['food_id'] . '" name="servings" value="' . $row['servings'] . '" style="color: black;">
                                </div>
                                 <div class="form-group">
                                    <label for="videoLink">Video Link</label>
                                    <input type="text" class="form-control" id="videoLink' . $row['food_id'] . '" name="videoLink" value="' . $row['video_link'] . '" style="color: black;">
                                </div>
                                 <div class="form-group">
                                    <label for="proceed">Proceed</label>
                                    <input type="text" class="form-control" id="proceed' . $row['food_id'] . '" name="proceed" value="' . $row['proced'] . '" style="color: black;">
                                </div>
                                     <div class="form-group">
                                    <label for="nutriInfo">Nutri Info</label>
                                    <input type="text" class="form-control" id="nutriInfo' . $row['food_id'] . '" name="nutriInfo" value="' . $row['nutri_info'] . '" style="color: black;">
                                </div>
                                     <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" class="form-control" id="price' . $row['food_id'] . '" name="price" value="' . $row['price'] . '" style="color: black;">
                                </div>
                                <!-- Add more fields here for other properties you want to edit -->
                                <input type="hidden" name="food_id" value="' . $row['food_id'] . '">
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary save-edit" data-food-id="' . $row['food_id'] . '">Save Changes</button>
                        </div>
                    </div>
                </div>
            </div>';
            // End edit modal

            // Modal for delete confirmation
            echo '<div class="modal fade" id="deleteModal' . $row['food_id'] . '" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel' . $row['food_id'] . '" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel' . $row['food_id'] . '">Confirm Deletion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this item?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger confirm-delete" data-food-id="' . $row['food_id'] . '">Delete</button>
                    </div>
                </div>
            </div>
        </div>';
        }
    }
    ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $(".confirm-delete").click(function() {
                var foodId = $(this).data('food-id');
                $.ajax({
                    type: "POST",
                    url: "delete_food.php",
                    data: {
                        food_id: foodId
                    },
                    success: function(response) {
                        // Hide the modal
                        $('#deleteModal' + foodId).modal('hide');

                        location.reload();

                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });

        $(document).ready(function() {
            $(".save-edit").click(function() {
                var foodId = $(this).data('food-id');
                var formData = new FormData($("#editForm" + foodId)[0]);

                formData.append("foodId", foodId);

                $.ajax({
                    type: "POST",
                    url: "edit_food.php",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $('#editModal' + foodId).modal('hide');
                        location.reload();

                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
</body>

</html>