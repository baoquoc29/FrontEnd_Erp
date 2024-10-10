<?php
$contractController = new ContractController();

$searchKeywords = isset($_GET['search']) ? $_GET['search'] : ''; // Lấy từ khóa tìm kiếm từ request

if (!empty($searchKeywords)) {
    $contractList = $contractController->searchContracts($searchKeywords); // Tìm kiếm hợp đồng
} else {
    $contractList = $contractController->getContractList(); // Lấy danh sách hợp đồng thông thường
}
?>

<div class="container mt-4">
    <h2 class="text-center mb-4">Danh Sách Hợp Đồng</h2>
    <form method="GET" action="index.php" class="mb-3">
        <div class="input-group">
            <input type="hidden" name="page" value="contract">
            <input type="text" name="search" class="form-control" placeholder="Tìm kiếm hợp đồng..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </div>
    </form>

    <div class="text-end mb-3">
        <a href="index.php?page=create_contract" class="btn btn-success">Thêm Hợp Đồng</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Tên Nhân Viên</th>
                <th>Phòng Ban</th>
                <th>Chức Vụ</th>
                <th>Lương Hợp Đồng</th>
                <th>Ngày Bắt Đầu</th>
                <th>Ngày Kết Thúc</th>
                <th>Trạng Thái</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($contractList) && is_array($contractList)): ?>
                <?php foreach ($contractList as $index => $contract): ?>
                    <tr>
                        <td><?= (int)$index + 1 ?></td>
                        <td><?= htmlspecialchars($contract->getEmployeeName()) ?></td>
                        <td><?= htmlspecialchars($contract->getDepartmentName()) ?></td>
                        <td><?= htmlspecialchars($contract->getPositionName()) ?></td>
                        <td><?= number_format($contract->getSalaryContract(), 2) ?> VNĐ</td>
                        <td><?= htmlspecialchars($contract->getFormattedStartDate()) ?></td>
                        <td><?= htmlspecialchars($contract->getFormattedEndDate()) ?></td>
                        <td><?= htmlspecialchars($contract->getFormattedContractStatus()) ?></td>
                        <td>
                            <a href="?page=update_contract&id=<?= htmlspecialchars($contract->getContractID()) ?>&name=<?= htmlspecialchars($contract->getEmployeeName()) ?>" class="btn btn-primary btn-sm">Xem</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="9" class="text-center">
                        Không tìm thấy hợp đồng nào với từ khóa: <strong><?= htmlspecialchars($searchKeywords) ?></strong>.
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
