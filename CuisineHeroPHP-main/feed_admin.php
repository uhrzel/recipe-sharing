<!DOCTYPE html>
<html lang="en">

<head>
    <title>Feed - CuisineHero</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="images/logo white.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css files\feedstyle.css">
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Krub' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md" id="banner">
            <div class="container-fluid" id="banner1">
                <a class="navbar-brand" href="feed.php"><img src="Images\logo white.png"></a>
                <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <img src="Images\burjer.png" width="30" height="20">
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link d-block d-sm-block d-md-none" href="index.html">CuisineHero</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Approvals</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Profile/admin_profile.php">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="DB/Logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
                <p class="navbar-center d-none d-md-block d-lg-block d-xl-block" id="navtext">CuisineHero</p>
        </nav>
    </header>
    <br><br>
    <div class="container mt-5">
        <table id="foodTable" class="display">
            <thead>
                <tr>
                    <th>Food ID</th>
                    <th>Author</th>
                    <th>Food Name</th>
                    <th>Cook Time</th>
                    <th>Prep Time</th>
                    <th>Servings</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "./DB/cred.php";
                $query = "SELECT * FROM food";
                $result = mysqli_query($con, $query);

                // Check if there are any rows returned
                if (mysqli_num_rows($result) > 0) {
                    // Loop through each row
                    while ($row = mysqli_fetch_assoc($result)) {
                        // Output data as table row
                ?>
                        <tr>
                            <td><?php echo $row['food_id']; ?></td>
                            <td><?php echo $row['author']; ?></td>
                            <td><?php echo $row['food_name']; ?></td>
                            <td><?php echo $row['cook_time']; ?></td>
                            <td><?php echo $row['prep_time']; ?></td>
                            <td><?php echo $row['servings']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td>
                                <?php if ($row["status"] === 'pending') { ?>
                                    <button class="approveBtn btn btn-success" data-food-id="<?php echo $row['food_id']; ?>">Complete</button>
                                    <button class="cancelBtn btn btn-danger" data-food-id="<?php echo $row['food_id']; ?>">Cancel</button>
                                <?php } else { ?>
                                    Completed
                                <?php } ?>
                            </td>
                        </tr>
                    <?php
                    }
                } else {
                    // If no rows found, display a message
                    ?>
                    <tr>
                        <td colspan="7">No data available</td>
                    </tr>
                <?php
                }

                // Close the result set
                mysqli_free_result($result);
                ?>
            </tbody>

        </table>
    </div>

    <script>
        $(document).ready(function() {
            $('#foodTable').DataTable();

            // Handle clicking on complete and cancel buttons
            $('#foodTable tbody').on('click', 'button.approveBtn', function() {
                var button = $(this);
                var foodId = button.data('food-id');

                // Send AJAX request to update status to 'Completed'
                $.ajax({
                    url: 'update_status.php',
                    method: 'POST',
                    data: {
                        foodId: foodId,
                        status: 'approved'
                    },
                    success: function(response) {
                        console.log('Status updated successfully.');
                        // Update the status cell in the corresponding row
                        button.closest('tr').find('td:nth-child(7)').text('approve');
                        // Disable the buttons since the status is now 'Completed'
                        button.prop('disabled', true).siblings('.cancelBtn').prop('disabled', true);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error('Error updating status:', error);
                    }
                });
            });

            $('#foodTable tbody').on('click', 'button.cancelBtn', function() {
                var button = $(this);
                var foodId = button.data('food-id');

                // Send AJAX request to update status to 'Cancelled'
                $.ajax({
                    url: 'update_status.php',
                    method: 'POST',
                    data: {
                        foodId: foodId,
                        status: 'cancelled'
                    },
                    success: function(response) {
                        console.log('Status updated successfully.');
                        // Update the status cell in the corresponding row
                        button.closest('tr').find('td:nth-child(7)').text('cancelled');
                        // Disable the buttons since the status is now 'Cancelled'
                        button.prop('disabled', true).siblings('.completeBtn').prop('disabled', true);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error('Error updating status:', error);
                    }
                });
            });
        });
    </script>
</body>

</html>