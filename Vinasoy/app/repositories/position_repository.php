<?php
class PositionRepository
{
    private $apiService;

    public function __construct()
    {
        $this->apiService = new ApiService();
    }

    public function fetchAllPositions() {
    $response = $this->apiService->get('/api/v1/positions');

    if ($response && $response['code'] == 200 && !empty($response['result'])) {
        $positionList = [];

        foreach ($response['result'] as $positionData) {
            $positionList[] = new PositionDTO($positionData);
        }

        return $positionList;
    }

    return [];
}

    
    

    public function fetchPositionById(string $positionId): ?PositionDTO
    {
        $response = $this->apiService->get("/api/v1/positions/$positionId"); 
        
        if ($response && $response['code'] == 200) {
            return new PositionDTO($response['result']);
        }

        return null; 
    }

    public function updatePosition($positionData) {
        $response = $this->apiService->put("/api/v1/positions", $positionData);
        return $response; 
    }

    public function createPosition($positionData) {
        $response = $this->apiService->post("/api/v1/positions", $positionData);
        return $response;
    }

    public function deletePosition($id) {
        $response = $this->apiService->delete("/api/v1/positions/{$id}");
        return $response;
    }

    public function searchPositions($keywords)
    {
        $response = $this->apiService->get("/api/v1/positions/search?keyword=" . urlencode($keywords));
        
        if ($response && $response['code'] == 200 && !empty($response['result'])) {
            $positionList = [];

            foreach ($response['result'] as $positionData) {
                $positionList[] = new PositionDTO($positionData);
            }
            return $positionList;
        }
        return [];
    }

}
