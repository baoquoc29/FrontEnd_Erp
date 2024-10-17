<?php

class MaterialWarehouseController {
    private $materialWarehouse;

    public function __construct() {
        $this->materialWarehouse = new MaterialWarehouseRepository();
    }

    public function getAllMaterialWarehouse() {
        try {
            $materialWarehouse = $this->materialWarehouse->fetchAllMaterialWarehouse();
            return $materialWarehouse; 
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function getMaterialWarehouseById(string $id) {
        try {
            $materialWarehouse = $this->materialWarehouse->fetchMaterialWarehouseById($id);
            if ($materialWarehouse) {
                return $materialWarehouse; 
            } else {
                return ['error' => 'Không tìm thấy kho nguyên liệu với ID: ' . $id];
            }
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function updateMaterialWarehouse($materialWarehouseData) {
        try {
            $response = $this->materialWarehouse->updateMaterialWarehouse($materialWarehouseData);
    
            if ($response && $response['code'] == 200) {
                return ['success' => 'Cập nhật thông tin kho nguyên liệu thành công!'];
            } else {
                error_log('Có lỗi khi cập nhật kho nguyên liệu: ' . json_encode($response));
                return ['error' => 'Cập nhật thông tin kho nguyên liệu thất bại!'];
            }
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function createMaterialWarehouse($materialWarehouseData) {
        try {
            $response = $this->materialWarehouse->createMaterialWarehouse($materialWarehouseData);
            
            if ($response && $response['code'] == 201) {
                return ['success' => 'Thêm kho nguyên liệu thành công!'];
            } else {
                error_log('Có lỗi khi tạo mới kho nguyên liệu: ' . json_encode($response));
                return ['error' => 'Thêm kho nguyên liệu thất bại!'];
            }
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function deleteMaterialWarehouse($id) {
        try {
            $response = $this->materialWarehouse->deleteMaterialWarehouse($id);
            if ($response && $response['code'] == 200) {
                return ['success' => 'Xóa kho nguyên liệu thành công!'];
            } else {
                error_log('Có lỗi khi xóa kho nguyên liệu: ' . json_encode($response));
                return ['error' => 'Xóa kho nguyên liệu thất bại!'];
            }
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function searchMaterialWarehouse($keywords) {
        try {
            $materialWarehouse = $this->materialWarehouse->fetchMaterialWarehouseById($keywords);
            
            // Kiểm tra nếu có kết quả
            if (!empty($materialWarehouse)) {
                return $materialWarehouse;
            } else {
                return []; 
            }
        } catch (Exception $e) {
            return []; 
        }
    }
}
