<div class="container mt-4">
    <div class="text-end mb-3">
        <a href="index.php?page=product_warehouse" class="btn btn-success">Quản lý Kho Sản Phẩm</a>
    </div>

    <?php
    $productWarehouseController = new ProductWarehouseController();
    $productController = new ProductController();
    $products = $productController->getAllProducts();

    $successMessage = '';
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $productWarehouseData = [
            'productId' => $_POST['product_id'],
            'quantity' => $_POST['quantity'],
            'dateOfImport' => $_POST['dateOfImport'],
            'productWhStatus' => $_POST['productWhStatus'],
        ];
        
        $addResponse = $productWarehouseController->createProductWarehouse($productWarehouseData);

        // Kiểm tra phản hồi từ phương thức
        if (isset($addResponse['success'])) {
            $successMessage = htmlspecialchars($addResponse['success']); // Lưu thông báo thành công
            echo "<script>
                    alert('Thêm kho sản phẩm thành công!'); 
                    window.location.href = '?page=product_warehouse';
                  </script>";
        } else {
            echo '<p class="text-danger">' . htmlspecialchars($addResponse['error'] ?? 'Có lỗi xảy ra trong quá trình thêm kho sản phẩm.') . '</p>';
        }
    }
    ?>

    <h2>Thêm Kho Sản Phẩm Mới</h2>

    <?php if ($successMessage): ?>
    <div class="alert alert-success">
        <?php echo $successMessage; ?>
    </div>
    <?php endif; ?>

    <form action="" method="post">
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="product_id">Sản phẩm:</label>
                    <select id="product_id" name="product_id" class="form-control" required>
                        <?php if (!empty($products) && is_array($products)): ?>
                        <?php foreach ($products as $index => $product): ?>
                        <option value="<?= htmlspecialchars($product->getProductId()) ?>">
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
                    <input type="number" id="quantity" name="quantity" class="form-control"
                    required oninvalid="this.setCustomValidity('Số lượng không được để trống!')" oninput="setCustomValidity('')">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="dateOfImport">Ngày nhập:</label>
                    <input type="date" id="dateOfImport" name="dateOfImport" class="form-control" 
                    oninvalid="this.setCustomValidity('Ngày nhập không được để trống!')" oninput="setCustomValidity('')" required>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="productWhStatus">Trạng thái:</label>
                    <select id="productWhStatus" name="productWhStatus" class="form-control" required>
                        <option value="Sẵn hàng">Sẵn hàng</option>
                        <option value="Hết hàng">Hết hàng</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-primary">Lưu</button>
            <a href="index.php?page=product_warehouse" class="btn btn-secondary">Quay lại</a>
        </div>
    </form>
</div>