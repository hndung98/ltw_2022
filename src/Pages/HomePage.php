<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="./Common/styles.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>BK Shop</title>
</head>
<?php

$server = "localhost";
$username = "root";
$password = "dunghoang";
$dbname = "dbo";
// Create connection
$conn = new mysqli($server, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    echo '<script type="text/javascript">console.log("Connected failed")</script>';
}
echo '<script type="text/javascript">console.log("Connected successfully")</script>';

$sql = "SELECT * FROM dbo.User;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo '<script type="text/javascript">console.log("Username: ' . $row["Username"] . '")</script>';
        echo '<script type="text/javascript">console.log("Name: ' . $row["FirstName"] . ' ' . $row["LastName"] . '")</script>';
    }
} else {
    echo "0 results";
}

$conn->close();

?>

<body>

    <div class="root-container">

        <!-- Header  -->
        <div class="my-container my-bg-color-header sticky-top">
            <?php include './Components/header.php'; ?>
        </div>

        <!-- Product  -->
        <div class="my-products">
            <?php include './Components/products.php'; ?>
        </div>


        <!-- TEST  -->
        <div>
            <?php include './Components/test.php'; ?>
        </div>

        <!-- Footer  -->
        <div class="container my-bg-color-footer">
            <?php include './Components/footer.php'; ?>
        </div>

    </div>

    <!-- external scripts -->
    <script type="text/javascript" src="./Common/common.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <!-- external scripts -->
</body>

</html>