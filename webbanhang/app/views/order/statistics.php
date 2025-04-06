<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-4">
    <h2 class="mb-4">📊 Thống kê doanh thu</h2>

    <!-- Tổng quan -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title">Tổng doanh thu</h5>
                    <h3><?php echo is_object($summary) ? number_format($summary->total_revenue, 0, ',', '.') : '0'; ?> VNĐ</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">Đơn hàng hoàn thành</h5>
                    <h3><?php echo $summary->completed_orders ?? 0; ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h5 class="card-title">Trung bình/đơn</h5>
                    <h3><?php 
                        $avg = ($summary->completed_orders > 0) 
                            ? ($summary->total_revenue / $summary->completed_orders) 
                            : 0;
                        echo number_format($avg, 0, ',', '.'); 
                    ?> VNĐ</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Doanh thu theo tháng -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">📈 Doanh thu theo tháng</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Tháng</th>
                                    <th>Số đơn hàng</th>
                                    <th>Doanh thu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($monthlyRevenue as $month): ?>
                                    <tr>
                                        <td><?php echo date('m/Y', strtotime($month->month)); ?></td>
                                        <td><?php echo $month->order_count; ?></td>
                                        <td><?php echo number_format($month->revenue, 0, ',', '.'); ?> VNĐ</td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Top sản phẩm bán chạy -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">🏆 Top 5 sản phẩm bán chạy</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Sản phẩm</th>
                                    <th>Số lượng bán</th>
                                    <th>Doanh thu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($topProducts as $index => $product): ?>
                                    <tr>
                                        <td><?php echo $index + 1; ?></td>
                                        <td><?php echo htmlspecialchars($product->product_name); ?></td>
                                        <td><?php echo $product->total_quantity; ?></td>
                                        <td><?php echo number_format($product->total_revenue, 0, ',', '.'); ?> VNĐ</td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>
