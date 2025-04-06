<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-4">
    <div class="row mb-4">
        <div class="col-md-12">
            <h2 class="mb-3">⚙️ Trang quản trị hệ thống</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/webbanhang">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Quản trị</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Tổng sản phẩm</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $stats['totalProducts']; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Danh mục</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $stats['totalCategories']; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-folder fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Đơn hàng</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $stats['totalOrders']; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Người dùng</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $stats['totalUsers']; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h6 class="m-0 font-weight-bold">Quản lý sản phẩm</h6>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="/webbanhang/Product/list" class="btn btn-outline-primary mb-2">
                            <i class="fas fa-list"></i> Xem danh sách sản phẩm
                        </a>
                        <a href="/webbanhang/Product/add" class="btn btn-outline-success mb-2">
                            <i class="fas fa-plus"></i> Thêm sản phẩm mới
                        </a>
                        <a href="/webbanhang/Category/list" class="btn btn-outline-info">
                            <i class="fas fa-folder"></i> Quản lý danh mục
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 mb-4">
            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    <h6 class="m-0 font-weight-bold">Quản lý đơn hàng</h6>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="/webbanhang/Order/newOrders" class="btn btn-outline-primary mb-2">
                            <i class="fas fa-shopping-cart"></i> Đơn hàng mới (<?php echo $stats['newOrders']; ?>)
                        </a>
                        <a href="/webbanhang/Order/processing" class="btn btn-outline-warning mb-2">
                            <i class="fas fa-clock"></i> Đơn hàng đang xử lý (<?php echo $stats['processingOrders']; ?>)
                        </a>
                        <a href="/webbanhang/Order/completed" class="btn btn-outline-success">
                            <i class="fas fa-check-circle"></i> Đơn hàng hoàn thành
                        </a>
                        <a href="/webbanhang/Order/details" class="btn btn-outline-info">
                            <i class="fas fa-info-circle"></i> Chi tiết đơn hàng
                        </a>
                        <a href="/webbanhang/Order/statistics" class="btn btn-outline-secondary">
                            <i class="fas fa-chart-bar"></i> Thống kê doanh thu
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Font Awesome CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<style>
.border-left-primary {
    border-left: .25rem solid #4e73df!important;
}
.border-left-success {
    border-left: .25rem solid #1cc88a!important;
}
.border-left-info {
    border-left: .25rem solid #36b9cc!important;
}
.border-left-warning {
    border-left: .25rem solid #f6c23e!important;
}
.card-header {
    padding: 0.75rem 1.25rem;
}
.text-xs {
    font-size: .7rem;
}
.card {
    transition: transform .2s;
}
.card:hover {
    transform: translateY(-5px);
}
.btn {
    padding: 0.75rem 1rem;
}
.btn i {
    margin-right: 0.5rem;
}
</style>

<?php include 'app/views/shares/footer.php'; ?>
