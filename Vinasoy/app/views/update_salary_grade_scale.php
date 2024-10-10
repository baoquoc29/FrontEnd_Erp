<?php
// Khởi tạo controller
$controller = new SalaryGradeScaleController();

// Lấy ID ngạch lương từ query string
$salaryGradeScaleId = isset($_GET['id']) ? $_GET['id'] : null;

// Kiểm tra nếu ID hợp lệ
if ($salaryGradeScaleId) {
    // Lấy thông tin Salary Grade Scale
    $salaryGradeScale = $controller->getSalaryGradeScaleById($salaryGradeScaleId);

    // Kiểm tra nếu không tìm thấy hoặc có lỗi
    if (!$salaryGradeScale) {
        echo '<div class="alert alert-danger">Không tìm thấy Salary Grade Scale với ID này.</div>';
        exit;
    }
} else {
    echo '<div class="alert alert-danger">Thiếu ID ngạch lương.</div>';
    exit;
}

// Xử lý khi form được submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $salaryGradeScaleData = [
        'salaryGradeScaleId' => $_POST['salaryGradeScaleId'],
        'salaryScale' => $_POST['salaryScale'], // Chỗ này sẽ lấy từ dropdown
        'salaryGradeName' => $_POST['salaryGradeName'],
        'salaryAmount' => $_POST['salaryAmount'],
        'status' => $_POST['status'],
    ];

    // Cập nhật thông tin Salary Grade Scale thông qua controller
    $response = $controller->updateSalaryGradeScale($salaryGradeScaleData);

    // Kiểm tra kết quả và hiển thị thông báo
    if (isset($response['success'])) {
        echo "<script>
            alert('Cập nhật thành công!');
            window.location.href ='?page=salaryscale';
        </script>";
        exit();
    } else {
        echo '<div class="alert alert-danger">' . htmlspecialchars($response['error']) . '</div>';
    }
}
?>

<div class="container mt-5">
    <h2 class="text-center">Sửa Salary Grade Scale</h2>
    <form action="" method="post">
        <div class="form-group">
            <label for="salaryGradeScaleId">Mã bậc lương</label>
            <input type="text" id="salaryGradeScaleId" name="salaryGradeScaleId" class="form-control" value="<?php echo htmlspecialchars($salaryGradeScale->getSalaryGradeScaleId()); ?>" readonly>
        </div>

        <div class="form-group">
            <label for="salaryScale">Bậc Lương</label>
            <select id="salaryScale" name="salaryScale" class="form-control" required>
                <option value="" disabled <?php echo empty($salaryGradeScale->getSalaryScale()) ? 'selected' : ''; ?>>Chọn Bậc</option>
                <?php for ($i = 1; $i <= 5; $i++): ?>
                    <option value="<?php echo $i; ?>" <?php echo $salaryGradeScale->getSalaryScale() == $i ? 'selected' : ''; ?>>Bậc <?php echo $i; ?></option>
                <?php endfor; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="salaryGradeName">Tên ngạch</label>
            <input type="text" id="salaryGradeName" name="salaryGradeName" class="form-control" value="<?php echo htmlspecialchars($salaryGradeScale->getSalaryGradeName()); ?>" required>
        </div>

        <div class="form-group">
            <label for="salaryAmount">Số Tiền</label>
            <input type="number" step="0.01" id="salaryAmount" name="salaryAmount" class="form-control" value="<?php echo htmlspecialchars($salaryGradeScale->getSalaryAmount()); ?>" required>
        </div>

        <div class="form-group">
            <label for="status">Trạng Thái</label>
            <select id="status" name="status" class="form-control" required>
                <option value="1" <?php echo $salaryGradeScale->getStatus() == 1 ? 'selected' : ''; ?>>Kích Hoạt</option>
                <option value="0" <?php echo $salaryGradeScale->getStatus() == 0 ? 'selected' : ''; ?>>Vô Hiệu</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Lưu Thay Đổi</button>
        <a href="salary_scale.php" class="btn btn-secondary">Quay Lại</a>
    </form>
</div>
