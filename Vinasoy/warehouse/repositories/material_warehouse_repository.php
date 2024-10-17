<?php

class MaterialWarehouseRepository
{
    private $apiService;

    public function __construct()
    {
        $this->apiService = new ApiService();
    }

    public function fetchAllMaterialWarehouse()
    {
        $response = $this->apiService->get('api/v1/material-warehouse');

        if ($response && $response['code'] == 200 && !empty($response['result'])) {
            $materialWarehouseList = [];

            foreach ($response['result'] as $materialWarehouseData) {
                $materialWarehouseList[] = new MaterialWarehouseResponseDTO($materialWarehouseData);
            }

            return $materialWarehouseList;
        }
        return [];
    }

    public function fetchMaterialWarehouseById(string $materialWarehouseId): ?MaterialWarehouseResponseDTO
    {
        $response = $this->apiService->get("api/v1/material-warehouse/$materialWarehouseId");
        if ($response && $response['code'] == 200) {
            return new MaterialWarehouseResponseDTO($response['result']);
        }

        return null;
    }

    public function updateMaterialWarehouse(array $materialWarehouseData)
    {
        $response = $this->apiService->put("api/v1/material-warehouse", $materialWarehouseData);
        return $response;
    }

    public function createMaterialWarehouse(array $materialWarehouseData)
    {
        $response = $this->apiService->post("api/v1/material-warehouse", $materialWarehouseData);
        return $response;
    }

    public function deleteMaterialWarehouse(string $id)
    {
        $response = $this->apiService->delete("api/v1/material-warehouse/{$id}");
        return $response;
    }

    public function searchMaterialWarehouses(string $keywords)
    {
        $response = $this->apiService->get("api/v1/material-warehouse/" . urlencode($keywords));

        if ($response && $response['code'] == 200 && !empty($response['result'])) {
            $materialWarehouseList = [];

            foreach ($response['result'] as $materialWarehouseData) {
                $materialWarehouseList[] = new MaterialWarehouseResponseDTO($materialWarehouseData);
            }
            return $materialWarehouseList;
        }
        
        return [];
    }
}
