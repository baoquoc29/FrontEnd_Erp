<?php

class ContractResponseDTO {
    private string $contractID;
    private ?string $employeeName;
    private ?string $departmentName;
    private ?string $positionName;
    private float $salaryContract;
    private DateTime $startDate;
    private DateTime $endDate;
    private string $contractStatus;

    // Hàm khởi tạo từ API response (mảng dữ liệu)
    public function __construct(array $data) {
        $this->contractID = $data['contractID'];
        $this->employeeName = $data['employeeName'];
        $this->departmentName = $data['departmentName'];
        $this->positionName = $data['positionName'];
        $this->salaryContract = (float)$data['salaryContract'];
        $this->startDate = new DateTime($data['startDate']); // Chuyển từ string sang DateTime
        $this->endDate = new DateTime($data['endDate']); // Chuyển từ string sang DateTime
        $this->contractStatus = $data['contractStatus'];
    }

    // Getter methods
    public function getContractID(): string {
        return $this->contractID;
    }

    public function getEmployeeName(): string {
        return $this->employeeName;
    }

    public function getDepartmentName(): string {
        return $this->departmentName;
    }

    public function getPositionName(): string {
        return $this->positionName;
    }

    public function getSalaryContract(): float {
        return $this->salaryContract;
    }

    public function getStartDate(): DateTime {
        return $this->startDate;
    }

    public function getEndDate(): DateTime {
        return $this->endDate;
    }

    public function getContractStatus(): string {
        return $this->contractStatus;
    }

    // Phương thức format dữ liệu ngày thành chuỗi (nếu cần hiển thị)
    public function getFormattedStartDate(): string {
        return $this->startDate->format('Y-m-d');
    }

    public function getFormattedEndDate(): string {
        return $this->endDate->format('Y-m-d');
    }

    // Phương thức chuyển trạng thái hợp đồng thành chuỗi có ý nghĩa (nếu cần)
    public function getFormattedContractStatus(): string {
        return $this->contractStatus === "1" ? 'Đang hiệu lực' : 'Ngừng hiệu lực';
    }
}
