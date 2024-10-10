<?php

class EmployeeRequestDTO {
    private string $employeeID;
    private string $employeeName;
    private \DateTime $birthday; // Sử dụng DateTime cho ngày tháng
    private string $gender;
    private string $phoneNumber;
    private string $email;
    private string $cccd;
    private string $address;
    private string $contractId;
    private string $employeeStatus;
    private ?string $positionId; // Có thể null
    private ?string $departmentId; // Có thể null

    public function __construct(
        string $employeeID,
        string $employeeName,
        \DateTime $birthday, // Chuyển sang kiểu DateTime
        string $gender,
        string $phoneNumber,
        string $email,
        string $cccd,
        string $address,
        string $employeeStatus,
        ?string $positionId = null,
        ?string $departmentId = null,
        string $contractId=null,
    ) {
        $this->employeeID = $employeeID;
        $this->employeeName = $employeeName;
        $this->birthday = $birthday; // Lưu trữ DateTime
        $this->gender = $gender;
        $this->phoneNumber = $phoneNumber;
        $this->email = $email;
        $this->cccd = $cccd;
        $this->address = $address;
        $this->employeeStatus = $employeeStatus;
        $this->positionId = $positionId;
        $this->departmentId = $departmentId;
        $this->contractId = $contractId;
    }

    // Getter methods
    public function getEmployeeID(): string {
        return $this->employeeID;
    }

   

    public function getEmployeeName(): string {
        return $this->employeeName;
    }

    public function getBirthday(): \DateTime { // Trả về kiểu DateTime
        return $this->birthday;
    }

    public function getGender(): string {
        return $this->gender;
    }

    public function getPhoneNumber(): string {
        return $this->phoneNumber;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getCccd(): string {
        return $this->cccd;
    }

    public function getAddress(): string {
        return $this->address;
    }

    public function getEmployeeStatus(): string {
        return $this->employeeStatus;
    }

    public function getPositionID(): ?string {
        return $this->positionId;
    }

    public function getDepartmentID(): ?string {
        return $this->departmentId;
    }

    public function getContractID():string{
        return $this-> contractId;
    }

    
}
