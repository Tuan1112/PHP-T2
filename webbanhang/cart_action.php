<?php
session_start();

function getCartKey() {
    return 'cart_' . ($_SESSION['user_id'] ?? 'guest');
}

$cartKey = getCartKey();
if (!isset($_SESSION[$cartKey])) {
    $_SESSION[$cartKey] = [];
}

$response = ['success' => false];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'], $_POST['action'])) {
    $productId = $_POST['id'];
    $action = $_POST['action'];

    if ($action === 'remove' && isset($_SESSION[$cartKey][$productId])) {
        unset($_SESSION[$cartKey][$productId]);
        $response['success'] = true;
        echo json_encode($response);
        exit;
    }

    if (isset($_SESSION[$cartKey][$productId])) {
        if ($action === 'increase') {
            $_SESSION[$cartKey][$productId]['quantity']++;
        } elseif ($action === 'decrease') {
            $_SESSION[$cartKey][$productId]['quantity']--;
            if ($_SESSION[$cartKey][$productId]['quantity'] <= 0) {
                unset($_SESSION[$cartKey][$productId]);
                $response['quantity'] = 0;
            }
        }

        if (isset($_SESSION[$cartKey][$productId])) {
            $response['quantity'] = $_SESSION[$cartKey][$productId]['quantity'];
        }
        
        $response['success'] = true;
    }
}

echo json_encode($response);
exit;
