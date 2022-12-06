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
    <title>BK Shop</title>
</head>

<body>

    <div class="root-container">

        <!-- Header  -->
        <div class="my-container sticky-top">
            <?php
            include_once './Components/header.php';
            include_once './Components/carousel.php';
            ?>
        </div>
        <div>
            <?php
            include_once './Components/menu.php';
            ?>
        </div>
        <!-- Sign in Modal -->
        <?php
        include_once './Components/sign-in-modal.php';
        SignInDialog();
        SignUpDialog();
        SuccessSignUpDialog();
        ?>
        <!-- Sign in Modal -->
        <?php
        include_once './Components/toast.php';
        showToast("Thông báo","Đã thêm vào giỏ hàng");
        showRedToast("Thông báo","Error");
        ?>

        <div class="my-space-10px"></div>
        <div class="container text-center">
            <div class="row" style="min-height: 440px;background-color: azure;">
                <div class="col-md-3 col-sm-12">
                    <div class="list-group" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action my-list-group-item active" id="list-1-list" data-bs-toggle="list" href="#list-1" role="tab" aria-controls="list-1">Áo CLB sân nhà</a>
                        <a class="list-group-item list-group-item-action my-list-group-item" id="list-2-list" data-bs-toggle="list" href="#list-2" role="tab" aria-controls="list-2">Áo CLB sân khách</a>
                        <a class="list-group-item list-group-item-action my-list-group-item" id="list-3-list" data-bs-toggle="list" href="#list-3" role="tab" aria-controls="list-3">Áo khoác CLB sân nhà</a>
                        <a class="list-group-item list-group-item-action my-list-group-item" id="list-4-list" data-bs-toggle="list" href="#list-4" role="tab" aria-controls="list-4">Áo khoác CLB sân khách</a>
                        <a class="list-group-item list-group-item-action my-list-group-item" id="list-2-list" data-bs-toggle="list" href="#list-5" role="tab" aria-controls="list-5">Áo ĐTQG sân nhà</a>
                        <a class="list-group-item list-group-item-action my-list-group-item" id="list-3-list" data-bs-toggle="list" href="#list-6" role="tab" aria-controls="list-6">Áo ĐTQG sân khách</a>
                        <a class="list-group-item list-group-item-action my-list-group-item" id="list-4-list" data-bs-toggle="list" href="#list-7" role="tab" aria-controls="list-7">Áo khoác ĐTQG sân nhà</a>
                        <a class="list-group-item list-group-item-action my-list-group-item" id="list-2-list" data-bs-toggle="list" href="#list-8" role="tab" aria-controls="list-8">Áo khoác ĐTQG sân khách</a>
                        <a class="list-group-item list-group-item-action my-list-group-item" id="list-3-list" data-bs-toggle="list" href="#list-9" role="tab" aria-controls="list-9">Giày bóng đá</a>
                        <a class="list-group-item list-group-item-action my-list-group-item" id="list-4-list" data-bs-toggle="list" href="#list-10" role="tab" aria-controls="list-10">Khác</a>
                    </div>
                </div>
                <div class="col-md-9 col-sm-12">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="list-1" role="tabpanel" aria-labelledby="list-1-list">
                            <?php
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

                            $sql_query = 'SELECT * FROM product WHERE CategoryId = 1 LIMIT 3;';

                            $result = $conn->query($sql_query);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    array_push($listProducts, new Suit($row['ProductId'], $row['ProductName'], $row['Season'], $row['SalesPrice'], '../../assets/images/dbo/' . $row['Image1']));
                                }
                            } else {
                                // $user_length = -1
                            }
                            SingleCarousel($listProducts, "1");
                            ?>
                        </div>
                        <div class="tab-pane fade" id="list-2" role="tabpanel" aria-labelledby="list-2-list">
                            <?php
                            $listProducts = array();

                            $sql_query = 'SELECT * FROM product WHERE CategoryId = 2 LIMIT 3;';

                            $result = $conn->query($sql_query);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    array_push($listProducts, new Suit($row['ProductId'], $row['ProductName'], $row['Season'], $row['SalesPrice'], '../../assets/images/dbo/' . $row['Image1']));
                                }
                            } else {
                                // $user_length = -1
                            }
                            SingleCarousel($listProducts, "2");
                            ?>
                        </div>
                        <div class="tab-pane fade" id="list-3" role="tabpanel" aria-labelledby="list-3-list">
                            <?php
                            $listProducts = array();
                            $cid = 3;

                            $sql_query = 'SELECT * FROM product WHERE CategoryId = ' . $cid . ' LIMIT 3;';

                            $result = $conn->query($sql_query);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    array_push($listProducts, new Suit($row['ProductId'], $row['ProductName'], $row['Season'], $row['SalesPrice'], '../../assets/images/dbo/' . $row['Image1']));
                                }
                            } else {
                                // $user_length = -1
                            }
                            if (count($listProducts) > 0) {
                                SingleCarousel($listProducts, $cid);
                            } else {
                                echo '<p>Chưa có sản phẩm nào</p>';
                            }
                            ?>
                        </div>
                        <div class="tab-pane fade" id="list-4" role="tabpanel" aria-labelledby="list-4-list">
                            <?php
                            $listProducts = array();
                            $cid = 4;

                            $sql_query = 'SELECT * FROM product WHERE CategoryId = ' . $cid . ' LIMIT 3;';

                            $result = $conn->query($sql_query);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    array_push($listProducts, new Suit($row['ProductId'], $row['ProductName'], $row['Season'], $row['SalesPrice'], '../../assets/images/dbo/' . $row['Image1']));
                                }
                            } else {
                                // $user_length = -1
                            }
                            if (count($listProducts) > 0) {
                                SingleCarousel($listProducts, $cid);
                            } else {
                                echo '<p>Chưa có sản phẩm nào</p>';
                            }
                            ?>
                        </div>
                        <div class="tab-pane fade" id="list-5" role="tabpanel" aria-labelledby="list-5-list">
                            <?php
                            $listProducts = array();
                            $cid = 5;

                            $sql_query = 'SELECT * FROM product WHERE CategoryId = ' . $cid . ' LIMIT 3;';

                            $result = $conn->query($sql_query);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    array_push($listProducts, new Suit($row['ProductId'], $row['ProductName'], $row['Season'], $row['SalesPrice'], '../../assets/images/dbo/' . $row['Image1']));
                                }
                            } else {
                                // $user_length = -1
                            }
                            if (count($listProducts) > 0) {
                                SingleCarousel($listProducts, $cid);
                            } else {
                                echo '<p>Chưa có sản phẩm nào</p>';
                            }
                            ?>
                        </div>
                        <div class="tab-pane fade" id="list-6" role="tabpanel" aria-labelledby="list-6-list">
                            <?php
                            $listProducts = array();
                            $cid = 6;

                            $sql_query = 'SELECT * FROM product WHERE CategoryId = ' . $cid . ' LIMIT 3;';

                            $result = $conn->query($sql_query);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    array_push($listProducts, new Suit($row['ProductId'], $row['ProductName'], $row['Season'], $row['SalesPrice'], '../../assets/images/dbo/' . $row['Image1']));
                                }
                            } else {
                                // $user_length = -1
                            }
                            if (count($listProducts) > 0) {
                                SingleCarousel($listProducts, $cid);
                            } else {
                                echo '<p>Chưa có sản phẩm nào</p>';
                            }
                            ?>
                        </div>
                        <div class="tab-pane fade" id="list-7" role="tabpanel" aria-labelledby="list-7-list">
                            <?php
                            $listProducts = array();
                            $cid = 7;

                            $sql_query = 'SELECT * FROM product WHERE CategoryId = ' . $cid . ' LIMIT 3;';

                            $result = $conn->query($sql_query);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    array_push($listProducts, new Suit($row['ProductId'], $row['ProductName'], $row['Season'], $row['SalesPrice'], '../../assets/images/dbo/' . $row['Image1']));
                                }
                            } else {
                                // $user_length = -1
                            }
                            if (count($listProducts) > 0) {
                                SingleCarousel($listProducts, $cid);
                            } else {
                                echo '<p>Chưa có sản phẩm nào</p>';
                            }
                            ?>
                        </div>
                        <div class="tab-pane fade" id="list-8" role="tabpanel" aria-labelledby="list-8-list">
                            <?php
                            $listProducts = array();
                            $cid = 8;

                            $sql_query = 'SELECT * FROM product WHERE CategoryId = ' . $cid . ' LIMIT 3;';

                            $result = $conn->query($sql_query);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    array_push($listProducts, new Suit($row['ProductId'], $row['ProductName'], $row['Season'], $row['SalesPrice'], '../../assets/images/dbo/' . $row['Image1']));
                                }
                            } else {
                                // $user_length = -1
                            }
                            if (count($listProducts) > 0) {
                                SingleCarousel($listProducts, $cid);
                            } else {
                                echo '<p>Chưa có sản phẩm nào</p>';
                            }
                            ?>
                        </div>
                        <div class="tab-pane fade" id="list-9" role="tabpanel" aria-labelledby="list-9-list">
                            <?php
                            $listProducts = array();
                            $cid = 9;

                            $sql_query = 'SELECT * FROM product WHERE CategoryId = ' . $cid . ' LIMIT 3;';

                            $result = $conn->query($sql_query);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    array_push($listProducts, new Suit($row['ProductId'], $row['ProductName'], $row['Season'], $row['SalesPrice'], '../../assets/images/dbo/' . $row['Image1']));
                                }
                            } else {
                                // $user_length = -1
                            }
                            if (count($listProducts) > 0) {
                                SingleCarousel($listProducts, $cid);
                            } else {
                                echo '<p>Chưa có sản phẩm nào</p>';
                            }
                            ?>
                        </div>
                        <div class="tab-pane fade" id="list-10" role="tabpanel" aria-labelledby="list-10-list">
                            <?php
                            $listProducts = array();
                            $cid = 10;

                            $sql_query = 'SELECT * FROM product WHERE CategoryId = ' . $cid . ' LIMIT 3;';

                            $result = $conn->query($sql_query);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    array_push($listProducts, new Suit($row['ProductId'], $row['ProductName'], $row['Season'], $row['SalesPrice'], '../../assets/images/dbo/' . $row['Image1']));
                                }
                            } else {
                                // $user_length = -1
                            }
                            if (count($listProducts) > 0) {
                                SingleCarousel($listProducts, $cid);
                            } else {
                                echo '<p>Chưa có sản phẩm nào</p>';
                            }
                            ?>
                        </div>
                    </div>
                    <button class="btn btn-link">Xem thêm</button>
                </div>
            </div>
        </div>

        <div class="my-space-30px"></div>
        <div class="container text-center">
            <div class="row">
                <div class="col-sm">
                    <div class="row">
                        <div class="col-4 col-sm-4 my-center-v20">
                            <i class="fa-solid fa-truck-fast" style="font-size: 55px;color: #006cd1;"></i>
                        </div>
                        <div class="col-8 col-sm-8 my-center-v20 my-text-align-left">
                            <h4>Giao hàng <br> miễn phí</h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="row">
                        <div class="col-4 col-sm-4 my-center-v20">
                            <i class="fa-solid fa-money-check-dollar" style="font-size: 55px;color: #006cd1;"></i>
                        </div>
                        <div class="col-8 col-sm-8 my-center-v20 my-text-align-left">
                            <h4>Thanh toán <br> nhanh chóng</h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="row">
                        <div class="col-4 col-sm-4 my-center-v20">
                            <i class="fa-solid fa-headset" style="font-size: 55px;color: #006cd1;"></i>
                        </div>
                        <div class="col-8 col-sm-8 my-center-v20 my-text-align-left">
                            <h4>Hỗ trợ <br> 24/24</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container text-center">
            <!-- <h2>Advertise (new product, sales off, etc)</h2> -->
            <?php

            $listDiscountProducts = array(
                new Suit("0", "Áo Chelsea sân nhà", "2022", "120 000", "../Assets/Images/Temp/chelsea1.jpg"),
                new Suit("1", "Áo Real sân nhà", "2022", "130 000", "../Assets/Images/Temp/real1.jpg"),
                new Suit("2", "Áo Arsenal sân nhà", "2022", "120 000", "../Assets/Images/Temp/arsenal1.jpg"),
                new Suit("3", "Áo Chelsea sân khách", "2022", "110 000", "../Assets/Images/Temp/chelsea2.jpg"),
                new Suit("4", "Áo Real sân khách", "2022", "110 000", "../Assets/Images/Temp/real2.jpg"),
                new Suit("5", "Áo Arsenal sân khách", "2022", "110 000", "../Assets/Images/Temp/arsenal2.jpg"),
            );
            $listNewProducts = array(
                new Suit("6", "Áo MU sân nhà", "2022", "120 000", "../Assets/Images/Temp/MU1.jpg"),
                new Suit("7", "Áo Real sân nhà", "2022", "120 000", "../Assets/Images/Temp/real1.jpg"),
                new Suit("8", "Áo Barca sân nhà", "2022", "120 000", "../Assets/Images/Temp/barca1.jpg"),
                new Suit("9", "Áo MC sân nhà", "2022", "120 000", "../Assets/Images/Temp/MC1.jpg"),
                new Suit("10", "Áo Arsenal sân nhà", "2022", "120 000", "../Assets/Images/Temp/arsenal1.jpg"),
                new Suit("11", "Áo Arsenal sân khách", "2022", "110 000", "../Assets/Images/Temp/arsenal2.jpg")
            );
            $listBestProducts = array(
                new Suit("12", "Áo Chelsea sân khách", "2022", "110 000", "../Assets/Images/Temp/chelsea2.jpg"),
                new Suit("13", "Áo Real sân khách", "2022", "110 000", "../Assets/Images/Temp/real2.jpg"),
                new Suit("10", "Áo Arsenal sân nhà", "2022", "120 000", "../Assets/Images/Temp/arsenal1.jpg"),
                new Suit("11", "Áo Arsenal sân khách", "2022", "110 000", "../Assets/Images/Temp/arsenal2.jpg")
            );
            echo '<div class="my-space-30px"></div>';
            Carousel($listDiscountProducts, "1", "Sản phẩm đang giảm giá");
            echo '<div class="my-space-30px"></div>';
            Carousel($listNewProducts, "2", "Sản phẩm mới");
            echo '<div class="my-space-30px"></div>';
            Carousel($listBestProducts, "3", "Sản phẩm bán chạy");
            ?>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Product  -->
                    <div class="my-products">
                        <?php include_once './Components/products.php'; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer  -->
        <div class="container my-bg-color-footer">
            <?php include './Components/footer.php'; ?>
        </div>

    </div>

    <!-- external scripts -->
    <script type="text/javascript" src="../Common/common.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <!-- external scripts -->
</body>

</html>