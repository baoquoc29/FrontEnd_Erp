<?php

class ProductDTO
{
    private string $productId; // Thay đổi thành productId
    private string $productName;
    private string $productType;
    private int $weight;
    private string $unit;
    private string $shape;
    private float $unitPrice;

    public function __construct(array $data)
    {
        $this->productId = $data['productId'] ?? ''; // Thay đổi thành productId
        $this->productName = $data['productName'] ?? '';
        $this->productType = $data['productType'] ?? '';
        $this->weight = $data['weight'] ?? '';
        $this->unit = $data['unit'] ?? '';
        $this->shape = $data['shape'] ?? '';
        $this->unitPrice = $data['unitPrice'] ?? '';
    }

    public function getProductId(): string // Thay đổi thành getproductId
    {
        return $this->productId;
    }

    public function setProductId(string $productId): void // Thay đổi thành setproductId
    {
        $this->productId = $productId;
    }

    public function getProductName(): string
    {
        return $this->productName;
    }

    public function setProductName(string $productName): void
    {
        $this->productName = $productName;
    }

    public function getProductType(): string
    {
        return $this->productType;
    }

    public function setProductType(string $productType): void
    {
        $this->productType = $productType;
    }

    public function getWeight(): int
    {
        return $this->weight;
    }

    public function setWeight(int $weight): void
    {
        $this->weight = $weight;
    }

    public function getUnit(): string
    {
        return $this->unit;
    }

    public function setUnit(string $unit): void
    {
        $this->unit = $unit;
    }

    public function getShape(): string
    {
        return $this->shape;
    }

    public function setShape(string $shape): void
    {
        $this->shape = $shape;
    }

    public function getUnitPrice(): float
    {
        return $this->unitPrice;
    }

    public function setUnitPrice(float $unitPrice): void
    {
        $this->unitPrice = $unitPrice;
    }
}
