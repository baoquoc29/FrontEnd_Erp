<?php

class PositionController {
    private $positionRepo;

    public function __construct() {
        $this->positionRepo = new PositionRepository();
    }

    public function getAllPositions() {
        try {
            $positions = $this->positionRepo->fetchAllPositions();
            return $positions; 
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function getPositionById(string $id) {
        try {
            $position = $this->positionRepo->fetchPositionById($id);
            if ($position) {
                return $position; 
            } else {
                return ['error' => 'Không tìm thấy vị trí với ID: ' . $id];
            }
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function updatePosition($positionData) {
        try {
            $response = $this->positionRepo->updatePosition($positionData);
    
            if ($response && $response['code'] == 200) {
                return ['success' => 'Cập nhật thông tin vị trí thành công!'];
            } else {
                error_log('Error updating position: ' . json_encode($response));
                return ['error' => 'Cập nhật thông tin vị trí thất bại!'];
            }
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function createPosition($positionData) {
        try {
            $response = $this->positionRepo->createPosition($positionData);
            
            if ($response && $response['code'] == 201) {
                return ['success' => 'Thêm vị trí thành công!'];
            } else {
                error_log('Error creating position: ' . json_encode($response));
                return ['error' => 'Thêm vị trí thất bại!'];
            }
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function deletePosition($id) {
        try {
            $response = $this->positionRepo->deletePosition($id);
            if ($response && $response['code'] == 200) {
                return ['success' => 'Xóa vị trí thành công!'];
            } else {
                error_log('Error deleting position: ' . json_encode($response));
                return ['error' => 'Xóa vị trí thất bại!'];
            }
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function searchPositions($keywords) {
        try {
            $positions = $this->positionRepo->searchPositions($keywords);
            
            // Kiểm tra nếu có kết quả
            if (!empty($positions)) {
                return $positions; // Trả về danh sách các vị trí
            } else {
                return []; // Trả về mảng rỗng nếu không tìm thấy
            }
        } catch (Exception $e) {
            // Trả về mảng rỗng trong trường hợp có lỗi
            return []; // Bạn có thể quyết định cách xử lý lỗi ở đây
        }
    }
    
}
