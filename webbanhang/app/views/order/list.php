<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-4">
    <h2 class="mb-4">📋 Danh sách đơn hàng</h2>
    
    <?php if (empty($orders)): ?>
        <div class="alert alert-info">Chưa có đơn hàng nào</div>
    <?php else: ?>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Trạng thái</th>
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
                            <td>
                                <?php 
                                    $statusClass = [
                                        'new' => 'badge bg-primary',
                                        'processing' => 'badge bg-warning',
                                        'completed' => 'badge bg-success'
                                    ];
                                    $statusText = [
                                        'new' => 'Mới',
                                        'processing' => 'Đang xử lý',
                                        'completed' => 'Hoàn thành'
                                    ];
                                ?>
                                <span class="<?php echo $statusClass[$order->status] ?? ''; ?>">
                                    <?php echo $statusText[$order->status] ?? $order->status; ?>
                                </span>
                            </td>
                            <td><?php echo date('d/m/Y H:i', strtotime($order->created_at)); ?></td>
                            <td>
                                <a href="/webbanhang/Order/details/<?php echo $order->id; ?>" 
                                   class="btn btn-info btn-sm">
                                    <i class="fas fa-info-circle"></i> Chi tiết
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>

<?php include 'app/views/shares/footer.php'; ?>
