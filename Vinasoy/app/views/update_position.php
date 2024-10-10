<div class="container mt-4">
    <div class="text-end mb-3">
        <a href="index.php?page=position" class="btn btn-success">Danh sách chức vụ</a>
    </div>

    <?php
    $positionController = new PositionController();
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $successMessage = ''; // Biến để lưu thông báo thành công

    // Kiểm tra nếu ID có sẵn
    if ($id) {
        // Lấy thông tin chức vụ theo ID
        $position = $positionController->getPositionById($id);

        if ($position) {
            // Xử lý cập nhật thông tin chức vụ nếu có dữ liệu từ biểu mẫu
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Lấy dữ liệu từ biểu mẫu
                $positionData = [
                    'positionID' => $_POST['id'],
                    'namePosition' => $_POST['name'],
                    'allowanceAmount' => $_POST['allowance'], // Thêm số tiền trợ cấp vào dữ liệu
                ];
                $updateResponse = $positionController->updatePosition($positionData);

                // Kiểm tra phản hồi từ phương thức
                if (isset($updateResponse['success'])) {
                    $successMessage = htmlspecialchars($updateResponse['success']); // Lưu thông báo thành công
                    echo "<script>
                    alert('Cập nhật thành công!');
                    window.location.href ='?page=position';
                </script>";
                    exit();
                    // Cập nhật lại thông tin chức vụ sau khi cập nhật
                    $position = $positionController->getPositionById($id);
                } else {
                    echo '<p class="text-danger">' . htmlspecialchars($updateResponse['error'] ?? 'Có lỗi xảy ra trong quá trình cập nhật.') . '</p>';
                }
            }
    ?>
            <h2>Thông Tin Chi Tiết Chức Vụ #<?php echo htmlspecialchars($position->getPositionId()); ?></h2>

            <?php if ($successMessage): // Hiển thị thông báo nếu có 
            ?>
                <div class="alert alert-success">
                    <?php echo $successMessage; ?>
                </div>
            <?php endif; ?>

            <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($position->getPositionId()); ?>">

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Tên chức vụ:</label>
                            <input type="text" id="name" name="name" class="form-control" value="<?php echo htmlspecialchars($position->getNamePosition()); ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="allowance">Số tiền trợ cấp:</label>
                            <input type="number" id="allowance" name="allowance" class="form-control" value="<?php echo htmlspecialchars($position->getAllowanceAmount()); ?>" step="0.01" required>
                        </div>
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                    <a href="index.php?page=position" class="btn btn-secondary">Quay lại</a>
                </div>
            </form>
    <?php
        } else {
            echo '<p class="text-danger">Không tìm thấy thông tin chức vụ.</p>';
        }
    } else {
        echo '<p class="text-danger">Không có thông tin chi tiết.</p>';
    }
    ?>
</div>
