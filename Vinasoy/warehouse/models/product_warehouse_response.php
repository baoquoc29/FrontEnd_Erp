<?php

class ProductWarehouseResponseDTO {
    private string $productWarehouseId;
    private productDTO $productDTO;
    private int $quantity;
    private DateTime $dateOfImport; 
    private string $productWhStatus;

    public function __construct(array $data)
    {
        $this->productWarehouseId = $data['productWarehouseId'];
        $this->productDTO = new productDTO($data['productDTO']);
        $this->quantity = $data['quantity'];
        $this->dateOfImport = new DateTime($data['dateOfImport']); // Chuyển đổi sang DateTime
        $this->productWhStatus = $data['productWhStatus'];
    }

    // Getter và Setter cho các thuộc tính
    public function getProductWarehouseId(): string
    {
        return $this->productWarehouseId;
    }

    public function setProductWarehouseId(string $productWarehouseId): void
    {
        $this->productWarehouseId = $productWarehouseId;
    }

    public function getProductDTO(): productDTO
    {
        return $this->productDTO;
    }

    public function setProductDTO(productDTO $productDTO): void
    {
        $this->productDTO = $productDTO;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function getDateOfImport(): DateTime
    {
        return $this->dateOfImport;
    }

    public function setDateOfImport(DateTime $dateOfImport): void
    {
        $this->dateOfImport = $dateOfImport;
    }

    public function getProductWhStatus(): string
    {
        return $this->productWhStatus;
    }

    public function setProductWhStatus(string $productWhStatus): void
    {
        $this->productWhStatus = $productWhStatus;
    }
}
