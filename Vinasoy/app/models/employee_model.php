<?php
class EmployeeResponseDTO
{
    private string $employeeID;
    private string $employeeName;
    private DateTime $birthday;
    private string $gender;
    private string $phoneNumber;
    private string $email;
    private string $cccd;
    private string $address;
    private string $employeeStatus;
    private PositionDTO $position; 
    private DepartmentDTO $department;// Thay đổi kiểu dữ liệu của position

    public function __construct(array $data)
    {
        $this->employeeID = $data['employeeID'];
        $this->employeeName = $data['employeeName'];
        $this->birthday = new DateTime($data['birthday']); // Chuyển đổi sang DateTime
        $this->gender = $data['gender'];
        $this->phoneNumber = $data['phoneNumber'];
        $this->email = $data['email'];
        $this->cccd = $data['cccd'];
        $this->address = $data['address'];
        $this->employeeStatus = $data['employeeStatus']?? '';
        $this->position = new PositionDTO($data['position']);
        $this->department = new DepartmentDTO($data['department']); // Khởi tạo đối tượng PositionDTO
    }

    // Getter và Setter cho các thuộc tính
    public function getEmployeeID(): string
    {
        return $this->employeeID;
    }

    public function setEmployeeID(string $employeeID): void
    {
        $this->employeeID = $employeeID;
    }

    public function getEmployeeName(): string
    {
        return $this->employeeName;
    }

    public function setEmployeeName(string $employeeName): void
    {
        $this->employeeName = $employeeName;
    }

    public function getBirthday(): DateTime
    {
        return $this->birthday;
    }

    public function setBirthday(DateTime $birthday): void
    {
        $this->birthday = $birthday;
    }

    public function getGender(): string
    {
        return $this->gender;
    }

    public function setGender(string $gender): void
    {
        $this->gender = $gender;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getCccd(): string
    {
        return $this->cccd;
    }

    public function setCccd(string $cccd): void
    {
        $this->cccd = $cccd;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function getEmployeeStatus(): string
    {
        return $this->employeeStatus;
    }

    public function setEmployeeStatus(string $employeeStatus): void
    {
        $this->employeeStatus = $employeeStatus;
    }

    public function getPosition(): PositionDTO // Thêm getter cho vị trí
    {
        return $this->position;
    }

    public function setPosition(PositionDTO $position): void // Thêm setter cho vị trí
    {
        $this->position = $position;
    }

    public function getDepartment(): DepartmentDTO // Thêm getter cho vị trí
    {
        return $this->department;
    }

    public function setDepartment(DepartmentDTO $department): void // Thêm setter cho vị trí
    {
        $this->department = $department;
    }
}