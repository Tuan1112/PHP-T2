<?php
class OrderModel {
    private $conn;
    private $table_name = "orders";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getNewOrders() {
        try {
            $query = "SELECT o.*, COALESCE(COUNT(od.id), 0) as total_items 
                     FROM " . $this->table_name . " o 
                     LEFT JOIN order_details od ON o.id = od.order_id 
                     WHERE o.status = 'new' 
                     GROUP BY o.id 
                     ORDER BY o.created_at DESC";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch(PDOException $e) {
            error_log("Error getting new orders: " . $e->getMessage());
            return [];
        }
    }

    public function getProcessingOrders() {
        try {
            $query = "SELECT o.*, COALESCE(COUNT(od.id), 0) as total_items 
                     FROM " . $this->table_name . " o 
                     LEFT JOIN order_details od ON o.id = od.order_id 
                     WHERE o.status = 'processing' 
                     GROUP BY o.id 
                     ORDER BY o.created_at DESC";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch(PDOException $e) {
            error_log("Error getting processing orders: " . $e->getMessage());
            return [];
        }
    }

    public function getCompletedOrders() {
        try {
            $query = "SELECT o.*, COALESCE(COUNT(od.id), 0) as total_items 
                     FROM " . $this->table_name . " o 
                     LEFT JOIN order_details od ON o.id = od.order_id 
                     WHERE o.status = 'completed' 
                     GROUP BY o.id 
                     ORDER BY o.created_at DESC";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch(PDOException $e) {
            error_log("Error getting completed orders: " . $e->getMessage());
            return [];
        }
    }

    public function getAllOrders() {
        try {
            $query = "SELECT o.*, COALESCE(COUNT(od.id), 0) as total_items 
                     FROM " . $this->table_name . " o 
                     LEFT JOIN order_details od ON o.id = od.order_id 
                     GROUP BY o.id 
                     ORDER BY o.created_at DESC";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch(PDOException $e) {
            error_log("Error getting all orders: " . $e->getMessage());
            return [];
        }
    }

    public function updateOrderStatus($orderId, $status) {
        $query = "UPDATE orders SET status = :status WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id', $orderId);
        return $stmt->execute();
    }

    public function getOrderDetails($orderId) {
        $query = "SELECT od.*, p.name as product_name, p.image 
                 FROM order_details od
                 LEFT JOIN product p ON od.product_id = p.id
                 WHERE od.order_id = :order_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':order_id', $orderId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getOrderCount() {
        $query = "SELECT COUNT(*) as total FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ)->total;
    }

    public function getNewOrderCount() {
        $query = "SELECT COUNT(*) as total FROM " . $this->table_name . " WHERE status = 'new'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ)->total;
    }

    public function getProcessingOrderCount() {
        $query = "SELECT COUNT(*) as total FROM " . $this->table_name . " WHERE status = 'processing'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ)->total;
    }

    public function getRevenueSummary() {
        try {
            $query = "SELECT 
                        COUNT(*) as total_orders,
                        SUM(od.quantity * od.price) as total_revenue,
                        COUNT(DISTINCT o.id) as completed_orders
                     FROM orders o
                     JOIN order_details od ON o.id = od.order_id
                     WHERE o.status = 'completed'";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        } catch(PDOException $e) {
            error_log("Error getting revenue summary: " . $e->getMessage());
            return null;
        }
    }

    public function getRevenueByMonth() {
        try {
            $query = "SELECT 
                        DATE_FORMAT(o.created_at, '%Y-%m') as month,
                        COUNT(DISTINCT o.id) as order_count,
                        SUM(od.quantity * od.price) as revenue
                     FROM orders o
                     JOIN order_details od ON o.id = od.order_id
                     WHERE o.status = 'completed'
                     GROUP BY DATE_FORMAT(o.created_at, '%Y-%m')
                     ORDER BY month DESC
                     LIMIT 12";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch(PDOException $e) {
            error_log("Error getting revenue by month: " . $e->getMessage());
            return [];
        }
    }

    public function getTopProducts() {
        try {
            $query = "SELECT 
                        p.name as product_name,
                        SUM(od.quantity) as total_quantity,
                        SUM(od.quantity * od.price) as total_revenue
                     FROM order_details od
                     JOIN product p ON od.product_id = p.id
                     JOIN orders o ON od.order_id = o.id
                     WHERE o.status = 'completed'
                     GROUP BY od.product_id, p.name
                     ORDER BY total_revenue DESC
                     LIMIT 5";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch(PDOException $e) {
            error_log("Error getting top products: " . $e->getMessage());
            return [];
        }
    }
}
