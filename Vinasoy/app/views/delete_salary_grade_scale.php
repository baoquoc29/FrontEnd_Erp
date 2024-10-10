<?php

$controller = new SalaryGradeScaleController();


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $controller->deleteSalaryGradeScale($id);

    if (isset($result['success'])) {
        // Chuyển hướng với thông báo thành công
        header('Location: ?page=salary_grade_scale_list&message=' . urlencode($result['success']));
        exit;
    } else {
        // Chuyển hướng với thông báo lỗi
        header('Location: ?page=salary_grade_scale_list&error=' . urlencode($result['error']));
        exit;
    }
} else {
    // Nếu không có ID, chuyển hướng hoặc thông báo lỗi
    header('Location: ?page=salary_grade_scale_list&error=ID không hợp lệ.');
    exit;
}