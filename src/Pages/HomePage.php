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
        <div class="my-container my-bg-color-header sticky-top">
            <?php
            include_once './Components/header.php';
            include_once './Components/carousel.php';
            ?>
        </div>
        <div class="container text-center">
            <div class="row" style="height: 440px;background-color: azure;">
                <div class="col-sm-3">
                    <div class="list-group" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action active" id="list-1-list" data-bs-toggle="list" href="#list-1" role="tab" aria-controls="list-1">Áo câu lạc bộ</a>
                        <a class="list-group-item list-group-item-action" id="list-2-list" data-bs-toggle="list" href="#list-2" role="tab" aria-controls="list-2">Áo đội tuyển</a>
                        <a class="list-group-item list-group-item-action" id="list-3-list" data-bs-toggle="list" href="#list-3" role="tab" aria-controls="list-3">Giày bóng đá</a>
                        <a class="list-group-item list-group-item-action" id="list-4-list" data-bs-toggle="list" href="#list-4" role="tab" aria-controls="list-4">Phụ kiện</a>
                        <a class="list-group-item list-group-item-action" id="list-2-list" data-bs-toggle="list" href="#list-5" role="tab" aria-controls="list-5">Áo đội tuyển</a>
                        <a class="list-group-item list-group-item-action" id="list-3-list" data-bs-toggle="list" href="#list-6" role="tab" aria-controls="list-6">Giày bóng đá</a>
                        <a class="list-group-item list-group-item-action" id="list-4-list" data-bs-toggle="list" href="#list-7" role="tab" aria-controls="list-7">Phụ kiện</a>
                        <a class="list-group-item list-group-item-action" id="list-2-list" data-bs-toggle="list" href="#list-8" role="tab" aria-controls="list-8">Áo đội tuyển</a>
                        <a class="list-group-item list-group-item-action" id="list-3-list" data-bs-toggle="list" href="#list-9" role="tab" aria-controls="list-9">Giày bóng đá</a>
                        <a class="list-group-item list-group-item-action" id="list-4-list" data-bs-toggle="list" href="#list-10" role="tab" aria-controls="list-10">Phụ kiện</a>
                    </div>
                </div>
                <div class="col-sm-9" style="">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="list-1" role="tabpanel" aria-labelledby="list-1-list">
                            <?php
                            $listProducts = array(
                                new Suit("0", "Áo Chelsea sân nhà", "2022", "120 000 VNĐ", "../Assets/Images/Temp/chelsea1.jpg"),
                                new Suit("1", "Áo Real sân nhà", "2022", "130 000 VNĐ", "../Assets/Images/Temp/real1.jpg"),
                                new Suit("2", "Áo Arsenal sân nhà", "2022", "120 000 VNĐ", "../Assets/Images/Temp/arsenal1.jpg"),
                            );
                            SingleCarousel($listProducts, "1");
                            ?>
                        </div>
                        <div class="tab-pane fade" id="list-2" role="tabpanel" aria-labelledby="list-2-list">
                            <p>list-2-list</p>
                        </div>
                        <div class="tab-pane fade" id="list-3" role="tabpanel" aria-labelledby="list-3-list">
                            <p>list-3-list</p>
                        </div>
                        <div class="tab-pane fade" id="list-4" role="tabpanel" aria-labelledby="list-4-list">
                            <p>list-4-list</p>
                        </div>
                        <div class="tab-pane fade" id="list-5" role="tabpanel" aria-labelledby="list-5-list">
                            <p>list-5-list</p>
                        </div>
                        <div class="tab-pane fade" id="list-6" role="tabpanel" aria-labelledby="list-6-list">
                            <p>list-6-list</p>
                        </div>
                        <div class="tab-pane fade" id="list-7" role="tabpanel" aria-labelledby="list-7-list">
                            <p>list-7-list</p>
                        </div>
                        <div class="tab-pane fade" id="list-8" role="tabpanel" aria-labelledby="list-8-list">
                            <p>list-8-list</p>
                        </div>
                        <div class="tab-pane fade" id="list-9" role="tabpanel" aria-labelledby="list-9-list">
                            <p>list-9-list</p>
                        </div>
                        <div class="tab-pane fade" id="list-10" role="tabpanel" aria-labelledby="list-10-list">
                            <p>list-10-list</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container text-center">
                <button class="btn btn-outline-primary">Buy now</button>
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
                new Suit("0", "Áo Chelsea sân nhà", "2022", "120 000 VNĐ", "../Assets/Images/Temp/chelsea1.jpg"),
                new Suit("1", "Áo Real sân nhà", "2022", "130 000 VNĐ", "../Assets/Images/Temp/real1.jpg"),
                new Suit("2", "Áo Arsenal sân nhà", "2022", "120 000 VNĐ", "../Assets/Images/Temp/arsenal1.jpg"),
                new Suit("3", "Áo Chelsea sân khách", "2022", "110 000 VNĐ", "../Assets/Images/Temp/chelsea2.jpg"),
                new Suit("4", "Áo Real sân khách", "2022", "110 000 VNĐ", "../Assets/Images/Temp/real2.jpg"),
                new Suit("5", "Áo Arsenal sân khách", "2022", "110 000 VNĐ", "../Assets/Images/Temp/arsenal2.jpg"),
            );
            $listNewProducts = array(
                new Suit("0", "Áo MU sân nhà", "2022", "120 000 VNĐ", "../Assets/Images/Temp/MU1.jpg"),
                new Suit("1", "Áo Real sân nhà", "2022", "120 000 VNĐ", "../Assets/Images/Temp/real1.jpg"),
                new Suit("2", "Áo Barca sân nhà", "2022", "120 000 VNĐ", "../Assets/Images/Temp/barca1.jpg"),
                new Suit("3", "Áo MC sân nhà", "2022", "120 000 VNĐ", "../Assets/Images/Temp/MC1.jpg"),
                new Suit("4", "Áo Arsenal sân nhà", "2022", "120 000 VNĐ", "../Assets/Images/Temp/arsenal1.jpg"),
                new Suit("5", "Áo Arsenal sân khách", "2022", "110 000 VNĐ", "../Assets/Images/Temp/arsenal2.jpg")
            );
            $listBestProducts = array(
                new Suit("1", "Áo Chelsea sân khách", "2022", "110 000 VNĐ", "../Assets/Images/Temp/chelsea2.jpg"),
                new Suit("2", "Áo Real sân khách", "2022", "110 000 VNĐ", "../Assets/Images/Temp/real2.jpg"),
                new Suit("3", "Áo Arsenal sân khách", "2022", "110 000 VNĐ", "../Assets/Images/Temp/arsenal2.jpg"),
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
            <h2>Best seller</h2>
            <div class="row">
                <div class="col-12">
                    <!-- TEST  -->
                    <div>
                        <?php include_once './Components/test.php'; ?>
                    </div>
                </div>
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