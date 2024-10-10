<?php

class SalaryGradeScale
{
    private string $salaryGradeScaleId;
    private string $salaryScale;
    private string $salaryGradeName;
    private float $salaryAmount; 
    private string $status;

    public function __construct(array $data)
    {
        $this->salaryGradeScaleId = $data['salaryGradeScaleId'];
        $this->salaryScale = $data['salaryScale'];
        $this->salaryGradeName = $data['salaryGradeName'];
        $this->salaryAmount = (float) $data['salaryAmount'];
        $this->status = $data['status'];
    }

    // Getter và Setter
    public function getSalaryGradeScaleId(): string
    {
        return $this->salaryGradeScaleId;
    }

    public function setSalaryGradeScaleId(string $salaryGradeScaleId): void
    {
        $this->salaryGradeScaleId = $salaryGradeScaleId;
    }

    public function getSalaryScale(): string
    {
        return $this->salaryScale;
    }

    public function setSalaryScale(string $salaryScale): void
    {
        $this->salaryScale = $salaryScale;
    }

    public function getSalaryGradeName(): string
    {
        return $this->salaryGradeName;
    }

    public function setSalaryGradeName(string $salaryGradeName): void
    {
        $this->salaryGradeName = $salaryGradeName;
    }

    public function getSalaryAmount(): float // Sử dụng float
    {
        return $this->salaryAmount;
    }

    public function setSalaryAmount(float $salaryAmount): void // Sử dụng float
    {
        $this->salaryAmount = $salaryAmount;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }
}
