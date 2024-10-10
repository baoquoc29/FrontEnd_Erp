<?php

class SalaryGradeScaleRepository {
    private $apiService;

    public function __construct() {
        $this->apiService = new ApiService();
    }

    public function fetchSalaryGradeScaleList() {
        $response = $this->apiService->get('/api/v1/salary-grade-scales');
        if ($response && $response['code'] == 200 && !empty($response['result'])) {
            $salaryGradeScaleList = [];
            foreach ($response['result'] as $salaryGradeScaleData) {
                $salaryGradeScaleList[] = new SalaryGradeScale($salaryGradeScaleData);
            }
            return $salaryGradeScaleList;
        }

        return [];
    }

    public function fetchSalaryGradeScaleById($id) {
        $response = $this->apiService->get("/api/v1/salary-grade-scales/{$id}");
        if ($response && $response['code'] == 200 && !empty($response['result'])) {
            return new SalaryGradeScale($response['result']);
        }
        return null;
    }

    public function updateSalaryGradeScale($salaryGradeScaleData) {
        $response = $this->apiService->put("/api/v1/salary-grade-scales", $salaryGradeScaleData);
        return $response; 
    }

    public function deleteSalaryGradeScale($id) {
        return $this->apiService->delete("/api/v1/salary-grade-scales/{$id}");
    }

    public function createSalaryGradeScale($salaryGradeScaleData) {
        return $this->apiService->post("/api/v1/salary-grade-scales", $salaryGradeScaleData);
    }

    public function searchSalaryGradeScale($query) {
        $response = $this->apiService->get("/api/v1/salary-grade-scales/search?query=" . urlencode($query));
        if ($response && $response['code'] == 200 && !empty($response['result'])) {
            $salaryGradeScaleList = [];
            foreach ($response['result'] as $salaryGradeScaleData) {
                $salaryGradeScaleList[] = new SalaryGradeScale($salaryGradeScaleData);
            }
            return $salaryGradeScaleList;
        }
        return [];
    }
}
