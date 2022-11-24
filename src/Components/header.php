<?php
include_once "./Components/card.php";
include "./Services/common.php";

?>
<header class="p-2 mb-2 border-bottom">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
            </a>

            <ul class="nav nav-pills col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            </ul>

            <div class="dropdown-center" style="margin-right: 20px;">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Tiếng Việt</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Tiếng Việt</a></li>
                    <li><a class="dropdown-item" href="#">English</a></li>
                </ul>
            </div>

            <button type="button" id="btn-login" class="btn btn-outline-primary me-2" onclick="Login()">Đăng nhập</button>
            <button type="button" id="btn-signup" class="btn btn-outline-primary me-2" onclick="Login()">Đăng ký</button>
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
<header class="p-1 mb-1 border-bottom">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
            </a>

            <ul class="nav nav-pills col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li class="nav-item my-menu-item"><a href="/assignment/home/" class="nav-link" aria-current="page" id="menu-item-home">Trang chủ</a></li>
                <li class="nav-item my-menu-item"><a href="/assignment/product/" class="nav-link" id="menu-item-product">Sản phẩm</a></li>
                <li class="nav-item my-menu-item"><a href="/assignment/about/" class="nav-link" id="menu-item-about">Về chúng tôi</a></li>
                <li class="nav-item my-menu-item"><a href="/assignment/cart/" class="nav-link" id="menu-item-cart"><span><i class="fa-solid fa-cart-shopping fa-fw" style="color:#0d6efd;"></i></span> Giỏ hàng</a></li>
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
            </form>
        </div>
    </div>
</header>