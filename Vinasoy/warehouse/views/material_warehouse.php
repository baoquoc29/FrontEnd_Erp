<?php
$materialWarehouseController = new MaterialWarehouseController();

$searchKeywords = isset($_GET['search']) ? $_GET['search'] : ''; // Lấy từ khóa tìm kiếm từ request

if (!empty($searchKeywords)) {
    $materialWarehouse = $materialWarehouseController->searchMaterialWarehouse($searchKeywords);
} else {
    $materialWarehouse = $materialWarehouseController->getAllMaterialWarehouse();
}
?>

<div class="container mt-4">
    <h2 class="text-center mb-4">Danh Sách Kho Nguyên Liệu</h2>
    <form method="GET" action="index.php" class="mb-3">
        <div class="input-group">
            <input type="hidden" name="page" value="material_warehouse">
            <input type="text" name="search" class="form-control" placeholder="Tìm kiếm kho nguyên liệu..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </div>
    </form>

    <div class="text-end mb-3">
        <a href="index.php?page=create_material_warehouse" class="btn btn-success">Thêm Kho Nguyên Liệu</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Mã Kho Nguyên Liệu</th>
                <th>Tên Nguyên Liệu</th>
                <th>Số Lượng</th>
                <th>Đơn Vị</th>
                <th>Ghi Chú</th>
                <th>Trạng Thái</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($materialWarehouse) && is_array($materialWarehouse)): ?>
                <?php foreach ($materialWarehouse as $index => $materialWarehouse): ?>
                    <tr>
                        <td><?= (int)$index + 1 ?></td>
                        <td><?= htmlspecialchars($materialWarehouse->getMaterialWarehouseId()) ?></td>
                        <td><?= htmlspecialchars($materialWarehouse->getMaterialDTO()->getMaterialName()) ?></td>
                        <td><?= htmlspecialchars($materialWarehouse->getQuantity()) ?></td>
                        <td><?= htmlspecialchars($materialWarehouse->getMaterialDTO()->getUnit()) ?></td>
                        <td><?= htmlspecialchars($materialWarehouse->getNote()) ?></td>
                        <td><?= htmlspecialchars($materialWarehouse->getMaterialWhStatus()) ?></td>

                        <td>
                            <a href="?page=update_material_warehouse&id=<?= htmlspecialchars($materialWarehouse->getMaterialWarehouseId()) ?>" class="btn btn-primary btn-sm">Xem</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php elseif (!empty($materialWarehouse) && !is_array($materialWarehouse)): ?>
                    <tr>
                        <td><?=  1 ?></td>
                        <td><?= htmlspecialchars($materialWarehouse->getMaterialWarehouseId()) ?></td>
                        <td><?= htmlspecialchars($materialWarehouse->getMaterialDTO()->getMaterialName()) ?></td>
                        <td><?= htmlspecialchars($materialWarehouse->getMaterialDTO()->getUnit()) ?></td>
                        <td><?= htmlspecialchars($materialWarehouse->getNote()) ?></td>
                        <td><?= htmlspecialchars($materialWarehouse->getMaterialWhStatus()) ?></td>

                        <td>
                            <a href="?page=update_material_warehouse&id=<?= htmlspecialchars($materialWarehouse->getMaterialWarehouseId()) ?>" class="btn btn-primary btn-sm">Xem</a>
                        </td>
                    </tr>
            <?php else: ?>
                <tr>
                    <td colspan="10" class="text-center">
                        Không tìm thấy kho nguyên liệu nào với từ khóa: <strong><?= htmlspecialchars($searchKeywords) ?></strong>.
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
