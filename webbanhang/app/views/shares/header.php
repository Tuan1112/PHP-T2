<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to bottom, #ffffff, #f7e6c7);
            overflow-x: hidden;
            /* Prevent horizontal overflow */
        }

        .navbar {
    background-color: #dc3545 !important;
}


        .navbar-brand {
            color: #fff !important;
            font-weight: bold;
            font-size: 1.5rem;
        }

        .nav-link {
            color: #fff !important;
            font-weight: 500;
            transition: 0.3s;
        }

        .nav-link:hover {
            color: #ffdd57 !important;
        }

        .product-image {
            max-width: 100px;
            height: auto;
        }

        /* Custom CSS for 5 columns */
        .col-md-2\.4 {
            flex: 0 0 auto;
            width: 20%;
        }

        @media (max-width: 768px) {
            .col-md-2\.4 {
                width: 50%;
            }
        }

        @media (max-width: 576px) {
            .col-md-2\.4 {
                width: 100%;
            }
        }

        .px-170 {
            padding-left: 170px !important;
            padding-right: 170px !important;
        }

        @media (max-width: 992px) {
            .px-170 {
                padding-left: 15px !important;
                padding-right: 15px !important;
            }
        }

        .card {
            height: auto;
            min-height: 290px;
        }

        .card-img-top {
            padding: 10px;
            background: #fff;
        }

        .card-title {
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .card-body {
            padding: 0.8rem;
        }

        .text-danger {
            font-size: 0.95rem;
        }

        .dropdown-menu {
            border: none;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }

        .dropdown-item {
            padding: 0.5rem 1.5rem;
            font-weight: 500;
        }

        .dropdown-item:hover {
            background-color: #f8f9fa;
        }

        .dropdown-item.text-danger:hover {
            background-color: #dc3545;
            color: white !important;
        }
    </style>
</head>

<body class="container-fluid">

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/webbanhang/product/list">Quản lý sản phẩm</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/webbanhang/Product/list">📦 Danh sách sản phẩm</a>
                    </li>
                    <?php if (SessionHelper::isAdmin()): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/webbanhang/Product/add">➕ Thêm sản phẩm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/webbanhang/category/list">📂 Quản lý danh mục</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/webbanhang/Product/Cart">🛒 Giỏ hàng</a>
                        </li>
                    <?php endif; ?>

                    <?php if (SessionHelper::isLoggedIn()): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                👤 <?php echo htmlspecialchars($_SESSION['username']); ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <?php if (SessionHelper::isAdmin()): ?>
                                    <li><a class="dropdown-item" href="/webbanhang/admin">⚙️ Quản trị</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                <?php else: ?>
                                    <li><a class="dropdown-item" href="/webbanhang/account/profile">👤 Thông tin tài khoản</a></li>
                                    <li><a class="dropdown-item" href="/webbanhang/account/orders">📦 Đơn hàng của tôi</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                <?php endif; ?>
                                <li><a class="dropdown-item text-danger" href="/webbanhang/account/logout">🚪 Đăng xuất</a></li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/webbanhang/account/login">🔑 Đăng nhập</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/webbanhang/account/register">📝 Đăng ký</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <!-- Content goes here -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>