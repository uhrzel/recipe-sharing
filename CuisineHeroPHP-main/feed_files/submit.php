<?php
    session_start();
    include '../DB/cred.php';
    $con = mysqli_connect($server, $username, $password, $dbname);
    
    // Assuming the price is submitted via POST and stored in $_POST['price']
    $price = $_POST['price'];

    $query1 = "SELECT MAX(food_id) AS 'food_id' FROM food";
    $sql1 = mysqli_query($con, $query1);
    $row2 = mysqli_fetch_assoc($sql1);
    $fID = intval($row2['food_id']) + 1;

    $ingsArray = $_POST["ingArray"];
    $ing = array_merge(...$ingsArray);
    $ings = implode("','", $ing);

    $ingsAmt = $_POST["ingAmt"];
    $amt = array_merge(...$ingsAmt);
    $amts = implode("','", $amt);

    $categ = $_POST["categ"];

    $sql = "INSERT INTO $categ ($categ_name, $categ_amt, food_id, price) 
            VALUES ('$ings', '$amts', '$fID', '$price')";
    
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . mysqli_error($con);
    }
?>
<?php
    session_start();
    include '../DB/cred.php';
    $con = mysqli_connect($server, $username, $password, $dbname);
    
    // Assuming the price is submitted via POST and stored in $_POST['price']
    $price = $_POST['price'];

    $query1 = "SELECT MAX(food_id) AS 'food_id' FROM food";
    $sql1 = mysqli_query($con, $query1);
    $row2 = mysqli_fetch_assoc($sql1);
    $fID = intval($row2['food_id']) + 1;

    $ingsArray = $_POST["ingArray"];
    $ing = array_merge(...$ingsArray);
    $ings = implode("','", $ing);

    $ingsAmt = $_POST["ingAmt"];
    $amt = array_merge(...$ingsAmt);
    $amts = implode("','", $amt);

    $categ = $_POST["categ"];

    $sql = "INSERT INTO $categ ($categ_name, $categ_amt, food_id, price) 
            VALUES ('$ings', '$amts', '$fID', '$price')";
    
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . mysqli_error($con);
    }
?>
