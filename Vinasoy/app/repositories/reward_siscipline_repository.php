<?php

class RewardDisciplineRepository
{
    private $apiService;

    public function __construct()
    {
        $this->apiService = new ApiService();
    }

    public function fetchAllRewardDisciplines()
    {
        $response = $this->apiService->get('/api/v1/reward-disciplines');

        if ($response && $response['code'] == 200 && !empty($response['result'])) {
            $rewardDisciplineList = [];

            foreach ($response['result'] as $rewardDisciplineData) {
                $rewardDisciplineList[] = new RewardDisciplineResponseDTO($rewardDisciplineData);
            }

            return $rewardDisciplineList;
        }
        return [];
    }

    public function fetchRewardDisciplineById(string $rewardDisciplineId): ?RewardDisciplineResponseDTO
    {
        $response = $this->apiService->get("/api/v1/reward-disciplines/$rewardDisciplineId");

        if ($response && $response['code'] == 200) {
            return new RewardDisciplineResponseDTO($response['result']);
        }

        return null;
    }

    public function updateRewardDiscipline(array $rewardDisciplineData)
    {
        $response = $this->apiService->put("/api/v1/reward-disciplines", $rewardDisciplineData);
        return $response;
    }

    public function createRewardDiscipline(array $rewardDisciplineData)
    {
        $response = $this->apiService->post("/api/v1/reward-disciplines", $rewardDisciplineData);
        return $response;
    }

    public function deleteRewardDiscipline(string $id)
    {
        $response = $this->apiService->delete("/api/v1/reward-disciplines/{$id}");
        return $response;
    }

    public function searchRewardDisciplines(string $keywords)
    {
        $response = $this->apiService->get("/api/v1/reward-disciplines/search?keyword=" . urlencode($keywords));

        if ($response && $response['code'] == 200 && !empty($response['result'])) {
            $rewardDisciplineList = [];

            foreach ($response['result'] as $rewardDisciplineData) {
                $rewardDisciplineList[] = new RewardDisciplineResponseDTO($rewardDisciplineData);
            }
            return $rewardDisciplineList;
        }
        
        return [];
    }
}
