<?php
$positionController = new PositionController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $positionData = [
        'positionID' => $_POST['positionID'],
        'namePosition' => $_POST['namePosition'],
        'allowanceAmount' => $_POST['allowanceAmount'],
        'status' => $_POST['status'],
    ];

    $response = $positionController->createPosition($positionData);
    if (isset($response['success'])) {
        echo "<script>
        alert('Thêm chức vụ thành công!'); 
        window.location.href = '?page=position';
      </script>";
    } else {
        echo '<div class="alert alert-danger">' . $response['error'] . '</div>';
    }
}
?>

<div class="container mt-5">
    <h2 class="text-center">Thêm Chức Vụ</h2>
    <form action="" method="post">

        <div class="form-group">
            <label for="positionID">Mã Chức Vụ</label>
            <input type="text" id="positionID" name="positionID" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="namePosition">Tên Chức Vụ</label>
            <input type="text" id="namePosition" name="namePosition" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="allowanceAmount">Số Tiền Trợ Cấp</label>
            <input type="number" step="0.01" id="allowanceAmount" name="allowanceAmount" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="status">Trạng Thái</label>
            <select id="status" name="status" class="form-control" required>
                <option value="1">Kích Hoạt</option>
                <option value="0">Vô Hiệu</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Thêm</button>
        <a href="positions.php" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
