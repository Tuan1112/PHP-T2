<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">👤 Thông tin tài khoản</h3>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-sm-4"><strong>Tên đăng nhập:</strong></div>
                        <div class="col-sm-8"><?php echo isset($user) && is_object($user) ? htmlspecialchars($user->username) : 'N/A'; ?></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4"><strong>Họ và tên:</strong></div>
                        <div class="col-sm-8"><?php echo htmlspecialchars($user->fullname); ?></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4"><strong>Vai trò:</strong></div>
                        <div class="col-sm-8">
                            <span class="badge bg-<?php echo $user->role === 'admin' ? 'danger' : 'primary'; ?>">
                                <?php echo $user->role === 'admin' ? 'Quản trị viên' : 'Người dùng'; ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>
