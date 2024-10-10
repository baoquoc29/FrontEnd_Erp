<?php
// SalaryGradeScaleController.php

class SalaryGradeScaleController {
    private $salaryGradeScaleRepo;

    public function __construct() {
        $this->salaryGradeScaleRepo = new SalaryGradeScaleRepository();
    }

    // Lấy danh sách Salary Grade Scale
    public function getSalaryGradeScaleList() {
        try {
            $salaryGradeScaleList = $this->salaryGradeScaleRepo->fetchSalaryGradeScaleList();
            return $salaryGradeScaleList;
        } catch (Exception $e) {
            // Xử lý lỗi
            return ['error' => $e->getMessage()];
        }
    }

    // Cập nhật thông tin Salary Grade Scale
    public function updateSalaryGradeScale($salaryGradeScaleData) {
        try {
            // Gọi phương thức cập nhật trong repository
            $response = $this->salaryGradeScaleRepo->updateSalaryGradeScale($salaryGradeScaleData);
            
            // Kiểm tra phản hồi
            if ($response && $response['code'] == 200) {
                return ['success' => 'Cập nhật thông tin thành công!'];
            } else {
                error_log('Error updating salary grade scale: ' . json_encode($response));
                return ['error' => 'Cập nhật thông tin thất bại!'];
            }
        } catch (Exception $e) {
            // Xử lý lỗi
            return ['error' => $e->getMessage()];
        }
    }

    // Lấy thông tin Salary Grade Scale theo ID
    public function getSalaryGradeScaleById($id) {
        try {
            // Gọi phương thức để lấy thông tin theo ID
            $salaryGradeScale = $this->salaryGradeScaleRepo->fetchSalaryGradeScaleById($id);
            if ($salaryGradeScale) {
                return $salaryGradeScale;
            } else {
                return ['error' => 'Không tìm thấy ngạch lương với ID: ' . $id];
            }
        } catch (Exception $e) {
            // Xử lý lỗi
            return ['error' => $e->getMessage()];
        }
    }

    // Tạo mới Salary Grade Scale
    public function createSalaryGradeScale($salaryGradeScaleData) {
        try {
            // Gọi phương thức tạo mới trong repository
            $response = $this->salaryGradeScaleRepo->createSalaryGradeScale($salaryGradeScaleData);
            
            // Kiểm tra phản hồi từ API 
            if ($response && $response['code'] == 201) {
                return ['success' => 'Tạo Salary Grade Scale mới thành công!'];
            } else {
                // Nếu không thành công, log và trả về thông báo lỗi
                error_log('Error creating salary grade scale: ' . json_encode($response));
                return ['error' => 'Tạo Salary Grade Scale thất bại! ' . ($response['message'] ?? 'Vui lòng kiểm tra lại dữ liệu.')];
            }
        } catch (Exception $e) {
            // Log lỗi và trả về thông báo lỗi
            error_log('Exception occurred while creating salary grade scale: ' . $e->getMessage());
            return ['error' => 'Đã xảy ra lỗi: ' . $e->getMessage()];
        }
    }

    public function deleteSalaryGradeScale($id) {
        try {
            // Gọi phương thức xóa trong repository
            $response = $this->salaryGradeScaleRepo->deleteSalaryGradeScale($id);
            
            // Kiểm tra phản hồi
            if ($response && $response['code'] == 200) {
                return ['success' => 'Xóa Salary Grade Scale thành công!'];
            } else {
                error_log('Error deleting salary grade scale: ' . json_encode($response));
                return ['error' => 'Xóa Salary Grade Scale thất bại!'];
            }
        } catch (Exception $e) {
            // Xử lý lỗi
            return ['error' => $e->getMessage()];
        }
    }

    public function searchSalaryGradeScale($query) {
        try {
            $salaryGradeScaleList = $this->salaryGradeScaleRepo->searchSalaryGradeScale($query);
            return $salaryGradeScaleList;
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }


}
