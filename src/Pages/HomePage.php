<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="../Common/styles.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>BK Shop</title>
</head>

<body>

    <div class="root-container">

        <!-- Header  -->
        <div class="my-container my-bg-color-header sticky-top">
            <?php include './Components/header.php'; ?>
        </div>

        <div class="container">
            <h2>Advertise (new product, sales off, etc)</h2>
            <?php include './Components/carousel.php'; ?>
        </div>

        <div class="container">
            <h2>Product list by category</h2>
            <div class="row">
                <div class="col-4">
                    <!-- TEST  -->
                    <div>
                        <?php include './Components/test.php'; ?>
                    </div>
                </div>
                <div class="col-8">
                    <!-- Product  -->
                    <div class="my-products">
                        <?php include './Components/products.php'; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <h2>Best seller</h2>
            <div class="row">
                <div class="col-12">
                    <!-- TEST  -->
                    <div>
                        <?php include './Components/test.php'; ?>
                    </div>
                </div>
                <div class="col-12">
                    <!-- Product  -->
                    <div class="my-products">
                        <?php include './Components/products.php'; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer  -->
        <div class="container my-bg-color-footer">
            <?php include './Components/footer.php'; ?>
        </div>

        <div class="grid text-center">
            <div class="g-col-6">.g-col-6</div>
            <div class="g-col-6">.g-col-6</div>
        </div>

    </div>

    <!-- external scripts -->
    <script type="text/javascript" src="../Common/common.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <!-- external scripts -->
</body>

</html>