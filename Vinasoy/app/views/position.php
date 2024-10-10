<?php
$positionController = new PositionController();

$searchKeywords = isset($_GET['search']) ? $_GET['search'] : ''; // Lấy từ khóa tìm kiếm từ request

if (!empty($searchKeywords)) {
    $positions = $positionController->searchPositions($searchKeywords); // Tìm kiếm chức vụ
} else {
    $positions = $positionController->getAllPositions(); // Lấy danh sách chức vụ thông thường
}
?>

<div class="container mt-4">
    <h2 class="text-center mb-4">Danh Sách Chức Vụ</h2>
    <form method="GET" action="index.php" class="mb-3">
        <div class="input-group">
            <input type="hidden" name="page" value="position">
            <input type="text" name="search" class="form-control" placeholder="Tìm kiếm chức vụ..." 
                   value="<?= htmlspecialchars($searchKeywords) ?>">
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </div>
    </form>

    <div class="text-end mb-3">
        <a href="index.php?page=create_position" class="btn btn-success">Thêm Chức Vụ</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Mã Chức Vụ</th>
                <th>Tên Chức Vụ</th>
                <th>Phụ Cấp</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($positions) && is_array($positions)): ?>
                <?php foreach ($positions as $index => $position): ?>
                    <tr>
                        <td><?= (int)$index + 1 ?></td>
                        <td><?= htmlspecialchars($position->getPositionId()) ?></td>
                        <td><?= htmlspecialchars($position->getNamePosition()) ?></td>
                        <td><?= htmlspecialchars(number_format($position->getAllowanceAmount(), 2)) ?> VNĐ</td>
                        <td>
                            <a href="index.php?page=update_position&id=<?= htmlspecialchars($position->getPositionId()) ?>" 
                               class="btn btn-warning btn-sm">Sửa</a>
                            <button class='btn btn-danger btn-sm' 
                                    onclick='deletePosition("<?= htmlspecialchars($position->getPositionId()) ?>")'>Xóa</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center">Không tìm thấy chức vụ nào với từ khóa: <strong><?= htmlspecialchars($searchKeywords) ?></strong>.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<script>
    function deletePosition(code) {
        if (confirm('Bạn có chắc chắn muốn xóa chức vụ này không?')) {
            // Xóa chức vụ thông qua yêu cầu AJAX hoặc chuyển hướng đến trang xử lý
            window.location.href = "index.php?page=delete_position&id=" + encodeURIComponent(code);
        }
    }
</script>
