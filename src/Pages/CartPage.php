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
<?php
?>

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
        </div>
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

        <!-- TEST  -->
        <div class="container">

            <h2>Danh sách giỏ hàng</h2>
            <div class="my-space-30px"></div>
            <table class="table table-bordered border-primary" id="table1">
                <thead>
                    <tr>
                        <th scope="col" class="my-text-align-center">STT</th>
                        <th scope="col" class="my-text-align-center">Tên sản phẩm</th>
                        <th scope="col" class="my-text-align-center">Đơn giá</th>
                        <th scope="col" class="my-text-align-center">Số lượng</th>
                        <th scope="col" class="my-text-align-center">Thành tiền</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                </tbody>
            </table>

            <div class="row g-3">
                <div class="col-6 col-xs-12">
                </div>
                <div class="col-6 col-xs-12">
                    <input type="text" id="totalPrice" readonly class="form-control-plaintext my-text-align-right" style="font-size: 20;" value="Tổng hóa đơn (chưa tính ship): 0 đồng">
                </div>
            </div>

            <div class="my-space-30px"></div>
            <div class="row g-3">
                <div class="col-6 col-xs-12">
                </div>
                <div class="col-6 col-xs-12 my-text-align-right">
                    <button type="button" class="btn btn-primary mb-3" type="button" onclick="PurchaseFromCart()">Xác nhận mua</button>
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