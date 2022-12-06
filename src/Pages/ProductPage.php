<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="../Common/styles.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/8d6784f1e8.js" crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>ASSIGNMENT</title>

    <style>
        /* Create a custom radio button */
        body {
            font-family: 'open sans';
            overflow-x: hidden;
        }

        img {
            max-width: 100%;
        }

        .preview {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
        }

        @media screen and (max-width: 996px) {
            .preview {
                margin-bottom: 20px;
            }
        }

        .preview-pic {
            -webkit-box-flex: 1;
            -webkit-flex-grow: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
        }

        .preview-thumbnail.nav-tabs {
            border: none;
            margin-top: 15px;
        }

        .preview-thumbnail.nav-tabs li {
            width: 18%;
            margin-right: 2.5%;
        }

        .preview-thumbnail.nav-tabs li img {
            max-width: 100%;
            display: block;
        }

        .preview-thumbnail.nav-tabs li a {
            padding: 0;
            margin: 0;
        }

        .preview-thumbnail.nav-tabs li:last-of-type {
            margin-right: 0;
        }

        .tab-content {
            overflow: hidden;
        }

        .tab-content img {
            width: 100%;
            -webkit-animation-name: opacity;
            animation-name: opacity;
            -webkit-animation-duration: .3s;
            animation-duration: .3s;
        }

        .card {
            margin-top: 50px;
            background: #fbfbfb;
            padding: 3em;
            line-height: 1.5em;
        }

        @media screen and (min-width: 997px) {
            .wrapper {
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: flex;
            }
        }

        .details {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
        }

        .colors {
            -webkit-box-flex: 1;
            -webkit-flex-grow: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
        }

        .product-title,
        .price,
        .sizes,
        .colors {
            text-transform: UPPERCASE;
            font-weight: bold;
        }

        .checked,
        .price span {
            color: #ff9f1a;
        }

        .product-title,
        .rating,
        .product-description,
        .price,
        .vote,
        .sizes {
            margin-bottom: 15px;
        }

        .product-title {
            margin-top: 0;
        }

        .size {
            margin-right: 10px;
        }

        .size:first-of-type {
            margin-left: 40px;
        }

        .color {
            display: inline-block;
            vertical-align: middle;
            margin-right: 10px;
            height: 2em;
            width: 2em;
            border-radius: 2px;
        }

        .color:first-of-type {
            margin-left: 20px;
        }

        .add-to-cart,
        .like {
            background: #ff9f1a;
            padding: 1.2em 1.5em;
            border: none;
            text-transform: UPPERCASE;
            font-weight: bold;
            color: #fff;
            -webkit-transition: background .3s ease;
            transition: background .3s ease;
        }

        .add-to-cart:hover,
        .like:hover {
            background: #b36800;
            color: #fff;
        }

        .not-available {
            text-align: center;
            line-height: 2em;
        }

        .not-available:before {
            font-family: fontawesome;
            content: "\f00d";
            color: #fff;
        }

        .orange {
            background: #ff9f1a;
        }

        .green {
            background: #85ad00;
        }

        .blue {
            background: #0076ad;
        }

        .tooltip-inner {
            padding: 1.3em;
        }

        @-webkit-keyframes opacity {
            0% {
                opacity: 0;
                -webkit-transform: scale(3);
                transform: scale(3);
            }

            100% {
                opacity: 1;
                -webkit-transform: scale(1);
                transform: scale(1);
            }
        }

        @keyframes opacity {
            0% {
                opacity: 0;
                -webkit-transform: scale(3);
                transform: scale(3);
            }

            100% {
                opacity: 1;
                -webkit-transform: scale(1);
                transform: scale(1);
            }
        }
    </style>
    <script>
        function change_image(image) {
            var container = document.getElementById("main-image");
            container.src = image.src;
        }
        document.addEventListener("DOMContentLoaded", function(event) {});
    </script>


</head>

<body>
    <div class="root-container">

        <!-- Header  -->
        <div class="my-container my-bg-color-header sticky-top">
            <?php include_once './Components/header.php'; ?>
        </div>
        <div>
            <?php
            include_once './Components/menu.php';
            ?>
            <!-- Modals and Toasts -->
            <?php
            include_once './Components/modals.php';
            include_once './Components/toast.php';
            SignInDialog();
            SignUpDialog();
            SuccessSignUpDialog();
            PurchaseInfoDialog();
            showToast("Thông báo", "Đã thêm vào giỏ hàng");
            showRedToast("Thông báo", "Error");
            ?>
        </div>

        <?php
        if (isset($_SESSION['pid'])) {

            $configs = include_once('./Services/config.php');
            $host = $configs['db_host'];
            $username = $configs['db_username'];
            $password = $configs['db_password'];
            $dbname = $configs['db_name'];
            // Create connection
            $conn = new mysqli($host, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $listProducts = array();

            $sql_query = '
            SELECT ProductId, ProductName, Season, SalesPrice, Image1, Image2, Image3, Image4, c1.ControlName as "Category", c2.ControlName as "Brand", Description FROM product as p
            JOIN control as c1
                ON c1.ControlKey = "Category"
                AND c1.ControlCode = p.CategoryId
            JOIN control as c2
                ON c2.ControlKey = "Brand"
                AND c2.ControlCode = p.Brand
            WHERE p.ProductId = ' . $_SESSION['pid'] . '
            ';

            $item = null;
            $result = $conn->query($sql_query);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $item = new SuitDetails($row['ProductId'], $row['ProductName'], $row['Season'], $row['SalesPrice'], '../../assets/images/dbo/' . $row['Image1'], '../../assets/images/dbo/' . $row['Image2'], '../../assets/images/dbo/' . $row['Image3'], '../../assets/images/dbo/' . $row['Image4'], $row['Brand'], $row['Category'], $row['Description']);
                }
            } else {
            }
        }
        ?>


        <div class="row" style="padding:0px 60px 60px 60px;">
            <div class="card" style="width:80%; margin: 30px auto 0; ">
                <div class="container-fliud">
                    <div class="wrapper row">
                        <div class="preview col-md-6">

                            <div class="preview-pic tab-content">
                                <?php echo '
                                <div class="tab-pane active" id="pic-1"><img onclick="change_image(this)" id="main-image" src="' . (is_null($item) ? "" : $item->image1) . '" /></div>
                                ';
                                ?>

                                <ul class="preview-thumbnail nav nav-tabs" style="justify-content:center">
                                    <li>
                                        <?php echo '
                                            <a data-target="#pic-1" data-toggle="tab"><img onclick="change_image(this)" src="' . (is_null($item) ? "" : $item->image1) . '" /></a>
                                            ';
                                        ?>                                        
                                    </li>
                                    <li><a data-target="#pic-2" data-toggle="tab"><img onclick="change_image(this)" src="../Assets/Images/Temp/temp1.jpg" /></a></li>
                                    <li><a data-target="#pic-3" data-toggle="tab"><img onclick="change_image(this)" src="../Assets/Images/Temp/temp2.jpg" /></a></li>
                                </ul>
                            </div>

                        </div>
                        <div class="details col-md-6">
                            <h3 class="product-title"><?php if (!is_null($item)) echo $item->name ?></h3>
                            <div class="rating">
                                <span class="review-no">Mùa giải: <?php if (!is_null($item)) echo $item->year ?></span>
                                <div class="stars">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </div>
                            </div>
                            <p class="product-description"><?php if (!is_null($item)) echo $item->description ?></p>
                            <h4 class="price">Giá bán lẻ: <span><?php if (!is_null($item)) echo $item->price ?></span></h4>
                            <p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p>
                            <h5 class="sizes">sizes:
                                <div class="btn-group p_size" data-toggle="buttons">
                                    <input type="radio" class="btn-check" name="size" id="option1" autocomplete="off" checked>
                                    <label class="btn btn-outline-secondary" for="option1">S</label>

                                    <input type="radio" class="btn-check" name="size" id="option2" autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="option2">M</label>

                                    <input type="radio" class="btn-check" name="size" id="option3" autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="option3">L</label>

                                    <input type="radio" class="btn-check" name="size" id="option4" autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="option4">XL</label>

                                    <input type="radio" class="btn-check" name="size" id="option5" autocomplete="off">
                                    <label class="btn btn-outline-secondary" for="option5">XXL</label>
                                </div>
                            </h5>
                            <h5 class="colors">types:
                                <input type="radio" class="btn-check" name="type" id="option6" autocomplete="off" checked>
                                <label class="btn btn-outline-secondary" for="option6">Dài tay</label>

                                <input type="radio" class="btn-check" name="type" id="option7" autocomplete="off">
                                <label class="btn btn-outline-secondary" for="option7">Ngắn tay</label>
                            </h5>
                            <div class="action">
                                <?php
                                if (!is_null($item)) echo '
                                <button class="add-to-cart btn btn-default" type="button" onclick="AddToCart('.$item->id.',\''.$item->name.'\',\''.$item->price.'\')">Thêm vào giỏ hàng</button>
                                ';
                                ?>
                                <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card" style="width:80%; margin: 30px auto 0; ">
            <div class="container-fliud">
                <h5 class="product-title">Phản hồi từ khách hàng</h5>
            </div>
        </div>

        <!-- Product  -->
        <div class="container">
            <?php include_once './Components/carousel.php';
            $list = array(
                new Suit("0", "Áo MU sân nhà", "2022", "120 000", "../Assets/Images/MU.jpg"),
                new Suit("0", "Áo MC sân nhà", "2022", "120 000", "../Assets/Images/MC.jpg"),
                new Suit("0", "Áo Ars sân nhà", "2022", "120 000", "../Assets/Images/Ars.jpg")
            );
            Carousel($list, "1");
            ?>
        </div>

        <div class="container">
            <h2>Product list by category</h2>
            <div class="row">
                <div class="col-4">
                    <!-- TEST  -->
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