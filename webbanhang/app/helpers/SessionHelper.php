<?php
class SessionHelper
{
    public static function isLoggedIn()
    {
        return isset($_SESSION['username']) && isset($_SESSION['role']);
    }

    public static function isAdmin()
    {
        return self::isLoggedIn() && $_SESSION['role'] === 'admin';
    }

    public static function requireLogin()
    {
        if (!self::isLoggedIn()) {
            $_SESSION['error'] = "Vui lòng đăng nhập để tiếp tục!";
            header('Location: /webbanhang/account/login');
            exit;
        }
    }

    public static function requireAdmin()
    {
        self::requireLogin();
        if (!self::isAdmin()) {
            $_SESSION['error'] = "Bạn không có quyền truy cập tính năng này!";
            header('Location: /webbanhang/product');
            exit;
        }
    }

    public static function getRole()
    {
        return $_SESSION['role'] ?? null;
    }
}
