<?php
class EmployeeRepository {
    private $apiService;

    public function __construct() {
        $this->apiService = new ApiService();
    }

    public function fetchEmployeeList() {
        $response = $this->apiService->get('/api/v1/employees');
        if ($response && $response['code'] == 200 && !empty($response['result'])) {
            $employeeList = [];
            foreach ($response['result'] as $employeeData) {
                $employeeList[] = new EmployeeResponseDTO($employeeData);
            }
            return $employeeList;
        }

        return [];
    }

    public function fetchEmployeeById($id) {
        $response = $this->apiService->get("/api/v1/employees/{$id}");
        if ($response && $response['code'] == 200 && !empty($response['result'])) {
            return new EmployeeResponseDTO($response['result']);
        }
        return null;
    }

    public function updateEmployee($employeeData) {
        $response = $this->apiService->put("/api/v1/employees", $employeeData);
        return $response; 
    }

    // Thêm phương thức tạo nhân viên
    public function createEmployee($employeeData) {
        $response = $this->apiService->post("/api/v1/employees", $employeeData);
        return $response;
    }

    public function searchEmployees($keywords) {
        $response = $this->apiService->get("/api/v1/employees/search?keywords=" . urlencode($keywords));
        if ($response && $response['code'] == 200 && !empty($response['result'])) {
            $employeeList = [];
            foreach ($response['result'] as $employeeData) {
                $employeeList[] = new EmployeeResponseDTO($employeeData);
            }
        
            return $employeeList;
        }
        return [];
    }
}
