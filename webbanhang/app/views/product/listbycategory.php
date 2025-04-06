<?php include 'app/views/shares/header.php'; ?>
<h1 class="mb-4">Sản phẩm theo danh mục: <?php echo isset($category) && is_object($category) ? htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8') : 'Danh mục không xác định'; ?></h1>
<div class="row">
    <?php if (empty($products)): ?>
        <p>Không có sản phẩm nào trong danh mục này.</p>
    <?php else: ?>
        <?php foreach ($products as $product): ?>
            <div class="col-md-3 mb-4">
                <div class="card">
                    <a href="/webbanhang/Product/show/<?php echo $product->id; ?>">
                        <img src="/webbanhang/<?php echo $product->image; ?>" class="card-img-top" alt="Product Image">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="/webbanhang/Product/show/<?php echo $product->id; ?>">
                                <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
                            </a>
                        </h5>
                        <p class="card-text">Giá: <?php echo htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?> VND</p>
                        <a href="/webbanhang/Product/edit/<?php echo $product->id; ?>" class="btn btn-warning">Sửa</a>
                        <a href="/webbanhang/Product/delete/<?php echo $product->id; ?>"
                            class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">Xóa</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
<?php include 'app/views/shares/footer.php'; ?>
