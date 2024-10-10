<?php

class RewardDisciplineController {
    private $rewardDisciplineRepo;

    public function __construct() {
        $this->rewardDisciplineRepo = new RewardDisciplineRepository();
    }

    public function getAllRewardDisciplines() {
        try {
            $rewardDisciplines = $this->rewardDisciplineRepo->fetchAllRewardDisciplines();
            return $rewardDisciplines; 
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function getRewardDisciplineById(string $id) {
        try {
            $rewardDiscipline = $this->rewardDisciplineRepo->fetchRewardDisciplineById($id);
            if ($rewardDiscipline) {
                return $rewardDiscipline; 
            } else {
                return ['error' => 'Không tìm thấy khen thưởng/kỷ luật với ID: ' . $id];
            }
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function updateRewardDiscipline($rewardDisciplineData) {
        try {
            $response = $this->rewardDisciplineRepo->updateRewardDiscipline($rewardDisciplineData);
    
            if ($response && $response['code'] == 200) {
                return ['success' => 'Cập nhật thông tin khen thưởng/kỷ luật thành công!'];
            } else {
                error_log('Error updating reward discipline: ' . json_encode($response));
                return ['error' => 'Cập nhật thông tin khen thưởng/kỷ luật thất bại!'];
            }
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function createRewardDiscipline($rewardDisciplineData) {
        try {
            $response = $this->rewardDisciplineRepo->createRewardDiscipline($rewardDisciplineData);
            
            if ($response && $response['code'] == 201) {
                return ['success' => 'Thêm khen thưởng/kỷ luật thành công!'];
            } else {
                error_log('Error creating reward discipline: ' . json_encode($response));
                return ['error' => 'Thêm khen thưởng/kỷ luật thất bại!'];
            }
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function deleteRewardDiscipline($id) {
        try {
            $response = $this->rewardDisciplineRepo->deleteRewardDiscipline($id);
            if ($response && $response['code'] == 200) {
                return ['success' => 'Xóa khen thưởng/kỷ luật thành công!'];
            } else {
                error_log('Error deleting reward discipline: ' . json_encode($response));
                return ['error' => 'Xóa khen thưởng/kỷ luật thất bại!'];
            }
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function searchRewardDisciplines($keywords) {
        try {
            $rewardDisciplines = $this->rewardDisciplineRepo->searchRewardDisciplines($keywords);
            
            // Kiểm tra nếu có kết quả
            if (!empty($rewardDisciplines)) {
                return $rewardDisciplines; // Trả về danh sách các khen thưởng/kỷ luật
            } else {
                return []; // Trả về mảng rỗng nếu không tìm thấy
            }
        } catch (Exception $e) {
            // Trả về mảng rỗng trong trường hợp có lỗi
            return []; // Bạn có thể quyết định cách xử lý lỗi ở đây
        }
    }
}
