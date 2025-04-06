<?php include 'app/views/shares/header.php'; ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow p-4">
                <h2 class="text-center mb-4">🛒 Xác nhận thanh toán</h2>
                <form method="POST" action="/webbanhang/Product/processCheckout">
                    <div class="mb-3">
                        <label for="name" class="form-label">👤 Họ tên:</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Nhập họ tên của bạn" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">📞 Số điện thoại:</label>
                        <input type="text" id="phone" name="phone" class="form-control" placeholder="Nhập số điện thoại" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">🏠 Địa chỉ:</label>
                        <textarea id="address" name="address" class="form-control" rows="3" placeholder="Nhập địa chỉ giao hàng" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success w-100 py-2">💳 Thanh toán ngay</button>
                </form>
                <a href="/webbanhang/Product/cart" class="btn btn-secondary mt-3 w-100">🔙 Quay lại giỏ hàng</a>
            </div>
        </div>
    </div>
</div>
<?php include 'app/views/shares/footer.php'; ?>
