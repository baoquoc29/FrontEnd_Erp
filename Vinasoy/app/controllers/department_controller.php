<?php

class DepartmentController {
    private $departmentRepo;

    public function __construct() {
        $this->departmentRepo = new DepartmentRepository();
    }

    // Lấy danh sách phòng ban
    public function getDepartmentList() {
        try {
            $departmentList = $this->departmentRepo->fetchDepartmentList();
            return $departmentList; 
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    // Cập nhật thông tin phòng ban
    public function updateDepartment($id, $departmentData) {
        try {
            $response = $this->departmentRepo->updateDepartment($id, $departmentData);
    
            if ($response) {
                return ['success' => 'Cập nhật thông tin phòng ban thành công!'];
            } else {
                error_log('Error updating department: ' . json_encode($response));
                return ['error' => 'Cập nhật thông tin phòng ban thất bại!'];
            }
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    // Lấy thông tin phòng ban theo ID
    public function getDepartmentById($id) {
        try {
            $department = $this->departmentRepo->fetchDepartmentById($id);
            if ($department) {
                return $department; 
            } else {
                return ['error' => 'Không tìm thấy phòng ban với ID: ' . $id];
            }
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    // Thêm phương thức tạo phòng ban
    public function createDepartment($departmentData) {
        try {
            $response = $this->departmentRepo->createDepartment($departmentData);
            
            if ($response && $response['code'] == 201) {
                return ['success' => 'Thêm phòng ban thành công!'];
            } else {
                error_log('Error creating department: ' . json_encode($response));
                return ['error' => 'Thêm phòng ban thất bại!'];
            }
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    // Thêm phương thức xóa phòng ban
    public function deleteDepartment($id) {
        try {
            $response = $this->departmentRepo->deleteDepartment($id);
            if ($response) {
                return ['success' => 'Xóa phòng ban thành công!'];
            } else {
                return ['error' => 'Xóa phòng ban thất bại!'];
            }
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
