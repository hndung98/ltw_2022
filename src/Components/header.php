<?php
include_once "./Components/card.php";
include_once "./Services/common.php";

?>
<header class="p-2 border-bottom my-bg-color-header">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="#" class="d-flex align-items-center mb-2 mb-lg-0 text-decoration-none my-text-color-white">
                Welcome to our online shop
            </a>

            <div class="nav nav-pills col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            </div>

            <div class="dropdown-center my-text-color-white my-margin-right-20px">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Tiếng Việt</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Tiếng Việt</a></li>
                    <li><a class="dropdown-item" href="#">English</a></li>
                </ul>
            </div>

            <button type="button" id="btn-login" class="btn btn-outline-primary me-2 my-text-color-white my-border-color-white" onclick="Login()">Đăng nhập</button>
            <div class="dropdown text-end" id="div-avatar">
                <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                </a>
                <ul class="dropdown-menu text-small">
                    <li><a class="dropdown-item" href="/assignment/profile/">Hồ sơ</a></li>
                    <li><a class="dropdown-item" href="#">Đổi mật khẩu</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#" onclick="Logout()">Đăng xuất</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>
<header class="p-1 mb-1 border-bottom my-bg-color-content">
    <div class="container text-center">
        <div class="row">
            <div class="col-sm-3">
                <a href="" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                    <img src="../Assets/Images/logo-1.png" alt="mdo" width="40" height="40" class="rounded-circle" style="border: 1px solid #0d6efd;">
                    <h3 style="margin: 0 0 0 10px; color: #0d6efd;">BK Shop</h3>
                </a>
            </div>
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-9 col-sm-9">
                        <div class="input-group col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                            <input type="text" class="form-control" placeholder="Search here" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2">Tìm kiếm</button>
                        </div>
                    </div>
                    <div class="col-3 col-sm-3">
                        <button class="btn btn-outline-primary my-border-none"><i class="fa-solid fa-cart-shopping" ></i></button>
                        <button class="btn btn-outline-primary my-border-none"><i class="fa-solid fa-bell"></i></button>
                        <button class="btn btn-outline-primary my-border-none"><i class="fa-solid fa-user" ></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<script language="javascript" type="text/javascript">
</script>