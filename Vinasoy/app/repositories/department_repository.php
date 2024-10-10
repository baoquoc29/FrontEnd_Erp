<?php

class DepartmentRepository {
    private $apiService;

    public function __construct() {
        $this->apiService = new ApiService();
    }

    // Lấy danh sách phòng ban
    public function fetchDepartmentList() {
        $response = $this->apiService->get('/api/v1/departments');
        
        if ($response && $response['code'] == 200 && !empty($response['result'])) {
            $departmentList = [];
            foreach ($response['result'] as $departmentData) {
                $departmentList[] = new DepartmentDTO($departmentData);
            }

            return $departmentList;
        }

        return []; // Trả về mảng rỗng nếu không có kết quả
    }

    // Lấy thông tin phòng ban theo ID
    public function fetchDepartmentById($id) {
        $response = $this->apiService->get("/api/v1/departments/$id");

        if ($response && $response['code'] == 200) {
            return new DepartmentDTO($response['result']);
        }

        return null; // Trả về null nếu không tìm thấy
    }

    // Cập nhật thông tin phòng ban
    public function updateDepartment($id, $departmentData) {
        $response = $this->apiService->put("/api/v1/departments/$id", $departmentData);
        if ($response && $response['code'] == 200) {
            return new DepartmentDTO($response['result']); // Trả về đối tượng đã cập nhật
        }
        return null; // Hoặc xử lý lỗi nếu cần
    }

    // Xóa phòng ban
    public function deleteDepartment($id) {
        $response = $this->apiService->delete("/api/v1/departments/$id");
        return $response; // Trả về phản hồi từ API
    }

    // Thêm phòng ban
    public function createDepartment($departmentData) {
        $response = $this->apiService->post("/api/v1/departments", $departmentData);
        if ($response && $response['code'] == 201) {
            return new DepartmentDTO($response['result']); // Trả về đối tượng đã tạo
        }
        return null; // Hoặc xử lý lỗi nếu cần
    }
}
