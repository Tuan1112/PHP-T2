<?php include 'app/views/shares/header.php'; ?>

<style>
    body {
        background-color: #ffffff;
        color: #333;
    }
    .navbar {
        background-color: #f8f9fa;
        border-bottom: 2px solid #dee2e6;
    }
    .btn-danger {
        background-color: #dc3545;
        border: none;
    }
    .btn-danger:hover {
        background-color: #c82333;
    }
    .btn-warning {
        background-color: #ffc107;
        border: none;
    }
    .btn-warning:hover {
        background-color: #e0a800;
    }
    .card {
        border-radius: 10px;
        transition: transform 0.3s ease-in-out;
    }
    .card:hover {
        transform: scale(1.05);
    }
    .large-title {
        font-size: 3rem; /* Custom font size for the heading */
    }
</style>

<div class="container mt-4">
    <div class="banner text-center mb-4">
        <?php 
            $banner_path = "/webbanhang/uploads/oppo.png";
            if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $banner_path)) {
                $banner_path = "/images/default-banner.jpg";
            }
        ?>
        <img src="<?php echo htmlspecialchars($banner_path, ENT_QUOTES, 'UTF-8'); ?>" 
             alt="Banner cửa hàng" 
             class="img-fluid rounded shadow-sm" 
             style="max-width: 100%; height: 350px; object-fit: cover;">
    </div>

    <h1 class="text-center mb-4 text-danger fw-bold large-title">Danh sách sản phẩm</h1>
    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <?php if (SessionHelper::isAdmin()): ?>
            <a href="/webbanhang/Product/add" class="btn btn-danger btn-lg">
                 Thêm sản phẩm
            </a>
        <?php endif; ?>
        <a href="/webbanhang/Product/cart" class="btn btn-warning btn-lg">
             Giỏ hàng
        </a>
    </div>
    
    <div class="row">
        <?php foreach ($products as $product): ?>
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <a href="/webbanhang/Product/show/<?php echo $product->id; ?>" class="text-decoration-none">
                        <?php if (!empty($product->image)): ?>
                            <img src="/webbanhang/<?php echo htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8'); ?>" 
                                 alt="Product Image" 
                                 class="card-img-top p-3" 
                                 style="width: 100%; height: 240px; object-fit: contain; border-radius: 10px 10px 0 0;">
                        <?php else: ?>
                            <img src="/images/default-product.jpg" 
                                 alt="Default Product Image" 
                                 class="card-img-top p-3" 
                                 style="width: 100%; height: 240px; object-fit: contain; border-radius: 10px 10px 0 0;">
                        <?php endif; ?>
                    </a>
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">
                            <a href="/webbanhang/Product/show/<?php echo $product->id; ?>" 
                               class="text-decoration-none text-dark">
                                <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
                            </a>
                        </h5>
                        <p class="fw-bold text-danger fs-5">
                             <?php echo number_format($product->price, 0, ',', '.'); ?> VND
                        </p>
                        <a href="/webbanhang/Product/show/<?php echo $product->id; ?>" 
                           class="btn btn-outline-primary btn-sm"> Xem chi tiết</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php include 'app/views/shares/footer.php'; ?>
