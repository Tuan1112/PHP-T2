<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-4">
    <h2 class="mb-4">⏳ Đơn hàng đang xử lý</h2>
    
    <?php if (empty($orders)): ?>
        <div class="alert alert-info">Không có đơn hàng đang xử lý</div>
    <?php else: ?>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-warning">
                    <tr>
                        <th>ID</th>
                        <th>Khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Ngày đặt</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td><?php echo $order->id; ?></td>
                            <td><?php echo htmlspecialchars($order->name); ?></td>
                            <td><?php echo htmlspecialchars($order->phone); ?></td>
                            <td><?php echo htmlspecialchars($order->address); ?></td>
                            <td><?php echo date('d/m/Y H:i', strtotime($order->created_at)); ?></td>
                            <td>
                                <a href="/webbanhang/Order/details/<?php echo $order->id; ?>" 
                                   class="btn btn-info btn-sm">
                                    <i class="fas fa-info-circle"></i> Chi tiết
                                </a>
                                <form action="/webbanhang/Order/updateStatus/<?php echo $order->id; ?>" 
                                      method="POST" class="d-inline">
                                    <input type="hidden" name="status" value="completed">
                                    <button type="submit" class="btn btn-success btn-sm">
                                        <i class="fas fa-check-double"></i> Hoàn thành
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>

<?php include 'app/views/shares/footer.php'; ?>
