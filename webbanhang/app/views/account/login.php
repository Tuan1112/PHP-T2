<?php include 'app/views/shares/header.php'; ?>

<style>
    body {
        background-color: #f5f5dc; /* Màu be nhẹ */
        color: black;
    }
    .card {
        background-color: #d6d6d6;
        color: black;
    }
    .form-control {
        background-color: white;
        color: black;
        border: 1px solid #ccc;
    }
    .form-control::placeholder {
        color: #666;
    }
    .btn-primary {
        background-color: black;
        border: none;
        color: white;
    }
    .btn-primary:hover {
        background-color: #333;
    }
    .text-primary {
        color: black !important;
    }
</style>

<div class="container d-flex align-items-center min-vh-100">
    <div class="row justify-content-center w-100">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow rounded border-0">
                <div class="card-body p-5">
                    <?php if(isset($_SESSION['error'])): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?php 
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                            ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <div class="text-center mb-4">
                        <h2 class="fw-bold text-primary">Đăng nhập</h2>
                        <p class="text-muted">Vui lòng đăng nhập để tiếp tục</p>
                    </div>

                    <form action="/webbanhang/account/checklogin" method="post" class="needs-validation" novalidate>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Tên đăng nhập" required>
                            <label for="username">Tên đăng nhập</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu" required>
                            <label for="password">Mật khẩu</label>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember" name="remember">
                                <label class="form-check-label" for="remember">Ghi nhớ đăng nhập</label>
                            </div>
                            <a href="#" class="text-primary text-decoration-none">Quên mật khẩu?</a>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-2 mb-3">
                            <i class="fas fa-sign-in-alt me-2"></i> Đăng nhập
                        </button>

                        <div class="text-center">
                            <p class="mb-0">Chưa có tài khoản? 
                                <a href="/webbanhang/account/register" class="text-primary fw-bold">Đăng ký ngay</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>