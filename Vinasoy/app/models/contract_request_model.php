<?php

class ContractRequestDTO {
    private string $contractID;
    private string $salaryGradeScaleID;
    private float $salaryContract; // Sử dụng float thay vì BigDecimal
    private DateTime $startDate;
    private DateTime $endDate;
    private string $contractStatus;

    public function __construct(array $data) {
        $this->contractID = $data['contractID'] ?? ''; // Giá trị mặc định là chuỗi rỗng
        $this->salaryGradeScaleID = $data['salaryGradeScaleID'] ?? ''; // Giá trị mặc định là chuỗi rỗng
        $this->salaryContract = (float)($data['salaryContract'] ?? 0.0); // Giá trị mặc định là 0.0
        $this->startDate = new DateTime($data['startDate'] ?? 'now'); // Khởi tạo ngày bắt đầu
        $this->endDate = new DateTime($data['endDate'] ?? 'now'); // Khởi tạo ngày kết thúc
        $this->contractStatus = $data['contractStatus'] ?? ''; // Giá trị mặc định là chuỗi rỗng
    }

    // Getter và Setter
    public function getContractId(): string {
        return $this->contractID;
    }

    public function setContractId(string $contractId): void {
        $this->contractID = $contractId;
    }

    public function getSalaryGradeScaleId(): string {
        return $this->salaryGradeScaleID;
    }

    public function setSalaryGradeScaleId(string $salaryGradeScaleID): void {
        $this->salaryGradeScaleID = $salaryGradeScaleID;
    }

    public function getSalaryContract(): float {
        return $this->salaryContract;
    }

    public function setSalaryContract(float $salaryContract): void {
        $this->salaryContract = $salaryContract;
    }

    public function getStartDate(): DateTime {
        return $this->startDate;
    }

    public function setStartDate(DateTime $startDate): void {
        $this->startDate = $startDate;
    }

    public function getEndDate(): DateTime {
        return $this->endDate;
    }

    public function setEndDate(DateTime $endDate): void {
        $this->endDate = $endDate;
    }

    public function getContractStatus(): string {
        return $this->contractStatus;
    }

    public function setContractStatus(string $contractStatus): void {
        $this->contractStatus = $contractStatus;
    }

    // Phương thức để lấy ngày bắt đầu dưới dạng chuỗi
    public function getFormattedStartDate(): string {
        return $this->startDate->format('Y-m-d');
    }

    // Phương thức để lấy ngày kết thúc dưới dạng chuỗi
    public function getFormattedEndDate(): string {
        return $this->endDate->format('Y-m-d');
    }
}
