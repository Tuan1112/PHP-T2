<?php include 'app/views/shares/header.php'; ?>

<style>
    .product-image-container {
        max-width: 100%;
        height: 300px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .product-image-container img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }
    .description-container {
        word-wrap: break-word;
        overflow-wrap: break-word;
        max-width: 100%;
    }
    .action-buttons .btn {
        white-space: nowrap;
        min-width: 160px;
    }
    @media (max-width: 768px) {
        .action-buttons .d-flex {
            flex-direction: column;
        }
        .action-buttons .btn {
            width: 100%;
            margin-bottom: 0.5rem;
        }
    }
</style>

<div class="container mt-4">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
            <h2 class="mb-0"><?php echo is_object($product) ? htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8') : 'Sản phẩm không tồn tại'; ?></h2>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- Cột hiển thị hình ảnh -->
                <div class="col-md-5 text-center mb-3 mb-md-0">
                    <div class="product-image-container">
                        <?php if (is_object($product) && !empty($product->image)): ?>
                            <img src="/webbanhang/<?php echo htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8'); ?>" 
                                 alt="Ảnh sản phẩm" class="rounded shadow-sm">
                        <?php else: ?>
                            <img src="/images/no-image.png" alt="Không có ảnh" 
                                 class="rounded shadow-sm">
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Cột hiển thị thông tin sản phẩm -->
                <div class="col-md-7">
                    <div class="product-info">
                        <h4 class="font-weight-bold mb-4">Thông tin sản phẩm</h4>
                        
                        <div class="mb-3">
                            <strong>Mô tả:</strong>
                            <div class="mt-2 description-container">
                                <?php echo nl2br(htmlspecialchars($product->description ?? 'Không có mô tả', ENT_QUOTES, 'UTF-8')); ?>
                            </div>
                        </div>

                        <div class="d-flex flex-wrap align-items-center mb-3">
                            <div class="me-4 mb-2">
                                <strong>Giá:</strong>
                                <span class="text-danger fw-bold ms-2">
                                    <?php echo number_format($product->price ?? 0, 0, ',', '.'); ?> VNĐ
                                </span>
                            </div>
                            
                            <div class="mb-2">
                                <strong>Danh mục:</strong>
                                <span class="badge bg-info text-white ms-2">
                                    <?php echo !empty($product->category_name) ? htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8') : 'Chưa có danh mục'; ?>
                                </span>
                            </div>
                        </div>

                        <div class="action-buttons">
                            <div class="mb-3">
                                <a href="/webbanhang/Product/list" class="btn btn-secondary me-2 mb-2">
                                    <i class="fas fa-arrow-left"></i> Quay lại
                                </a>
                                <?php if (SessionHelper::isAdmin()): ?>
                                    <a href="/webbanhang/Product/edit/<?php echo $product->id; ?>" 
                                       class="btn btn-warning mb-2">
                                        <i class="fas fa-edit"></i> Chỉnh sửa
                                    </a>
                                <?php endif; ?>
                            </div>
                            
                            <?php if (SessionHelper::isLoggedIn()): ?>
                                <div class="d-flex gap-2">
                                    <a href="/webbanhang/Product/addToCart/<?php echo $product->id; ?>" 
                                       class="btn btn-outline-danger">
                                        <i class="fas fa-cart-plus"></i> Thêm Vào Giỏ Hàng
                                    </a>
                                    <a href="/webbanhang/Product/checkout/<?php echo $product->id; ?>" 
                                       class="btn btn-danger">
                                        <i class="fas fa-shopping-bag"></i> Mua Ngay
                                    </a>
                                </div>
                            <?php else: ?>
                                <div class="alert alert-info">
                                    Vui lòng <a href="/webbanhang/account/login">đăng nhập</a> để mua hàng
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>
