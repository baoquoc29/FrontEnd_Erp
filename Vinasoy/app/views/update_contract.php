<?php
$contractController = new ContractController();
$salaryGradeScaleController = new SalaryGradeScaleController();
$salaryGrades = $salaryGradeScaleController->getSalaryGradeScaleList();
$contractID = isset($_GET['id']) ? $_GET['id'] : '';
$contractEmployeeName = isset($_GET['name']) ? $_GET['name'] : '';
$successMessage = '';

if ($contractID) {
    $contract = $contractController->getContractById($contractID);
    // echo "<pre>";
    // echo 'Chào: ' . print_r($contractID, true);
    // echo "</pre>";
    if ($contract) {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $contractData = [
                'contractID' => $_POST['id'], // "HD-0001"
                'salaryGradeScaleID' => $_POST['salary_grade_scale_id'], // "SGS-0001"
                'salaryContract' => $_POST['salary'], // 1200
                'startDate' => $_POST['start_date'], // "2024-01-01"
                'endDate' => $_POST['end_date'], // "2025-01-01"
                'contractStatus' => $_POST['status'], // "active" or "inactive"
            ];
            // echo '<pre>'; 
            // print_r($contractData);
            // echo '</pre>';
            $updateResponse = $contractController->updateContract($contractData);

            if (isset($updateResponse['success'])) {
                $successMessage = htmlspecialchars($updateResponse['success']);
                echo "<script>
                alert('Cập nhật thành công!');
                window.location.href ='?page=contract'; // Chuyển hướng về danh sách hợp đồng
                </script>";
                exit();
            } else {
                echo '<p class="text-danger">' . htmlspecialchars($updateResponse['error'] ?? 'Có lỗi xảy ra trong quá trình cập nhật.') . '</p>';
            }
        }
?>
        <div class="container mt-4">
            <h2 class="text-center mb-4">Cập Nhật Hợp Đồng #<?php echo htmlspecialchars($contract->getContractID()); ?></h2>

            <?php if ($successMessage): ?>
                <div class="alert alert-success">
                    <?php echo $successMessage; ?>
                </div>
            <?php endif; ?>

            <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($contract->getContractID()); ?>">

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="employee">Nhân Viên:</label>
                            <input type="text" id="employee" name="employee" class="form-control" value="<?php echo htmlspecialchars($contractEmployeeName); ?>" required disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="salary">Lương:</label>
                            <input type="number" id="salary" name="salary" class="form-control" value="<?php echo htmlspecialchars($contract->getSalaryContract()); ?>" required>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="salary_grade_scale_id" class="form-label">Chọn bậc lương</label>
                    <select id="salary_grade_scale_id" name="salary_grade_scale_id" class="form-control" required>
                        <option value="">Bậc lương</option>
                        <?php foreach ($salaryGrades as $salaryGrade) : ?>
                            <option value="<?= $salaryGrade->getSalaryGradeScaleId(); ?>"
                                <?php echo ($salaryGrade->getSalaryGradeScaleId() == $contract->getSalaryGradeScaleID()) ? 'selected' : ''; ?>>
                                <?= $salaryGrade->getSalaryGradeName() . ' - ' . number_format($salaryGrade->getSalaryAmount(), 2) . '-' . $salaryGrade->getSalaryScale(); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="start_date">Ngày Bắt Đầu:</label>
                            <input type="date" id="start_date" name="start_date" class="form-control" value="<?php echo htmlspecialchars($contract->getStartDate()->format('Y-m-d')); ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="end_date">Ngày Kết Thúc:</label>
                            <input type="date" id="end_date" name="end_date" class="form-control" value="<?php echo htmlspecialchars($contract->getEndDate()->format('Y-m-d')); ?>" required>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="status">Trạng Thái:</label>
                            <select id="status" name="status" class="form-control" required>
                                <option value="active" <?php echo ($contract->getContractStatus() == 'active') ? 'selected' : ''; ?>>Đang hoạt động</option>
                                <option value="inactive" <?php echo ($contract->getContractStatus() == 'inactive') ? 'selected' : ''; ?>>Ngừng hoạt động</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Cập Nhật</button>
                    <a href="index.php?page=contract_list" class="btn btn-secondary">Quay lại</a>
                </div>
            </form>
        </div>
<?php
    } else {
        echo '<p class="text-danger">Không tìm thấy thông tin hợp đồng.</p>';
    }
} else {
    echo '<p class="text-danger">Không có thông tin chi tiết.</p>';
}
?>