<?php

class ContractRepository {
    private $apiService;

    public function __construct() {
        $this->apiService = new ApiService();
    }

    // Phương thức lấy danh sách hợp đồng
    public function fetchContractList() {
        $response = $this->apiService->get('/api/v1/contracts');
        if ($response && $response['code'] == 200 && !empty($response['result'])) {
            $contractList = [];
            foreach ($response['result'] as $contractData) {
                $contractList[] = new ContractResponseDTO($contractData);
            }
            return $contractList;
        }
        return [];
    }

    public function fetchContractById($id) {
        $response = $this->apiService->get("/api/v1/contracts/{$id}");
        if ($response && $response['code'] == 200 && !empty($response['result'])) {
            return new ContractRequestDTO($response['result']);
        }
        return null;
    }

    public function updateContract(array $contractData) {
        // var_dump($contractData);
        return $this->apiService->put("/api/v1/contracts", $contractData);
    }
    
    


    public function createContract( $contractData) {
        $response = $this->apiService->post("/api/v1/contracts", $contractData);
        return $response;
    }
    

    // Phương thức xóa hợp đồng theo ID
    public function deleteContract($id) {
        $response = $this->apiService->delete("/api/v1/contracts/{$id}");
        return $response;
    }

    public function searchContracts($keywords) {
        $response = $this->apiService->get("/api/v1/contracts/search?keywords=" . urlencode($keywords));
        if ($response && $response['code'] == 200 && !empty($response['result'])) {
            $contractList = [];
            foreach ($response['result'] as $contractData) {
                $contractList[] = new ContractResponseDTO($contractData);
            }
            return $contractList; 
        }
        return []; 
    }
    

}
