<?php
$routes = [
    'product_warehouse' => '../views/product_warehouse.php',
    'update_product_warehouse' => '../views/update_product_warehouse.php',
    'create_product_warehouse' => '../views/create_product_warehouse.php',
];

// Hàm để lấy đường dẫn của view dựa trên route
function getRoutePath($page) {
    global $routes;
    return isset($routes[$page]) ? $routes[$page] : null;
}
