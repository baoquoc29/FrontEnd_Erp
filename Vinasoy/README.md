Lưu ý đặt tên folder trong xampp là ProjectVinasoy
my-php-app/
│
├── app/
│   ├── controllers/       # Chứa các Controller
│   ├── models/            # Chứa các Model
│   ├── views/             # Chứa các View
│   ├── config.php         # Tệp cấu hình kết nối database
│   └── routes.php         # Tệp định nghĩa route
│
├── public/
│   ├── css/               # Tệp CSS
│   ├── js/                # Tệp JavaScript
│   ├── img/               # Tệp hình ảnh
│   └── index.php          # Tệp chính để khởi động ứng dụng
│
└── vendor/                # Chứa các thư viện bên ngoài (nếu có)


<?php

$salaryGradeScaleController = new SalaryGradeScaleController();
$salaryGrades = $salaryGradeScaleController->getSalaryGradeScaleList();
// Xử lý khi form hợp đồng được gửi
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contract_id'], $_POST['salary_grade_scale_id'], $_POST['salary_contract'], $_POST['start_date'], $_POST['end_date'], $_POST['contract_status'])) {
    // Lấy dữ liệu từ form
    $contractID = $_POST['contract_id'];
    $salaryGradeScaleID = $_POST['salary_grade_scale_id'];
    $salaryContract = $_POST['salary_contract'];
    $startDate = $_POST['start_date'];
    $endDate = $_POST['end_date'];
    $contractStatus = $_POST['contract_status'];

    // Chuyển hướng sang trang create_employee với dữ liệu bằng phương thức POST
    echo '
    <form id="redirectForm" action="index.php?page=create_employee" method="POST" style="display: none;">
        <input type="hidden" name="contract_id" value="' . $contractID . '">
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
            <label for="contract_id" class="form-label">Mã hợp đồng</label>
            <input type="text" id="contract_id" name="contract_id" class="form-control" maxlength="10" required>
        </div>

        <div class="mb-3">
            <label for="salary_grade_scale_id" class="form-label">Mã bậc lương</label>
            <input type="text" id="salary_grade_scale_id" name="salary_grade_scale_id" class="form-control" required>
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
            <input type="text" id="contract_status" name="contract_status" class="form-control" maxlength="50">
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Tiếp</button>
            <a href="?page=create_employee" class="btn btn-secondary">Hủy</a>
        </div>
    </form>
</div>
</body>
</html>
