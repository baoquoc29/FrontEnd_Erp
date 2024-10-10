<?php
// Khởi tạo controller
$salaryGradeScaleController = new SalaryGradeScaleController();

// Kiểm tra xem có yêu cầu tìm kiếm không
$searchQuery = isset($_GET['search']) ? trim($_GET['search']) : '';

// Lấy danh sách Salary Grade Scale hoặc tìm kiếm nếu có truy vấn
if ($searchQuery) {
    $salaryGradeScales = $salaryGradeScaleController->searchSalaryGradeScale($searchQuery);
} else {
    $salaryGradeScales = $salaryGradeScaleController->getSalaryGradeScaleList();
}
?>

<div class="container mt-4">
    <h2 class="text-center mb-4">Danh Sách Salary Grade Scale</h2>

    <?php if (isset($_GET['message'])): ?>
        <div class="alert alert-success"><?= htmlspecialchars($_GET['message']) ?></div>
    <?php endif; ?>

    <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($_GET['error']) ?></div>
    <?php endif; ?>

    <!-- Biểu mẫu tìm kiếm -->
    <form class="mb-3" method="get" action="">
        <input type="hidden" name="page" value="salaryscale">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Tìm kiếm Salary Grade Scale" value="<?= htmlspecialchars($searchQuery) ?>">
            <button class="btn btn-primary" type="submit">Tìm kiếm</button>
        </div>
    </form>

    <div class="text-end mb-3">
        <a href="?page=create_salaryscale" class="btn btn-success">Thêm Salary Grade Scale</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Mã Salary Grade Scale</th>
                <th>Salary Scale</th>
                <th>Tên Salary Grade</th>
                <th>Số Tiền</th>
                <th>Trạng Thái</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($salaryGradeScales)): ?>
                <?php foreach ($salaryGradeScales as $scale): ?>
                    <tr>
                        <td><?= htmlspecialchars($scale->getSalaryGradeScaleId()) ?></td>
                        <td><?= htmlspecialchars($scale->getSalaryScale()) ?></td>
                        <td><?= htmlspecialchars($scale->getSalaryGradeName()) ?></td>
                        <td><?= htmlspecialchars(number_format($scale->getSalaryAmount(), 2)) ?></td>
                        <td><?= htmlspecialchars($scale->getStatus() == 1 ? "Kích Hoạt" : "Vô Hiệu") ?></td>
                        <td>
                            <a href="?page=update_salaryscale&id=<?= urlencode(htmlspecialchars($scale->getSalaryGradeScaleId())) ?>" class="btn btn-warning btn-sm">Sửa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">Không có dữ liệu Salary Grade Scale.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
