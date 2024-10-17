<?php

class MaterialWarehouseRequestDTO {
    private string $materialWarehouseId;
    private string $materialId;
    private int $quantity; 
    private string $note;
    private string $materialWhStatus;

    public function __construct(array $data) {
        $this->materialWarehouseId = $data['materialWarehouseId'] ?? ''; // Giá trị mặc định là chuỗi rỗng
        $this->materialId = $data['materialId'] ?? ''; // Giá trị mặc định là chuỗi rỗng
        $this->quantity = (int)($data['quantity'] ?? 0); // Giá trị mặc định là 0
        $this->note = $data['note'] ?? ''; 
        $this->materialWhStatus = $data['materialWhStatus'] ?? ''; // Giá trị mặc định là chuỗi rỗng
    }

    // Getter và Setter
    public function getMaterialWarehouseId(): string {
        return $this->materialWarehouseId;
    }

    public function setMaterialWarehouseId(string $materialWarehouseId): void {
        $this->materialWarehouseId = $materialWarehouseId;
    }

    public function getMaterialId(): string {
        return $this->materialId;
    }

    public function setMaterialId(string $materialId): void {
        $this->materialId = $materialId;
    }

    public function getQuantity(): int {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): void {
        $this->quantity = $quantity;
    }

    public function getNote(): string {
        return $this->note;
    }

    public function setNote(string $note): void {
        $this->note = $note;
    }

    public function getMaterialWhStatus(): string {
        return $this->materialWhStatus;
    }

    public function setMaterialWhStatus(string $materialWhStatus): void {
        $this->materialWhStatus = $materialWhStatus;
    }
}
