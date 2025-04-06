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
        <div class="col-md-8 col-lg-6">
            <div class="card shadow rounded border-0">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <h2 class="fw-bold text-primary">Đăng ký tài khoản</h2>
                        <p class="text-muted">Tạo tài khoản mới để trải nghiệm dịch vụ</p>
                    </div>

                    <?php if (isset($errors) && !empty($errors)): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul class="mb-0">
                                <?php foreach ($errors as $error): ?>
                                    <li><?php echo $error; ?></li>
                                <?php endforeach; ?>
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <form action="/webbanhang/account/save" method="post" class="needs-validation" novalidate>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Tên đăng nhập" required>
                            <label for="username">Tên đăng nhập</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Họ và tên" required>
                            <label for="fullname">Họ và tên</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu" required>
                            <label for="password">Mật khẩu</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Xác nhận mật khẩu" required>
                            <label for="confirmpassword">Xác nhận mật khẩu</label>
                        </div>

                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" id="agree" required>
                            <label class="form-check-label" for="agree">
                                Tôi đồng ý với các điều khoản và điều kiện
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 py-2 mb-3">
                            <i class="fas fa-user-plus me-2"></i> Đăng ký
                        </button>

                        <div class="text-center">
                            <p class="mb-0">Đã có tài khoản? 
                                <a href="/webbanhang/account/login" class="text-primary fw-bold">Đăng nhập</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Form validation
    (function () {
        'use strict'
        var forms = document.querySelectorAll('.needs-validation')
        Array.prototype.slice.call(forms).forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>

<?php include 'app/views/shares/footer.php'; ?>
