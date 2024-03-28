<?php
include '../DB/cred.php';
$email = isset($_SESSION['email']) ? $_SESSION['email'] : null;

$con = mysqli_connect($server, $username, $password, $dbname);
$query = "SELECT * FROM acc WHERE email = '$email'";
$queryf = "SELECT * FROM food WHERE author = '$email'";
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
                    <p>Date Posted: ' . substr($row['regdate'], 0, 16) . '</p>
                </div>
            </a>
            <div class="buttons">
        
                    <input type="hidden" name="food_id" value="' . $row['food_id'] . '">
                    <button class="btn" id="EditRecipe">Edit</button>
    
               
                    <input type="hidden" name="food_id" value="' . $row['food_id'] . '">
                    <button class="btn options delete-button" data-toggle="modal" data-target="#deleteModal' . $row['food_id'] . '">Delete</button>
   
            </div>
        </div>';

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

                        // Remove the card containing the deleted item
                        $('#deleteModal' + foodId).closest('.card').remove();
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