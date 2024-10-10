<div class="container mt-4">
    <div class="text-end mb-3">
        <a href="index.php?page=contract" class="btn btn-success">Hợp đồng</a>
    </div>

    <?php
    $employeeController = new EmployeeController();
    $contractController = new ContractController();
    $departmentRepository = new DepartmentRepository();
    $positionRepository = new PositionRepository();
    $departments = $departmentRepository->fetchDepartmentList();
    $positions = $positionRepository->fetchAllPositions();

    $successMessage = '';

    // Lấy dữ liệu hợp đồng từ form
    $contractData = [
        'salaryGradeScaleId' => $_POST['salary_grade_scale_id'] ?? '',
        'salaryContract' => $_POST['salary_contract'] ?? '',
        'startDate' => $_POST['start_date'] ?? '',
        'endDate' => $_POST['end_date'] ?? '',
        'contractStatus' => $_POST['contract_status'] ?? ''
    ];

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'])) {
        $contractResponse = $contractController->createContract($contractData);

        // echo "<pre>";
        // echo 'Chào: ' . print_r($contractResponse, true);
        // echo "</pre>";

        // Kiểm tra xem phản hồi có thành công hay không
        if (isset($contractResponse[0]['code']) && $contractResponse[0]['code'] === 201) {
            $contractID = $contractResponse[0]['result']['contractID'] ?? null;

            // if ($contractID) {
            //     echo "Giá trị contractID là: " . htmlspecialchars($contractID);
            // } else {
            //     echo "Không tìm thấy contractID trong phản hồi.";
            // }
        } else {
            echo "Có lỗi xảy ra trong quá trình tạo hợp đồng.";
            $contractID = null;
        }

        // Dữ liệu nhân viên
        $employeeData = [
            'employeeName' => $_POST['name'],
            'phoneNumber' => $_POST['phone'],
            'email' => $_POST['email'],
            'cccd' => $_POST['cccd'],
            'address' => $_POST['address'],
            'gender' => $_POST['gender'],
            'birthday' => $_POST['birthday'],
            'positionID' => $_POST['position'],
            'departmentID' => $_POST['department'],
            'employeeStatus' => $_POST['employeeStatus'] ?? 2,
            'contractID' => $contractID
        ];

        // Gọi phương thức thêm nhân viên
        $addResponse = $employeeController->createEmployee($employeeData);

        // Kiểm tra phản hồi từ phương thức
        if (isset($addResponse['success'])) {
            $successMessage = htmlspecialchars($addResponse['success']); // Lưu thông báo thành công
            echo "<script>
                    alert('Thêm nhân viên thành công!'); 
                    window.location.href = '?page=contract';
                  </script>";
        } else {
            echo '<p class="text-danger">' . htmlspecialchars($addResponse['error'] ?? 'Có lỗi xảy ra trong quá trình thêm nhân viên.') . '</p>';
        }
    }
    ?>

    <h2>Thêm Nhân Viên Mới</h2>

    <?php if ($successMessage): ?>
        <div class="alert alert-success">
            <?php echo $successMessage; ?>
        </div>
    <?php endif; ?>

    <form action="" method="post">
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Tên:</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="phone">Số điện thoại:</label>
                    <input type="text" id="phone" name="phone" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="position">Chức vụ:</label>
                    <select id="position" name="position" class="form-control" required>
                        <?php foreach ($positions as $position): ?>
                            <option value="<?php echo htmlspecialchars($position->getPositionId()); ?>">
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
                            <option value="<?php echo htmlspecialchars($department->getDepartmentID()); ?>">
                                <?php echo htmlspecialchars($department->getNameDepartment()); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="cccd">CCCD:</label>
                    <input type="text" id="cccd" name="cccd" class="form-control" required>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="gender">Giới tính:</label>
                    <select id="gender" name="gender" class="form-control" required>
                        <option value="male">Nam</option>
                        <option value="female">Nữ</option>
                        <option value="other">Khác</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="birthday">Ngày sinh:</label>
                    <input type="date" id="birthday" name="birthday" class="form-control" required>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="address">Địa chỉ:</label>
                    <input type="text" id="address" name="address" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="employeeStatus">Trạng thái:</label>
                    <select id="employeeStatus" name="employeeStatus" class="form-control" required>
                        <option value="1">Đang làm việc</option>
                        <option value="2" selected>Chưa tạo hợp đồng</option>
                        <option value="3">Ngừng hợp đồng</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Thêm trường ẩn cho thông tin hợp đồng -->
        <input type="hidden" name="salary_grade_scale_id" value="<?php echo htmlspecialchars($contractData['salaryGradeScaleId']); ?>">
        <input type="hidden" name="salary_contract" value="<?php echo htmlspecialchars($contractData['salaryContract']); ?>">
        <input type="hidden" name="start_date" value="<?php echo htmlspecialchars($contractData['startDate']); ?>">
        <input type="hidden" name="end_date" value="<?php echo htmlspecialchars($contractData['endDate']); ?>">
        <input type="hidden" name="contract_status" value="<?php echo htmlspecialchars($contractData['contractStatus']); ?>">

        <div class="text-end">
            <button type="submit" class="btn btn-primary">Lưu</button>
            <a href="index.php" class="btn btn-secondary">Quay lại</a>
        </div>
    </form>

    <h3 class="mt-4">Thông tin hợp đồng:</h3>
    <ul>
        <?php foreach ($contractData as $key => $value): ?>
            <li><strong><?php echo ucfirst(str_replace('_', ' ', $key)); ?>:</strong> <?php echo htmlspecialchars($value); ?></li>
        <?php endforeach; ?>
    </ul>
</div>