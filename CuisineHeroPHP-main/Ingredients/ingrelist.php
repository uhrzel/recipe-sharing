<html>

<body>
  <?php
  include '../DB/cred.php';
  $food_id = isset($_SESSION['food_id']) ? $_SESSION['food_id'] : null;

  $con = mysqli_connect($server, $username, $password, $dbname);
  $queryf = "SELECT * FROM food WHERE food_id = '$food_id'";
  $querym = "SELECT * FROM meat WHERE food_id = '$food_id'";
  $queryv = "SELECT * FROM veggies WHERE food_id = '$food_id'";
  $queryc = "SELECT * FROM condi WHERE food_id = '$food_id'";
  $queryfh = "SELECT * FROM fish WHERE food_id = '$food_id'";
  $queryo = "SELECT * FROM oil WHERE food_id = '$food_id'";
  $queryft = "SELECT * FROM fruit WHERE food_id = '$food_id'";
  $queryss = "SELECT * FROM spice WHERE food_id = '$food_id'";
  $queryd = "SELECT * FROM dairy WHERE food_id = '$food_id'";
  $queryds = "SELECT * FROM dessert WHERE food_id = '$food_id'";
  $querysc = "SELECT * FROM soup WHERE food_id = '$food_id'";
  $queryn = "SELECT * FROM nuts WHERE food_id = '$food_id'";
  $queryb = "SELECT * FROM bake WHERE food_id = '$food_id'";

  if ($result = $con->query($queryf)) {
    if ($result->num_rows > 0) {
      $row = mysqli_fetch_array($result);
      echo '<div class="col-12 col-md-6 foodImg">';
      $queryImg = "SELECT * FROM recipe_images WHERE food_id='$food_id'";
      $resultImg = $con->query($queryImg);
      $rowImg = $resultImg->fetch_assoc();
      echo "<img id='foodImg' src='images/" . $rowImg['food_img'] . "'>";
      echo '
        </div>
        <div class="col-12 col-md-5 adjust">
        <div class="container-fluid">
        <div class="row">
        <h1 class="col-12 col-md-6 Recipe-Name">';
      $foodname = $row["food_name"];
      echo $foodname;
      echo '</h1><h6 class="col-12">' . $row['likes'] . ' Like(s)</h6>
        <div class="col-12 Indention-Ing">
        Preparation Time: <span>' . $row['prep_time'] . '</span>
        </div>
        <div class="col-12 Indention-Ing">
        Cooking Time: <span>' . $row['cook_time'] . '</span>
        </div>
        <div class="col-12 Indention-Ing">
        Servings: <span>' . $row['servings'] . '</span>
        </div>';

      // Add the price display here
      echo '<div class="col-12 Indention-Ing">
        Price: <span>' . $row['price'] . '</span>
        </div>';

      echo '<h2 class="col-12 Ingredient-Title">
        Ingredients
        </h2>';
    }


    if ($result = $con->query($querym)) {
      if ($result->num_rows > 0) {
        echo '<h4 class="col-12 Indention-Ing">Meats:</h4>';
        while ($row = $result->fetch_assoc()) {
          $meatname = $row["meat_name"];
          $meatamt = $row["meat_amt"];
          echo '<div class="col-12 Indention-Ing">
                - ' . $meatname . ' ' . $meatamt . '
                </div>';
        }
      }
    }

    if ($result = $con->query($queryfh)) {
      if ($result->num_rows > 0) {
        echo '<h4 class="col-12 Indention-Ing">Fish/Seafood:</h4>';
        while ($row = $result->fetch_assoc()) {
          $fishname = $row["fish_name"];
          $fishamt = $row["fish_amt"];
          echo '<div class="col-12 Indention-Ing">
                - ' . $fishname . ' ' . $fishamt . '
                </div>';
        }
      }
    }

    if ($result = $con->query($queryo)) {
      if ($result->num_rows > 0) {
        echo '<h4 class="col-12 Indention-Ing">Oil/Liquid:</h4>';
        while ($row = $result->fetch_assoc()) {
          $oilname = $row["oil_name"];
          $oilamt = $row["oil_amt"];
          echo '<div class="col-12 Indention-Ing">
                - ' . $oilname . ' ' . $oilamt . '
                </div>';
        }
      }
    }


    if ($result = $con->query($queryv)) {
      if ($result->num_rows > 0) {
        echo '<h4 class="col-12 Indention-Ing">Vegetables:</h4>';
        while ($row = $result->fetch_assoc()) {
          $vegname = $row["veggies_name"];
          $vegamt = $row["veggies_amt"];
          echo '<div class="col-12 Indention-Ing">
      - ' . $vegname . ' ' . $vegamt . '
      </div>';
        }
      }
    }
    if ($result = $con->query($queryft)) {
      if ($result->num_rows > 0) {
        echo '<h4 class="col-12 Indention-Ing">Fruits:</h4>';
        while ($row = $result->fetch_assoc()) {
          $meatname = $row["fruit_name"];
          $meatamt = $row["fruit_amt"];
          echo '<div class="col-12 Indention-Ing">
      - ' . $meatname . ' ' . $meatamt . '
      </div>';
        }
      }
    }
    if ($result = $con->query($queryss)) {
      if ($result->num_rows > 0) {
        echo '<h4 class="col-12 Indention-Ing">Spices/Seasonings/Sweeteners:</h4>';
        while ($row = $result->fetch_assoc()) {
          $meatname = $row["spice_name"];
          $meatamt = $row["spice_amt"];
          echo '<div class="col-12 Indention-Ing">
      - ' . $meatname . ' ' . $meatamt . '
      </div>';
        }
      }
    }
    if ($result = $con->query($queryd)) {
      if ($result->num_rows > 0) {
        echo '<h4 class="col-12 Indention-Ing">Dairy:</h4>';
        while ($row = $result->fetch_assoc()) {
          $meatname = $row["dairy_name"];
          $meatamt = $row["dairy_amt"];
          echo '<div class="col-12 Indention-Ing">
      - ' . $meatname . ' ' . $meatamt . '
      </div>';
        }
      }
    }
    if ($result = $con->query($queryc)) {
      if ($result->num_rows > 0) {
        echo '<h4 class="col-12 Indention-Ing">Condiments:</h4>';
        while ($row = $result->fetch_assoc()) {
          $condiname = $row["condi_name"];
          $condiamt = $row["condi_amt"];
          echo '<div class="col-12 Indention-Ing">
      - ' . $condiname . ' ' . $condiamt . '
      </div>';
        }
      }
    }
    if ($result = $con->query($querysc)) {
      if ($result->num_rows > 0) {
        echo '<h4 class="col-12 Indention-Ing">Soup/Sauces:</h4>';
        while ($row = $result->fetch_assoc()) {
          $meatname = $row["soup_name"];
          $meatamt = $row["soup_amt"];
          echo '<div class="col-12 Indention-Ing">
        - ' . $meatname . ' ' . $meatamt . '
        </div>';
        }
      }
    }
    if ($result = $con->query($queryds)) {
      if ($result->num_rows > 0) {
        echo '<h4 class="col-12 Indention-Ing">Dessert/Snacks:</h4>';
        while ($row = $result->fetch_assoc()) {
          $meatname = $row["dessert_name"];
          $meatamt = $row["dessert_amt"];
          echo '<div class="col-12 Indention-Ing">
        - ' . $meatname . ' ' . $meatamt . '
        </div>';
        }
      }
    }
    if ($result = $con->query($queryn)) {
      if ($result->num_rows > 0) {
        echo '<h4 class="col-12 Indention-Ing">Nuts/Legumes:</h4>';
        while ($row = $result->fetch_assoc()) {
          $meatname = $row["nuts_name"];
          $meatamt = $row["nuts_amt"];
          echo '<div class="col-12 Indention-Ing">
        - ' . $meatname . ' ' . $meatamt . '
        </div>';
        }
      }
    }
    if ($result = $con->query($queryb)) {
      if ($result->num_rows > 0) {
        echo '<h4 class="col-12 Indention-Ing">Baking & Grains:</h4>';
        while ($row = $result->fetch_assoc()) {
          $meatname = $row["bake_name"];
          $meatamt = $row["bake_amt"];
          echo '<div class="col-12 Indention-Ing">
        - ' . $meatname . ' ' . $meatamt . '
        </div>';
        }
      }
    }

    echo '<h2 class="col-12 Ingredient-Title">
        Procedures
        </h2>';
    $result = $con->query($queryf);
    $row = $result->fetch_assoc();
    $procedure = $row["proced"];
    echo '<div class="col-12 Indention-Ing">
  - ' . $procedure . '
  </div>';

    echo '<h2 class="col-12 Ingredient-Title">
        Nutritional Information
        </h2>';
    $result = $con->query($queryf);
    $row = $result->fetch_assoc();
    $nutri_info = $row["nutri_info"];

    echo '<div class="col-12 Indention-Ing">
  - ' . $nutri_info . '
  </div>';


    echo '<h2 class="col-12 Ingredient-Title">
        Video Information
        </h2>';
    $result = $con->query($queryf);
    $row = $result->fetch_assoc();
    $vid_link = $row["video_link"];

    echo '<div class="col-12 Indention-Ing">
  - ' . $vid_link . '
  </div>';
  }
  ?>
</body>

</html>