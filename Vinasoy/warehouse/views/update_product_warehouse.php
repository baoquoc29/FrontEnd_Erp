<div class="container mt-4">
    <div class="text-end mb-3">
        <a href="index.php?page=product_warehouse" class="btn btn-success">Quản lý Kho Sản Phẩm</a>
    </div>

    <?php
    // Giả sử bạn có các controller và repository cần thiết
    $productWarehouseController = new ProductWarehouseController();
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $successMessage = ''; // Biến để lưu thông báo thành công

    $productController = new ProductController();
    $products = $productController->getAllProducts();

    // Kiểm tra nếu ID có sẵn
    if ($id) {
        // Lấy thông tin kho sản phẩm theo ID
        $productWarehouse = $productWarehouseController->getProductWarehouseById($id);

        if ($productWarehouse) {
            // Xử lý cập nhật thông tin nếu có dữ liệu từ biểu mẫu
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Lấy dữ liệu từ biểu mẫu
                $productWarehouseData = [
                    'productWarehouseId' => $_POST['product_warehouse_id'],
                    'productId' => $_POST['product_id'],
                    'quantity' => $_POST['quantity'],
                    'dateOfImport' => $_POST['dateOfImport'],
                    'productWhStatus' => $_POST['productWhStatus'],
                ];
                $updateResponse = $productWarehouseController->updateProductWarehouse($productWarehouseData);

                // Kiểm tra phản hồi từ phương thức
                if (isset($updateResponse['success'])) {
                    $successMessage = htmlspecialchars($updateResponse['success']); // Lưu thông báo thành công
                    echo "<script>
                    alert('Cập nhật thành công!');
                    window.location.href ='?page=product_warehouse';
                </script>";
                    exit();
                    // Cập nhật lại thông tin kho sản phẩm
                    $productWarehouse = $productWarehouseController->getProductWarehouseById($id);
                } else {
                    echo '<p class="text-danger">' . htmlspecialchars($updateResponse['error'] ?? 'Có lỗi xảy ra trong quá trình cập nhật.') . '</p>';
                }
            }
    ?>
            <h2>Thông Tin Chi Tiết Kho Sản Phẩm #<?php echo htmlspecialchars($productWarehouse->getProductWarehouseId()); ?></h2>

            <?php if ($successMessage): ?>
                <div class="alert alert-success">
                    <?php echo $successMessage; ?>
                </div>
            <?php endif; ?>

            <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($productWarehouse->getProductWarehouseId()); ?>">

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="product_warehouse_id">Mã Kho Sản Phẩm:</label>
                            <input type="text" id="product_warehouse_id" name="product_warehouse_id" readOnly class="form-control" value="<?php echo htmlspecialchars($productWarehouse->getProductWarehouseId()); ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="product_id">Sản phẩm:</label>
                            <select id="product_id" name="product_id" class="form-control" required>
                                <?php if (!empty($products) && is_array($products)): ?>
                                    <?php foreach ($products as $index => $product): ?>
                                        <option value="<?= htmlspecialchars($product->getProductId()) ?>" <?php echo ($product->getProductId() == $productWarehouse->getProductDTO()->getProductId()) ? 'selected' : ''; ?>>
                                            <?= htmlspecialchars ($product->getProductId() . ' ' .$product->getProductName(). ' ' .$product->getProductType()) ?>
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
                            <input type="number" id="quantity" name="quantity" class="form-control" value="<?php echo htmlspecialchars($productWarehouse->getQuantity()); ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="dateOfImport">Ngày nhập:</label>
                            <input type="date" id="dateOfImport" name="dateOfImport" class="form-control" value="<?php echo htmlspecialchars($productWarehouse->getDateOfImport()->format('Y-m-d')); ?>" required>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="productWhStatus">Trạng thái:</label>
                            <select id="productWhStatus" name="productWhStatus" class="form-control" required>
                                <option value="Sẵn hàng" <?php echo ($productWarehouse->getProductWhStatus() == 'Sẵn hàng') ? 'selected' : ''; ?>>Sẵn hàng</option>
                                <option value="Hết hàng" <?php echo ($productWarehouse->getProductWhStatus() == 'Hết hàng') ? 'selected' : ''; ?>>Hết hàng</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                    <a href="index.php?page=product_warehouse" class="btn btn-secondary">Quay lại</a>
                </div>
            </form>
    <?php
        } else {
            echo '<p class="text-danger">Không tìm thấy thông tin kho sản phẩm.</p>';
        }
    } else {
        echo '<p class="text-danger">Không có thông tin chi tiết.</p>';
    }
    ?>
</div>
