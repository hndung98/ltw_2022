<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="../Common/styles.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/8d6784f1e8.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>ASSIGNMENT</title>
</head>

<body>
    <?php
        echo 'Current product id = '.$_SESSION["pid"];
    ?>
    <div class="root-container">

        <!-- Header  -->
        <div class="my-container my-bg-color-header sticky-top">
            <?php include_once './Components/header.php'; ?>
        </div>
        <div>
            <?php
            include_once './Components/menu.php';
            ?>
        </div>

        <!-- Product  -->
        <div class="container">
            <?php include_once './Components/carousel.php';
            $list = array(
                new Suit("0", "Áo MU sân nhà", "2022", "120 000 VNĐ", "../Assets/Images/MU.jpg"),
                new Suit("0", "Áo MC sân nhà", "2022", "120 000 VNĐ", "../Assets/Images/MC.jpg"),
                new Suit("0", "Áo Ars sân nhà", "2022", "120 000 VNĐ", "../Assets/Images/Ars.jpg")
            );
            Carousel($list, "1");
            ?>
        </div>

        <div class="container">
            <h2>Product list by category</h2>
            <div class="row">
                <div class="col-4">
                    <!-- TEST  -->
                    <div>
                        <?php include_once './Components/test.php'; ?>
                    </div>
                </div>
                <div class="col-8">
                    <!-- Product  -->
                    <div class="my-products">
                        <?php include_once './Components/products.php'; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer  -->
        <div class="container my-bg-color-footer">
            <?php include_once './Components/footer.php'; ?>
        </div>

    </div>

    <!-- external scripts -->
    <script src="../Common/common.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <!-- external scripts -->
</body>

</html>