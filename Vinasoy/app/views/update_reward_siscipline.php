<div class="container mt-4">
    <div class="text-end mb-3">
        <a href="index.php?page=reward_discipline" class="btn btn-success">Quản lý Khen thưởng/Kỷ luật</a>
    </div>

    <?php
    // Giả sử bạn có các controller và repository cần thiết
    $rewardDisciplineController = new RewardDisciplineController();
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $successMessage = ''; // Biến để lưu thông báo thành công

    // Kiểm tra nếu ID có sẵn
    if ($id) {
        // Lấy thông tin khen thưởng/kỷ luật theo ID
        $rewardDiscipline = $rewardDisciplineController->getRewardDisciplineById($id);

        if ($rewardDiscipline) {
            // Xử lý cập nhật thông tin nếu có dữ liệu từ biểu mẫu
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Lấy dữ liệu từ biểu mẫu
                $rewardDisciplineData = [
                    'rewardDisciplineId' => $_POST['id'],
                    'employeeID' => $_POST['employee_id'],
                    'form' => $_POST['type'],
                    'reason' => $_POST['description'],
                    'decisionDate' => $_POST['date'],
                    'decisionNumber' => $_POST['decisionNumber'],
                    'signer' => $_POST['signer'],
                ];
                $updateResponse = $rewardDisciplineController->updateRewardDiscipline($rewardDisciplineData);

                // Kiểm tra phản hồi từ phương thức
                if (isset($updateResponse['success'])) {
                    $successMessage = htmlspecialchars($updateResponse['success']); // Lưu thông báo thành công
                    echo "<script>
                    alert('Cập nhật thành công!');
                    window.location.href ='?page=reward_discipline';
                </script>";
                    exit();
                    // Cập nhật lại thông tin khen thưởng/kỷ luật sau khi cập nhật
                    $rewardDiscipline = $rewardDisciplineController->getRewardDisciplineById($id);
                } else {
                    echo '<p class="text-danger">' . htmlspecialchars($updateResponse['error'] ?? 'Có lỗi xảy ra trong quá trình cập nhật.') . '</p>';
                }
            }
    ?>
            <h2>Thông Tin Chi Tiết Khen Thưởng/Kỷ Luật #<?php echo htmlspecialchars($rewardDiscipline->getRewardDisciplineId()); ?></h2>

            <?php if ($successMessage): ?>
                <div class="alert alert-success">
                    <?php echo $successMessage; ?>
                </div>
            <?php endif; ?>

            <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($rewardDiscipline->getRewardDisciplineId()); ?>">

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="employee_id">Mã Nhân Viên:</label>
                            <input type="text" id="employee_id" name="employee_id" class="form-control" value="<?php echo htmlspecialchars($rewardDiscipline->getEmployeeResponseDTO()->getEmployeeID()); ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="type">Loại:</label>
                            <select id="type" name="type" class="form-control" required>
                                <option value="reward" <?php echo ($rewardDiscipline->getForm() == 'reward') ? 'selected' : ''; ?>>Khen thưởng</option>
                                <option value="discipline" <?php echo ($rewardDiscipline->getForm() == 'discipline') ? 'selected' : ''; ?>>Kỷ luật</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="description">số:</label>
                            <textarea id="description" name="decisionNumber" class="form-control" rows="4" required><?php echo htmlspecialchars($rewardDiscipline->getDecisionNumber()); ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="description">Người kí:</label>
                            <textarea id="description" name="signer" class="form-control" rows="4" required><?php echo htmlspecialchars($rewardDiscipline->getSigner()); ?></textarea>
                        </div>
                    </div>
                </div>
                    
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="description">Mô tả:</label>
                            <textarea id="description" name="description" class="form-control" rows="4" required><?php echo htmlspecialchars($rewardDiscipline->getReason()); ?></textarea>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="date">Ngày:</label>
                            <input type="date" id="date" name="date" class="form-control" value="<?php echo htmlspecialchars($rewardDiscipline->getDecisionDate()->format('Y-m-d')); ?>" required>
                        </div>
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                    <a href="index.php?page=reward_discipline" class="btn btn-secondary">Quay lại</a>
                </div>
            </form>
    <?php
        } else {
            echo '<p class="text-danger">Không tìm thấy thông tin khen thưởng/kỷ luật.</p>';
        }
    } else {
        echo '<p class="text-danger">Không có thông tin chi tiết.</p>';
    }
    ?>
</div>
