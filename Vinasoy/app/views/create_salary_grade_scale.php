<?php
$controller = new SalaryGradeScaleController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $salaryGradeScaleData = [
        'salaryScale' => $_POST['salaryScale'],
        'salaryGradeName' => $_POST['salaryGradeName'],
        'salaryAmount' => $_POST['salaryAmount'],
        'status' => $_POST['status'],
    ];

    $response = $controller->createSalaryGradeScale($salaryGradeScaleData);
    if (isset($response['success'])) {
        echo "<script>
        alert('Thêm thành công!'); 
        window.location.href = '?page=salaryscale';
      </script>";
    } else {
        echo '<div class="alert alert-danger">' . $response['error'] . '</div>';
    }
}
?>

<div class="container mt-5">
    <h2 class="text-center">Thêm ngạch lương - bậc lương</h2>
    <form action="" method="post">

        <div class="form-group">
            <label for="salaryScale">Bậc lương</label>
            <input type="text" id="salaryScale" name="salaryScale" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="salaryGradeName">Tên ngạch lương</label>
            <input type="text" id="salaryGradeName" name="salaryGradeName" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="salaryAmount">Số Tiền</label>
            <input type="number" step="0.01" id="salaryAmount" name="salaryAmount" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="status">Trạng Thái</label>
            <select id="status" name="status" class="form-control" required>
                <option value="1">Kích Hoạt</option>
                <option value="0">Vô Hiệu</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Thêm</button>
        <a href="salary_scale_list.php" class="btn btn-secondary">Quay lại</a>
    </form>
</div>