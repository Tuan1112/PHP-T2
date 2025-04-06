<?php
require_once('app/config/database.php');
require_once('app/models/AccountModel.php');
require_once('app/models/ProductModel.php');
require_once('app/models/CategoryModel.php');
require_once('app/models/OrderModel.php');

class AdminController {
    private $accountModel;
    private $productModel;
    private $categoryModel;
    private $orderModel;
    
    public function __construct() {
        $db = (new Database())->getConnection();
        $this->accountModel = new AccountModel($db);
        $this->productModel = new ProductModel($db);
        $this->categoryModel = new CategoryModel($db);
        $this->orderModel = new OrderModel($db);
    }

    public function index() {
        SessionHelper::requireAdmin();
        
        $stats = [
            'totalProducts' => $this->productModel->getProductCount(),
            'totalCategories' => $this->categoryModel->getCategoryCount(),
            'totalOrders' => $this->orderModel->getOrderCount(),
            'totalUsers' => $this->accountModel->getUserCount(),
            'newOrders' => $this->orderModel->getNewOrderCount(),
            'processingOrders' => $this->orderModel->getProcessingOrderCount()
        ];
        
        include 'app/views/admin/dashboard.php';
    }
}
