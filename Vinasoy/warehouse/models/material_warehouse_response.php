<?php

class MaterialWarehouseResponseDTO {
    private string $MaterialWarehouseId;
    private MaterialDTO $MaterialDTO;
    private int $quantity;
    private string $note; 
    private string $materialWhStatus;

    public function __construct(array $data)
    {
        $this->materialWarehouseId = $data['materialWarehouseId'];
        $this->materialDTO = new MaterialDTO($data['materialDTO']);
        $this->quantity = $data['quantity'];
        $this->note = $data['note'] ?? ''; 
        $this->materialWhStatus = $data['mwhStatus'];
    }

    // Getter và Setter cho các thuộc tính
    public function getMaterialWarehouseId(): string
    {
        return $this->materialWarehouseId;
    }

    public function setMaterialWarehouseId(string $materialWarehouseId): void
    {
        $this->materialWarehouseId = $materialWarehouseId;
    }

    public function getMaterialDTO(): MaterialDTO
    {
        return $this->materialDTO;
    }

    public function setMaterialDTO(MaterialDTO $materialDTO): void
    {
        $this->materialDTO = $materialDTO;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function getNote(): string
    {
        return $this->note;
    }

    public function setNote(string $note): void
    {
        $this->note = $note;
    }

    public function getMaterialWhStatus(): string
    {
        return $this->materialWhStatus;
    }

    public function setMaterialWhStatus(string $materialWhStatus): void
    {
        $this->materialWhStatus = $materialWhStatus;
    }
}
