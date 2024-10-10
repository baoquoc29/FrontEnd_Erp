<?php
// EmployeeController.php

class EmployeeController {
    private $employeeRepo;

    public function __construct() {
        $this->employeeRepo = new EmployeeRepository();
    }

    public function getEmployeeList() {
        try {
            $employeeList = $this->employeeRepo->fetchEmployeeList();
            return $employeeList; 
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function updateEmployee($employeeData) {
        try {
            $response = $this->employeeRepo->updateEmployee($employeeData);
    
            if ($response && $response['code'] == 200) {
                return ['success' => 'Cập nhật thông tin nhân viên thành công!'];
            } else {
                error_log('Error updating employee: ' . json_encode($response));
                return ['error' => 'Cập nhật thông tin nhân viên thất bại!'];
            }
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function getEmployeeById($id) {
        try {
            $employee = $this->employeeRepo->fetchEmployeeById($id);
            if ($employee) {
                return $employee; 
            } else {
                return ['error' => 'Không tìm thấy nhân viên với ID: ' . $id];
            }
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    // Thêm phương thức tạo nhân viên
    public function createEmployee($employeeData) {
        try {
            var_dump($employeeData);
            $response = $this->employeeRepo->createEmployee($employeeData);
            
            if ($response && $response['code'] == 201) {
                return ['success' => 'Thêm nhân viên thành công!'];
            } else {
                error_log('Error creating employee: ' . json_encode($response));
                return ['error' => 'Thêm nhân viên thất bại!'];
            }
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function searchEmployees($keywords) {
        try {
            $employeeList = $this->employeeRepo->searchEmployees($keywords);
            if (!empty($employeeList)) {
                return $employeeList;
            } else {
                return [];
            }
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
