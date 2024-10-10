<?php
class ContractController {
    private $contractRepo;

    public function __construct() {
        $this->contractRepo = new ContractRepository();
    }

    // Lấy danh sách hợp đồng
    public function getContractList() {
        try {
            $contractList = $this->contractRepo->fetchContractList();
            return $contractList; 
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    // Lấy hợp đồng theo ID
    public function getContractById($id) {
        try {
            $contract = $this->contractRepo->fetchContractById($id);
            if ($contract) {
                return $contract; 
            } else {
                return ['error' => 'Không tìm thấy hợp đồng với ID: ' . $id];
            }
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    // Cập nhật hợp đồng
    // Cập nhật hợp đồng
public function updateContract($contractData) {
    try {
        var_dump($contractData);
        $response = $this->contractRepo->updateContract($contractData);
        var_dump($response);
        // Kiểm tra phản hồi từ API
        if ($response && isset($response['code']) && $response['code'] === 200) {
            return ['success' => 'Cập nhật hợp đồng thành công!'];
        } else {
            error_log('Error updating contract: ' . json_encode($response));
            return ['error' => 'Cập nhật hợp đồng thất bại!'];
        }
    } catch (Exception $e) {
        error_log('Exception occurred: ' . $e->getMessage()); // Ghi lại lỗi vào log
        return ['error' => $e->getMessage()];
    }
}


    // Tạo hợp đồng mới
    public function createContract($contractData) {
        try {
            var_dump($contractData);
            $response = $this->contractRepo->createContract($contractData);
            var_dump($response);
            if ($response && $response['code'] == 201) {
                return [$response];
            } else {
                error_log('Error creating contract: ' . json_encode($response));
                return ['error' => 'Thêm hợp đồng thất bại!'];
            }
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function searchContracts($keywords) {
        try {
            $searchResults = $this->contractRepo->searchContracts($keywords);
            if (!empty($searchResults)) {
                return $searchResults; // Trả về kết quả tìm kiếm
            } else {
                return []; // Trả về mảng rỗng nếu không tìm thấy hợp đồng
            }
        } catch (Exception $e) {
            // Xử lý lỗi và trả về mảng rỗng
            return []; // Bạn có thể tùy chỉnh xử lý lỗi tại đây nếu cần
        }
    }
    
}
