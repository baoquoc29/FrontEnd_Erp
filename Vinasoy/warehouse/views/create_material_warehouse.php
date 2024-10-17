<div class="container mt-4">
    <div class="text-end mb-3">
        <a href="index.php?page=material_warehouse" class="btn btn-success">Quản lý Kho Nguyên Liệu</a>
    </div>

    <?php
    $materialWarehouseController = new MaterialWarehouseController();
    $materialController = new MaterialController();
    $materials = $materialController->getAllMaterials();

    $successMessage = '';
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $materialWarehouseData = [
            'materialId' => $_POST['material_id'],
            'quantity' => $_POST['quantity'],
            'note' => $_POST['note'],
            'mwhStatus' => $_POST['materialWhStatus'],
        ];
        
        $addResponse = $materialWarehouseController->createMaterialWarehouse($materialWarehouseData);

        // Kiểm tra phản hồi từ phương thức
        if (isset($addResponse['success'])) {
            $successMessage = htmlspecialchars($addResponse['success']); // Lưu thông báo thành công
            echo "<script>
                    alert('Thêm kho nguyên liệu thành công!'); 
                    window.location.href = '?page=material_warehouse';
                  </script>";
        } else {
            echo '<p class="text-danger">' . htmlspecialchars($addResponse['error'] ?? 'Có lỗi xảy ra trong quá trình thêm kho nguyên liệu.') . '</p>';
        }
    }
    ?>

    <h2>Thêm Kho Nguyên Liệu Mới</h2>

    <?php if ($successMessage): ?>
    <div class="alert alert-success">
        <?php echo $successMessage; ?>
    </div>
    <?php endif; ?>

    <form action="" method="post">
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="material_id">Nguyên Liệu:</label>
                    <select id="material_id" name="material_id" class="form-control" required>
                        <?php if (!empty($materials) && is_array($materials)): ?>
                        <?php foreach ($materials as $index => $material): ?>
                        <option value="<?= htmlspecialchars($material->getMaterialId()) ?>">
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
                    <input type="number" id="quantity" name="quantity" class="form-control"
                    required oninvalid="this.setCustomValidity('Số lượng không được để trống!')" oninput="setCustomValidity('')">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="note">Ghi chú</label>
                    <input type="text" id="note" name="note" class="form-control" 
                    oninvalid="this.setCustomValidity('Đơn vị!')" oninput="setCustomValidity('')" required>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="materialWhStatus">Trạng thái:</label>
                    <select id="materialWhStatus" name="materialWhStatus" class="form-control" required>
                        <option value="Sẵn hàng">Sẵn hàng</option>
                        <option value="Hết hàng">Hết hàng</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-primary">Lưu</button>
            <a href="index.php?page=material_warehouse" class="btn btn-secondary">Quay lại</a>
        </div>
    </form>
</div>