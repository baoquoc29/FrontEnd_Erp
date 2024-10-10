<?php

class DepartmentDTO
{
    private string $departmentId; // Thay đổi thành departmentId
    private string $nameDepartment;
    private string $addressDepartment;
    private string $phoneDepartment;

    public function __construct(array $data)
    {
        $this->departmentId = $data['departmentID'] ?? ''; // Thay đổi thành departmentId
        $this->nameDepartment = $data['nameDepartment'] ?? '';
        $this->addressDepartment = $data['addressDepartment'] ?? '';
        $this->phoneDepartment = $data['phoneDepartment'] ?? '';
    }

    public function getDepartmentId(): string // Thay đổi thành getDepartmentId
    {
        return $this->departmentId;
    }

    public function setDepartmentId(string $departmentId): void // Thay đổi thành setDepartmentId
    {
        $this->departmentId = $departmentId;
    }

    public function getNameDepartment(): string
    {
        return $this->nameDepartment;
    }

    public function setNameDepartment(string $nameDepartment): void
    {
        $this->nameDepartment = $nameDepartment;
    }

    public function getAddressDepartment(): string
    {
        return $this->addressDepartment;
    }

    public function setAddressDepartment(string $addressDepartment): void
    {
        $this->addressDepartment = $addressDepartment;
    }

    public function getPhoneDepartment(): string
    {
        return $this->phoneDepartment;
    }

    public function setPhoneDepartment(string $phoneDepartment): void
    {
        $this->phoneDepartment = $phoneDepartment;
    }
}
