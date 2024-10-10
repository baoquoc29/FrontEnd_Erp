<div class="container mt-4">
    <div class="text-end mb-3">
        <a href="index.php?page=contract" class="btn btn-success">Hợp đồng</a>
    </div>

    <?php
    $employeeController = new EmployeeController();
    $departmentRepository = new DepartmentRepository();
    $positionRepository = new PositionRepository();
    $departments = $departmentRepository->fetchDepartmentList();
    $positions = $positionRepository->fetchAllPositions();

    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $successMessage = ''; // Biến để lưu thông báo thành công

    // Kiểm tra nếu ID có sẵn
    if ($id) {
        // Lấy thông tin nhân viên theo ID
        $employee = $employeeController->getEmployeeById($id);

        if ($employee) {
            // Xử lý cập nhật thông tin nhân viên nếu có dữ liệu từ biểu mẫu
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Lấy dữ liệu từ biểu mẫu
                $employeeData = [
                    'employeeID' => $_POST['id'],
                    'employeeName' => $_POST['name'],
                    'phoneNumber' => $_POST['phone'],
                    'email' => $_POST['email'],
                    'cccd' => $_POST['cccd'],
                    'address' => $_POST['address'],
                    'gender' => $_POST['gender'],
                    'birthday' => $_POST['birthday'],
                    'positionID' => $_POST['position'],
                    'departmentID' => $_POST['department'],
                    'employeeStatus' => $_POST['status'], // Thêm trạng thái vào dữ liệu
                ];
                $updateResponse = $employeeController->updateEmployee($employeeData);

                // Kiểm tra phản hồi từ phương thức
                if (isset($updateResponse['success'])) {
                    $successMessage = htmlspecialchars($updateResponse['success']); // Lưu thông báo thành công
                    echo "<script>
                    alert('Cập nhật thành công!');
                    window.location.href ='?page=thongtinnhanvien';
                </script>";
                    exit();
                    // Cập nhật lại thông tin nhân viên sau khi cập nhật
                    $employee = $employeeController->getEmployeeById($id);
                } else {
                    echo '<p class="text-danger">' . htmlspecialchars($updateResponse['error'] ?? 'Có lỗi xảy ra trong quá trình cập nhật.') . '</p>';
                }
            }
    ?>
            <h2>Thông Tin Chi Tiết Nhân Viên #<?php echo htmlspecialchars($employee->getEmployeeID()); ?></h2>

            <?php if ($successMessage): // Hiển thị thông báo nếu có 
            ?>
                <div class="alert alert-success">
                    <?php echo $successMessage; ?>
                </div>
            <?php endif; ?>

            <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($employee->getEmployeeID()); ?>">

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Tên:</label>
                            <input type="text" id="name" name="name" class="form-control" value="<?php echo htmlspecialchars($employee->getEmployeeName()); ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" class="form-control" value="<?php echo htmlspecialchars($employee->getEmail()); ?>" required>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone">Số điện thoại:</label>
                            <input type="text" id="phone" name="phone" class="form-control" value="<?php echo htmlspecialchars($employee->getPhoneNumber()); ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="position">Chức vụ:</label>
                            <select id="position" name="position" class="form-control" required>
                                <?php foreach ($positions as $position): ?>
                                    <option value="<?php echo htmlspecialchars($position->getPositionId()); ?>" <?php echo ($employee->getPosition()->getPositionId() == $position->getPositionId()) ? 'selected' : ''; ?>>
                                        <?php echo htmlspecialchars($position->getNamePosition()); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="department">Phòng ban:</label>
                            <select id="department" name="department" class="form-control" required>
                                <?php foreach ($departments as $department): ?>
                                    <option value="<?php echo htmlspecialchars($department->getDepartmentID()); ?>" <?php echo ($employee->getDepartment()->getDepartmentID() == $department->getDepartmentID()) ? 'selected' : ''; ?>>
                                        <?php echo htmlspecialchars($department->getNameDepartment()); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="status">Trạng thái:</label>
                            <select id="status" name="status" class="form-control" required>
                                <option value="1" <?php echo ($employee->getEmployeeStatus() == '1') ? 'selected' : ''; ?>>Đang hoạt động</option>
                                <option value="2" <?php echo ($employee->getEmployeeStatus() == '2') ? 'selected' : ''; ?>>Chưa có hợp đồng</option>
                                <option value="0" <?php echo ($employee->getEmployeeStatus() == '0') ? 'selected' : ''; ?>>Hết hợp đồng</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cccd">CCCD:</label>
                            <input type="text" id="cccd" name="cccd" class="form-control" value="<?php echo htmlspecialchars($employee->getCccd()); ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="gender">Giới tính:</label>
                            <select id="gender" name="gender" class="form-control" required>
                                <option value="male" <?php echo ($employee->getGender() == 'Nam') ? 'selected' : ''; ?>>Nam</option>
                                <option value="female" <?php echo ($employee->getGender() == 'Nữ') ? 'selected' : ''; ?>>Nữ</option>
                                <option value="other" <?php echo ($employee->getGender() == 'Khác') ? 'selected' : ''; ?>>Khác</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="birthday">Ngày sinh:</label>
                            <input type="date" id="birthday" name="birthday" class="form-control" value="<?php echo htmlspecialchars($employee->getBirthday()->format('Y-m-d')); ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="address">Địa chỉ:</label>
                            <input type="text" id="address" name="address" class="form-control" value="<?php echo htmlspecialchars($employee->getAddress()); ?>" required>
                        </div>
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                    <a href="index.php" class="btn btn-secondary">Quay lại</a>
                </div>
            </form>
    <?php
        } else {
            echo '<p class="text-danger">Không tìm thấy thông tin nhân viên.</p>';
        }
    } else {
        echo '<p class="text-danger">Không có thông tin chi tiết.</p>';
    }
    ?>
</div>