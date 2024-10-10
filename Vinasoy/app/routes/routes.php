<?php
$routes = [
    'employee' => '../app/views/employee.php',
    'position' => '../app/views/position.php',
    'chamcong' => '../app/views/chamcong.php',
    'contract' => '../app/views/contract.php',
    'reward' => '../app/views/reward_siscipline.php',
    'create_contract'=>'../app/views/create_contract.php',
    'create_employee'=>'../app/views/create_employee.php',
    'calamviec' => '../app/views/calamviec.php',
    'update_employee' => '../app/views/update_employee.php',
    'salaryscale'=>'../app/views/salary_scale.php',
    'create_position'=>'../app/views/create_position.php',
    'create_salaryscale'=>'../app/views/create_salary_grade_scale.php',
    'update_position'=>'../app/views/update_position.php',
    'update_salaryscale'=>'../app/views/update_salary_grade_scale.php',
    'delete_salaryscale'=>'../app/views/delete_salary_grade_scale.php',
    'update_contract'=>'../app/views/update_contract.php',
    'update_reward'=>'../app/views/update_reward_siscipline.php',
   
];

// Hàm để lấy đường dẫn của view dựa trên route
function getRoutePath($page) {
    global $routes;
    return isset($routes[$page]) ? $routes[$page] : null;
}
