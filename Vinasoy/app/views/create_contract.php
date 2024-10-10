<?php

$salaryGradeScaleController = new SalaryGradeScaleController();
$salaryGrades = $salaryGradeScaleController->getSalaryGradeScaleList();
// Xử lý khi form hợp đồng được gửi
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['salary_grade_scale_id'], $_POST['salary_contract'], $_POST['start_date'], $_POST['end_date'], $_POST['contract_status'])) {
    // Lấy dữ liệu từ form
    $salaryGradeScaleID = $_POST['salary_grade_scale_id'];
    $salaryContract = $_POST['salary_contract'];
    $startDate = $_POST['start_date'];
    $endDate = $_POST['end_date'];
    $contractStatus = $_POST['contract_status'];

    // Chuyển hướng sang trang create_employee với dữ liệu bằng phương thức POST
    echo '
    <form id="redirectForm" action="index.php?page=create_employee" method="POST" style="display: none;">
        <input type="hidden" name="salary_grade_scale_id" value="' . $salaryGradeScaleID . '">
        <input type="hidden" name="salary_contract" value="' . $salaryContract . '">
        <input type="hidden" name="start_date" value="' . $startDate . '">
        <input type="hidden" name="end_date" value="' . $endDate . '">
        <input type="hidden" name="contract_status" value="' . $contractStatus . '">
    </form>
    <script type="text/javascript">
        document.getElementById("redirectForm").submit();
    </script>
    ';
    exit;
}
?>
<div class="container mt-4">
    <h2 class="text-center mb-4">Tạo Hợp Đồng</h2>

    <form method="POST">
        <div class="mb-3">
            <label for="salary_grade_scale_id" class="form-label">Chọn bậc lương</label>
            <select id="salary_grade_scale_id" name="salary_grade_scale_id" class="form-control" required>
                <option value="">Chọn bậc lương</option>
                <?php foreach ($salaryGrades as $salaryGrade) : ?>
                    <option value="<?= $salaryGrade->getSalaryGradeScaleId(); ?>">
                        <?= $salaryGrade->getSalaryGradeName() . ' - ' . number_format($salaryGrade->getSalaryAmount(), 2) . '-' . $salaryGrade->getSalaryScale(); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="salary_contract" class="form-label">Lương hợp đồng</label>
            <input type="number" id="salary_contract" name="salary_contract" class="form-control" step="0.01" required>
        </div>

        <div class="mb-3">
            <label for="start_date" class="form-label">Ngày bắt đầu</label>
            <input type="date" id="start_date" name="start_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="end_date" class="form-label">Ngày kết thúc</label>
            <input type="date" id="end_date" name="end_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="contract_status" class="form-label">Trạng thái hợp đồng</label>
            <select id="contract_status" name="contract_status" class="form-control" required>
                <option value="">Chọn trạng thái hợp đồng</option>
                <option value="1">Còn hạn</option>
                <option value="0">Hết hạn</option>
            </select>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Tiếp</button>
            <a href="?page=create_employee" class="btn btn-secondary">Hủy</a>
        </div>
    </form>
</div>
</body>

</html>
