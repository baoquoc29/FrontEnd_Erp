<?php
$employeeController = new EmployeeController();

$searchKeywords = isset($_GET['search']) ? $_GET['search'] : ''; // Lấy từ khóa tìm kiếm từ request

if (!empty($searchKeywords)) {
    $employeeList = $employeeController->searchEmployees($searchKeywords); // Tìm kiếm nhân viên
} else {
    $employeeList = $employeeController->getEmployeeList(); // Lấy danh sách nhân viên thông thường
}
?>

<div class="container mt-4">
    <h2 class="text-center mb-4">Danh Sách Nhân Viên</h2>
    <form method="GET" action="index.php" class="mb-3">
        <div class="input-group">
            <input type="hidden" name="page" value="employee">
            <input type="text" name="search" class="form-control" placeholder="Tìm kiếm nhân viên..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </div>
    </form>

    <div class="text-end mb-3">
        <a href="index.php?page=themcv" class="btn btn-success">Thêm Chức Vụ</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Số Điện Thoại</th>
                <th>Chức Vụ</th>
                <th>Phòng Ban</th>
                <th>Trạng Thái</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($employeeList)&& is_array($employeeList)): ?>
                <?php foreach ($employeeList as $index => $employee): ?>
                    <tr>
                        <td><?= (int)$index + 1 ?></td>
                        <td><?= htmlspecialchars($employee->getEmployeeName()) ?></td>
                        <td><?= htmlspecialchars($employee->getEmail()) ?></td>
                        <td><?= htmlspecialchars($employee->getPhoneNumber()) ?></td>
                        <td><?= htmlspecialchars($employee->getPosition()->getNamePosition()) ?></td>
                        <td><?= htmlspecialchars($employee->getDepartment()->getNameDepartment()) ?></td>
                        <td>
                            <?php
                            switch ($employee->getEmployeeStatus()) {
                                case "0":
                                    echo htmlspecialchars('Hoạt động');
                                    break;
                                case "1":
                                    echo htmlspecialchars('Đã nghỉ');
                                    break;
                                case "2":
                                    echo htmlspecialchars('Chưa có hợp đồng');
                                    break;
                                default:
                                    echo htmlspecialchars('Không xác định');
                                    break;
                            }
                            ?>
                        </td>
                        <td>
                            <a href="index.php?page=update_employee&id=<?= htmlspecialchars($employee->getEmployeeID()) ?>" class="btn btn-primary btn-sm">Xem</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8" class="text-center">Không tìm thấy nhân viên nào với từ khóa: <strong><?= htmlspecialchars($searchKeywords) ?></strong>.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
