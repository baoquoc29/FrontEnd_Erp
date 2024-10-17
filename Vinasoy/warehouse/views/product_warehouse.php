<?php
$productWarehouseController = new ProductWarehouseController();

$searchKeywords = isset($_GET['search']) ? $_GET['search'] : ''; // Lấy từ khóa tìm kiếm từ request

if (!empty($searchKeywords)) {
    $productWarehouse = $productWarehouseController->searchProductWarehouse($searchKeywords);
} else {
    $productWarehouse = $productWarehouseController->getAllProductWarehouse();
}
?>

<div class="container mt-4">
    <h2 class="text-center mb-4">Danh Sách Kho Sản Phẩm</h2>
    <form method="GET" action="index.php" class="mb-3">
        <div class="input-group">
            <input type="hidden" name="page" value="product_warehouse">
            <input type="text" name="search" class="form-control" placeholder="Tìm kiếm kho sản phẩm..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </div>
    </form>

    <div class="text-end mb-3">
        <a href="index.php?page=create_product_warehouse" class="btn btn-success">Thêm Kho sản phẩm</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Mã Kho Sản Phẩm</th>
                <th>Tên Sản Phẩm</th>
                <th>Loại</th>
                <th>Trọng Lượng</th>
                <th>Giá Tiền</th>
                <th>Ngày Nhập</th>
                <th>Số Lượng</th>
                <th>Trạng Thái</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($productWarehouse) && is_array($productWarehouse)): ?>
                <?php foreach ($productWarehouse as $index => $productWarehouse): ?>
                    <tr>
                        <td><?= (int)$index + 1 ?></td>
                        <td><?= htmlspecialchars($productWarehouse->getProductWarehouseId()) ?></td>
                        <td><?= htmlspecialchars($productWarehouse->getProductDTO()->getProductName()) ?></td>
                        <td><?= htmlspecialchars($productWarehouse->getProductDTO()->getProductType()) ?></td>
                        
                        <td><?= htmlspecialchars($productWarehouse->getProductDTO()->getWeight() . ' ' . $productWarehouse->getProductDTO()->getUnit()) ?></td>

                        <td><?= htmlspecialchars($productWarehouse->getProductDTO()->getUnitPrice()) . '' .'VNĐ' ?></td>
                        <td><?= htmlspecialchars($productWarehouse->getDateOfImport()->format('d-m-Y')) ?></td>
                        <td><?= htmlspecialchars($productWarehouse->getQuantity()) ?></td>
                        <td><?= htmlspecialchars($productWarehouse->getProductWhStatus()) ?></td>

                        <td>
                            <a href="?page=update_product_warehouse&id=<?= htmlspecialchars($productWarehouse->getProductWarehouseId()) ?>" class="btn btn-primary btn-sm">Xem</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php elseif (!empty($productWarehouse) && !is_array($productWarehouse)): ?>
                    <tr>
                        <td><?=  1 ?></td>
                        <td><?= htmlspecialchars($productWarehouse->getProductWarehouseId()) ?></td>
                        <td><?= htmlspecialchars($productWarehouse->getProductDTO()->getProductName()) ?></td>
                        <td><?= htmlspecialchars($productWarehouse->getProductDTO()->getProductType()) ?></td>
                        
                        <td><?= htmlspecialchars($productWarehouse->getProductDTO()->getWeight() . ' ' . $productWarehouse->getProductDTO()->getUnit()) ?></td>

                        <td><?= htmlspecialchars($productWarehouse->getProductDTO()->getUnitPrice()) . '' .'VNĐ' ?></td>
                        <td><?= htmlspecialchars($productWarehouse->getDateOfImport()->format('d-m-Y')) ?></td>
                        <td><?= htmlspecialchars($productWarehouse->getQuantity()) ?></td>
                        <td><?= htmlspecialchars($productWarehouse->getProductWhStatus()) ?></td>

                        <td>
                            <a href="?page=update_product_warehouse&id=<?= htmlspecialchars($productWarehouse->getProductWarehouseId()) ?>" class="btn btn-primary btn-sm">Xem</a>
                        </td>
                    </tr>
            <?php else: ?>
                <tr>
                    <td colspan="10" class="text-center">
                        Không tìm thấy kho sản phẩm nào với từ khóa: <strong><?= htmlspecialchars($searchKeywords) ?></strong>.
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
