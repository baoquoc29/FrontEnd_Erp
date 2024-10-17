<?php
class MaterialRepository
{
    private $apiService;

    public function __construct()
    {
        $this->apiService = new ApiService();
    }

    public function fetchAllMaterials() {
    $response = $this->apiService->get('api/v1/materials');

    if ($response && $response['code'] == 200 && !empty($response['result'])) {
        $materialList = [];

        foreach ($response['result'] as $materialData) {
            $materialList[] = new MaterialDTO($materialData);
        }

        return $materialList;
    }

    return [];
    }
}