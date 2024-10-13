<?php

class ProductWarehouseRepository
{
    private $apiService;

    public function __construct()
    {
        $this->apiService = new ApiService();
    }

    public function fetchAllProductWarehouse()
    {
        $response = $this->apiService->get('api/v1/product-warehouse');

        if ($response && $response['code'] == 200 && !empty($response['result'])) {
            $productWarehouseList = [];

            foreach ($response['result'] as $productWarehouseData) {
                $productWarehouseList[] = new ProductWarehouseResponseDTO($productWarehouseData);
            }

            return $productWarehouseList;
        }
        return [];
    }

    public function fetchProductWarehouseById(string $productWarehouseId): ?ProductWarehouseResponseDTO
    {
        $response = $this->apiService->get("api/v1/product-warehouse/$productWarehouseId");
        if ($response && $response['code'] == 200) {
            return new ProductWarehouseResponseDTO($response['result']);
        }

        return null;
    }

    public function updateProductWarehouse(array $productWarehouseData)
    {
        $response = $this->apiService->put("api/v1/product-warehouse", $productWarehouseData);
        return $response;
    }

    public function createProductWarehouse(array $productWarehouseData)
    {
        $response = $this->apiService->post("api/v1/product-warehouse", $productWarehouseData);
        return $response;
    }

    public function deleteProductWarehouse(string $id)
    {
        $response = $this->apiService->delete("api/v1/product-warehouse/{$id}");
        return $response;
    }

    public function searchProductWarehouses(string $keywords)
    {
        $response = $this->apiService->get("api/v1/product-warehouse/" . urlencode($keywords));

        if ($response && $response['code'] == 200 && !empty($response['result'])) {
            $productWarehouseList = [];

            foreach ($response['result'] as $productWarehouseData) {
                $productWarehouseList[] = new ProductWarehouseResponseDTO($productWarehouseData);
            }
            return $productWarehouseList;
        }
        
        return [];
    }
}
