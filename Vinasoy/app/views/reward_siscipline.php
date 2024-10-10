<?php
$rewardDisciplineController = new RewardDisciplineController();

$searchKeywords = isset($_GET['search']) ? $_GET['search'] : ''; // Lấy từ khóa tìm kiếm từ request

if (!empty($searchKeywords)) {
    $rewardDisciplineList = $rewardDisciplineController->searchRewardDisciplines($searchKeywords); // Tìm kiếm khen thưởng/kỷ luật
} else {
    $rewardDisciplineList = $rewardDisciplineController->getAllRewardDisciplines(); // Lấy danh sách khen thưởng/kỷ luật thông thường
}
?>

<div class="container mt-4">
    <h2 class="text-center mb-4">Danh Sách Khen Thưởng và Kỷ Luật</h2>
    <form method="GET" action="index.php" class="mb-3">
        <div class="input-group">
            <input type="hidden" name="page" value="reward_discipline">
            <input type="text" name="search" class="form-control" placeholder="Tìm kiếm khen thưởng/kỷ luật..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </div>
    </form>

    <div class="text-end mb-3">
        <a href="index.php?page=create_reward_discipline" class="btn btn-success">Thêm Khen Thưởng/Kỷ Luật</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Mã Khen Thưởng/Kỷ Luật</th>
                <th>Tên Nhân Viên</th>
                <th>Phòng Ban</th>
                <th>Hình Thức</th>
                <th>Số Quyết Định</th>
                <th>Ngày Quyết Định</th>
                <th>Lý Do</th>
                <th>Người Ký</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($rewardDisciplineList) && is_array($rewardDisciplineList)): ?>
                <?php foreach ($rewardDisciplineList as $index => $rewardDiscipline): ?>
                    <tr>
                        <td><?= (int)$index + 1 ?></td>
                        <td><?= htmlspecialchars($rewardDiscipline->getRewardDisciplineId()) ?></td>
                        <td><?= htmlspecialchars($rewardDiscipline->getEmployeeResponseDTO()->getEmployeeName()) ?></td>
                        <td><?= htmlspecialchars($rewardDiscipline->getEmployeeResponseDTO()->getDepartment()->getNameDepartment()) ?></td>
                        <td><?= htmlspecialchars($rewardDiscipline->getForm()) ?></td>
                        <td><?= htmlspecialchars($rewardDiscipline->getDecisionNumber()) ?></td>
                        <td><?= htmlspecialchars($rewardDiscipline->getDecisionDate()->format('Y-m-d')) ?></td>

                        <td><?= htmlspecialchars($rewardDiscipline->getReason()) ?></td>
                        <td><?= htmlspecialchars($rewardDiscipline->getSigner()) ?></td>
                        <td>
                            <a href="?page=update_reward&id=<?= htmlspecialchars($rewardDiscipline->getRewardDisciplineId()) ?>" class="btn btn-primary btn-sm">Xem</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="10" class="text-center">
                        Không tìm thấy khen thưởng/kỷ luật nào với từ khóa: <strong><?= htmlspecialchars($searchKeywords) ?></strong>.
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
