<div class="container mt-4">
    <div class="text-end mb-3">
        <a href="index.php?page=material_warehouse" class="btn btn-success">Quản Lý Kho Nguyên Liệu</a>
    </div>

    <?php
    // Giả sử bạn có các controller và repository cần thiết
    $materialWarehouseController = new MaterialWarehouseController();
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $successMessage = ''; // Biến để lưu thông báo thành công

    $materialController = new MaterialController();
    $materials = $materialController->getAllMaterials();

    // Kiểm tra nếu ID có sẵn
    if ($id) {
        // Lấy thông tin kho nguyên liệu theo ID
        $materialWarehouse = $materialWarehouseController->getMaterialWarehouseById($id);

        if ($materialWarehouse) {
            // Xử lý cập nhật thông tin nếu có dữ liệu từ biểu mẫu
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Lấy dữ liệu từ biểu mẫu
                $materialWarehouseData = [
                    'materialWarehouseId' => $_POST['material_warehouse_id'],
                    'materialId' => $_POST['material_id'],
                    'quantity' => $_POST['quantity'],
                    'note' => $_POST['note'],
                    'mwhStatus' => $_POST['mwhStatus'],
                ];
                $updateResponse = $materialWarehouseController->updateMaterialWarehouse($materialWarehouseData);

                // Kiểm tra phản hồi từ phương thức
                if (isset($updateResponse['success'])) {
                    $successMessage = htmlspecialchars($updateResponse['success']); // Lưu thông báo thành công
                    echo "<script>
                    alert('Cập nhật thành công!');
                    window.location.href ='?page=material_warehouse';
                </script>";
                    exit();
                    // Cập nhật lại thông tin kho sản phẩm
                    $materialWarehouse = $materialWarehouseController->getMaterialWarehouseById($id);
                } else {
                    echo '<p class="text-danger">' . htmlspecialchars($updateResponse['error'] ?? 'Có lỗi xảy ra trong quá trình cập nhật.') . '</p>';
                }
            }
    ?>
            <h2>Thông Tin Chi Tiết Kho Nguyên Liệu #<?php echo htmlspecialchars($materialWarehouse->getMaterialWarehouseId()); ?></h2>

            <?php if ($successMessage): ?>
                <div class="alert alert-success">
                    <?php echo $successMessage; ?>
                </div>
            <?php endif; ?>

            <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($materialWarehouse->getMaterialWarehouseId()); ?>">

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="material_warehouse_id">Mã Kho Nguyên Liệu:</label>
                            <input type="text" id="material_warehouse_id" name="material_warehouse_id" readOnly class="form-control" value="<?php echo htmlspecialchars($materialWarehouse->getMaterialWarehouseId()); ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="material_id">Nguyên Liệu:</label>
                            <select id="material_id" name="material_id" class="form-control" required>
                                <?php if (!empty($materials) && is_array($materials)): ?>
                                    <?php foreach ($materials as $index => $material): ?>
                                        <option value="<?= htmlspecialchars($material->getMaterialId()) ?>" <?php echo ($material->getMaterialId() == $materialWarehouse->getMaterialDTO()->getMaterialId()) ? 'selected' : ''; ?>>
                                            <?= htmlspecialchars ($material->getMaterialId() . ' ' .$material->getMaterialName()) ?>
                                        </option>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="quantity">Số lượng:</label>
                            <input type="number" id="quantity" name="quantity" class="form-control" value="<?php echo htmlspecialchars($materialWarehouse->getQuantity()); ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="note">Ghi chú:</label>
                            <input type="text" id="note" name="note" class="form-control" value="<?php echo htmlspecialchars($materialWarehouse->getNote()); ?>" required>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mwhStatus">Trạng thái:</label>
                            <select id="mwhStatus" name="mwhStatus" class="form-control" required>
                                <option value="Sẵn hàng" <?php echo ($materialWarehouse->getMaterialWhStatus() == 'Sẵn hàng') ? 'selected' : ''; ?>>Sẵn hàng</option>
                                <option value="Hết hàng" <?php echo ($materialWarehouse->getMaterialWhStatus() == 'Hết hàng') ? 'selected' : ''; ?>>Hết hàng</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                    <a href="index.php?page=material_warehouse" class="btn btn-secondary">Quay lại</a>
                </div>
            </form>
    <?php
        } else {
            echo '<p class="text-danger">Không tìm thấy thông tin kho nguyên liệu.</p>';
        }
    } else {
        echo '<p class="text-danger">Không có thông tin chi tiết.</p>';
    }
    ?>
</div>
