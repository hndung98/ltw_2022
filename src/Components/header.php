<header class="p-3 mb-3 border-bottom">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
            </a>

            <ul class="nav nav-pills col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li class="nav-item"><a href="/assignment/" class="nav-link active" aria-current="page">Home</a></li>
                <li class="nav-item"><a href="/assignment/product/" class="nav-link">Product</a></li>
                <li class="nav-item"><a href="/assignment/about/" class="nav-link">About</a></li>
                <li class="nav-item"><a href="#" class="nav-link" onclick="Test()">Test</a></li>
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
            </form>

            <button type="button" id="btn-login" class="btn btn-outline-primary me-2" onclick="Login()">Login</button>
            <div class="dropdown text-end" id="div-avatar">
                <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                </a>
                <ul class="dropdown-menu text-small">
                    <li><a class="dropdown-item" href="#" onclick="GetAllUser()">Get all users</a></li>
                    <li><a class="dropdown-item" href="#" onclick="GetUserInfo()">Get user info</a></li>
                    <li><a class="dropdown-item" href="/assignment/cart/">My Cart</a></li>
                    <li><a class="dropdown-item" href="/assignment/profile/">Profile</a></li>
                    <li><a class="dropdown-item" href="#">Change Password</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#" onclick="Logout()">Sign out</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>