<?php include 'app/views/shares/header.php'; ?>
<div class="container mt-4">
    <h1 class="text-center mb-4">🛒 Giỏ hàng của bạn</h1>

    <?php if (!empty($cart)): ?>
        <div class="row">
            <div class="col-md-8">
                <ul class="list-group">
                    <?php $total = 0; ?>
                    <?php foreach ($cart as $id => $item): ?>
                        <?php $subtotal = $item['price'] * $item['quantity']; ?>
                        <?php $total += $subtotal; ?>

                        <li class="list-group-item d-flex align-items-center" id="cart-item-<?php echo $id; ?>">
                            <?php if ($item['image']): ?>
                                <img src="/webbanhang/<?php echo $item['image']; ?>" alt="Product Image" class="me-3" style="width: 80px; height: 80px; object-fit: cover;">
                            <?php endif; ?>

                            <div class="flex-grow-1">
                                <h5><?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?></h5>
                                <p>📦 Số lượng: 
                                    <button onclick="updateCart('<?php echo $id; ?>', 'decrease', <?php echo $item['price']; ?>)" class="btn btn-sm btn-light">➖</button>
                                    <span id="quantity-<?php echo $id; ?>" class="mx-2"><?php echo $item['quantity']; ?></span>
                                    <button onclick="updateCart('<?php echo $id; ?>', 'increase', <?php echo $item['price']; ?>)" class="btn btn-sm btn-light">➕</button>
                                </p>
                            </div>

                            <div>
                                <p class="fw-bold">🧾 Tổng: <span id="total-<?php echo $id; ?>"><?php echo number_format($subtotal, 0, ',', '.'); ?></span> VND</p>
                                <a href="javascript:void(0);" class="btn btn-danger btn-sm" 
                                    onclick="confirmRemoveFromCart('<?php echo $id; ?>')">
                                    ❌ Xóa
                                </a>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="col-md-4">
                <div class="card p-3 shadow-sm">
                    <h4 class="fw-bold">💵 Tổng tiền: <span id="grand-total"><?php echo number_format($total, 0, ',', '.'); ?></span> VND</h4>
                    <a href="/webbanhang/Product" class="btn btn-secondary mt-2 w-100">🔄 Tiếp tục mua sắm</a>
                    <a href="/webbanhang/Product/checkout" class="btn btn-primary mt-2 w-100">💳 Thanh Toán</a>
                </div>
            </div>
        </div>
    <?php else: ?>
        <p class="text-center">🛍️ Giỏ hàng của bạn đang trống.</p>
        <div class="text-center">
            <a href="/webbanhang/Product" class="btn btn-success">🛒 Tiếp tục mua sắm</a>
        </div>
    <?php endif; ?>
</div>
<?php include 'app/views/shares/footer.php'; ?>

<script>
function updateCart(productId, action, price) {
    fetch('/webbanhang/cart_action.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `action=${action}&id=${productId}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Cập nhật số lượng sản phẩm
            document.getElementById(`quantity-${productId}`).innerText = data.quantity;

            // Tính tổng tiền cho từng sản phẩm
            const subtotal = data.quantity * price;
            document.getElementById(`total-${productId}`).innerText = subtotal.toLocaleString('vi-VN');

            // Cập nhật tổng tiền giỏ hàng
            calculateGrandTotal();
        } else {
            alert('Cập nhật thất bại. Hãy thử lại!');
        }
    })
    .catch(error => console.error('Lỗi:', error));
}

function calculateGrandTotal() {
    let grandTotal = 0;

    // Lấy tất cả các tổng tiền sản phẩm
    document.querySelectorAll('[id^="total-"]').forEach(item => {
        const subtotal = parseInt(item.innerText.replace(/\D/g, '')); // Loại bỏ ký tự không phải số
        grandTotal += isNaN(subtotal) ? 0 : subtotal; // Nếu lỗi NaN, mặc định giá trị là 0
    });

    // Hiển thị tổng tiền giỏ hàng
    document.getElementById('grand-total').innerText = grandTotal.toLocaleString('vi-VN');
}


function confirmRemoveFromCart(productId) {
    if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng?')) {
        removeFromCart(productId);
    }
}

function removeFromCart(productId) {
    fetch('/webbanhang/cart_action.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `action=remove&id=${productId}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.reload();
        } else {
            alert('Xóa sản phẩm thất bại!');
        }
    })
    .catch(error => console.error('Lỗi:', error));
}
</script>