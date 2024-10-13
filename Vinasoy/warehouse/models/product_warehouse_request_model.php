<?php

class ProductWarehouseRequestDTO {
    private string $productWarehouseId;
    private string $productId;
    private int $quantity; 
    private DateTime $dateOfImport;
    private string $productWhStatus;

    public function __construct(array $data) {
        $this->productWarehouseId = $data['productWarehouseId'] ?? ''; // Giá trị mặc định là chuỗi rỗng
        $this->productId = $data['productId'] ?? ''; // Giá trị mặc định là chuỗi rỗng
        $this->quantity = (int)($data['quantity'] ?? 0); // Giá trị mặc định là 0
        $this->dateOfImport = new DateTime($data['dateOfImport'] ?? 'now'); // Khởi tạo ngày bắt đầu
        $this->productWhStatus = $data['productWhStatus'] ?? ''; // Giá trị mặc định là chuỗi rỗng
    }

    // Getter và Setter
    public function getProductWarehouseId(): string {
        return $this->productWarehouseId;
    }

    public function setProductWarehouseId(string $productWarehouseId): void {
        $this->productWarehouseId = $productWarehouseId;
    }

    public function getProductId(): string {
        return $this->productId;
    }

    public function setProductId(string $productId): void {
        $this->productId = $productId;
    }

    public function getQuantity(): int {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): void {
        $this->quantity = $quantity;
    }

    public function getDateOfImport(): DateTime {
        return $this->dateOfImport;
    }

    public function setDateOfImport(DateTime $dateOfImport): void {
        $this->dateOfImport = $dateOfImport;
    }

    public function getProductWhStatus(): string {
        return $this->productWhStatus;
    }

    public function setProductWhStatus(string $productWhStatus): void {
        $this->productWhStatus = $productWhStatus;
    }

    // Phương thức để lấy ngày bắt đầu dưới dạng chuỗi
    public function getFormattedDateOfImport(): string {
        return $this->dateOfImport->format('Y-m-d');
    }
}
