<?php

class MaterialDTO
{
    private string $materialId; // Thay đổi thành materialId
    private string $materialName;
    private string $unit;
    private string $note;

    public function __construct(array $data)
    {
        $this->materialId = $data['materialId'] ?? ''; // Thay đổi thành materialId
        $this->materialName = $data['materialName'] ?? '';
        $this->weight = $data['weight'] ?? '';
        $this->unit = $data['unit'] ?? '';
        $this->unitPrice = $data['unitPrice'] ?? '';
    }

    public function getMaterialId(): string // Thay đổi thành getmaterialId
    {
        return $this->materialId;
    }

    public function setMaterialId(string $materialId): void // Thay đổi thành setmaterialId
    {
        $this->materialId = $materialId;
    }

    public function getMaterialName(): string
    {
        return $this->materialName;
    }

    public function setMaterialName(string $materialName): void
    {
        $this->materialName = $materialName;
    }

    public function getUnit(): string
    {
        return $this->unit;
    }

    public function setUnit(string $unit): void
    {
        $this->unit = $unit;
    }

    public function getNote(): string
    {
        return $this->note;
    }

    public function setNote(string $note): void
    {
        $this->note = $note;
    }
}
