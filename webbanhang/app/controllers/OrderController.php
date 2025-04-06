<?php
require_once('app/config/database.php');
require_once('app/models/OrderModel.php');

class OrderController {
    private $orderModel;

    public function __construct() {
        $this->orderModel = new OrderModel((new Database())->getConnection());
    }

    public function newOrders() {
        SessionHelper::requireAdmin();
        $orders = $this->orderModel->getNewOrders();
        include 'app/views/order/new.php';
    }

    public function processing() {
        SessionHelper::requireAdmin();
        $orders = $this->orderModel->getProcessingOrders();
        include 'app/views/order/processing.php';
    }

    public function completed() {
        SessionHelper::requireAdmin();
        $orders = $this->orderModel->getCompletedOrders();
        include 'app/views/order/completed.php';
    }

    public function updateStatus($orderId) {
        SessionHelper::requireAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $status = $_POST['status'];
            $this->orderModel->updateOrderStatus($orderId, $status);
            header('Location: /webbanhang/Order/newOrders');
        }
    }

    public function details($orderId = null) {
        SessionHelper::requireAdmin();
        
        if ($orderId === null) {
            // If no order ID provided, show all orders
            $orders = $this->orderModel->getAllOrders();
            include 'app/views/order/list.php';
            return;
        }
        
        $orderDetails = $this->orderModel->getOrderDetails($orderId);
        if (empty($orderDetails)) {
            $_SESSION['error'] = "Không tìm thấy thông tin đơn hàng!";
            header('Location: /webbanhang/Order/newOrders');
            exit;
        }
        
        include 'app/views/order/details.php';
    }

    public function statistics() {
        SessionHelper::requireAdmin();
        
        $summary = $this->orderModel->getRevenueSummary();
        $monthlyRevenue = $this->orderModel->getRevenueByMonth();
        $topProducts = $this->orderModel->getTopProducts();
        
        include 'app/views/order/statistics.php';
    }
}
