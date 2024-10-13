<?php

class ProductWarehouseController {
    private $productWarehouse;

    public function __construct() {
        $this->productWarehouse = new ProductWarehouseRepository();
    }

    public function getAllProductWarehouse() {
        try {
            $productWarehouse = $this->productWarehouse->fetchAllProductWarehouse();
            return $productWarehouse; 
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function getProductWarehouseById(string $id) {
        try {
            $productWarehouse = $this->productWarehouse->fetchProductWarehouseById($id);
            if ($productWarehouse) {
                return $productWarehouse; 
            } else {
                return ['error' => 'Không tìm thấy kho sản phẩm với ID: ' . $id];
            }
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function updateProductWarehouse($productWarehouseData) {
        try {
            $response = $this->productWarehouse->updateProductWarehouse($productWarehouseData);
    
            if ($response && $response['code'] == 200) {
                return ['success' => 'Cập nhật thông tin kho sản phẩm thành công!'];
            } else {
                error_log('Error updating product warehouse: ' . json_encode($response));
                return ['error' => 'Cập nhật thông tin kho sản phẩm thất bại!'];
            }
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function createProductWarehouse($productWarehouseData) {
        try {
            $response = $this->productWarehouse->createProductWarehouse($productWarehouseData);
            
            if ($response && $response['code'] == 201) {
                return ['success' => 'Thêm kho sản phẩm thành công!'];
            } else {
                error_log('Error creating product warehouse: ' . json_encode($response));
                return ['error' => 'Thêm kho sản phẩm thất bại!'];
            }
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function deleteProductWarehouse($id) {
        try {
            $response = $this->productWarehouse->deleteProductWarehouse($id);
            if ($response && $response['code'] == 200) {
                return ['success' => 'Xóa kho sản phẩm thành công!'];
            } else {
                error_log('Error deleting product warehouse: ' . json_encode($response));
                return ['error' => 'Xóa kho sản phẩm thất bại!'];
            }
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function searchProductWarehouse($keywords) {
        try {
            $ProductWarehouse = $this->productWarehouse->fetchProductWarehouseById($keywords);
            
            // Kiểm tra nếu có kết quả
            if (!empty($ProductWarehouse)) {
                return $ProductWarehouse;
            } else {
                return []; 
            }
        } catch (Exception $e) {
            return []; 
        }
    }
}
