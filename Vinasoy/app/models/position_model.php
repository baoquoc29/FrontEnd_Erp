<?php
class PositionDTO
{
        private string $positionID;
        private string $namePosition;
        private float $allowanceAmount;
    
        public function __construct(array $data)
        {
            $this->positionID = $data['positionID'];
            $this->namePosition = $data['namePosition'];
            $this->allowanceAmount = $data['allowanceAmount'];
        }
    
        public function getPositionId(): string
        {
            return $this->positionID;
        }
    
        public function setPositionId(string $positionID): void
        {
            $this->positionID = $positionID;
        }
    
        public function getNamePosition(): string
        {
            return $this->namePosition;
        }
    
        public function setNamePosition(string $namePosition): void
        {
            $this->namePosition = $namePosition;
        }
    
        public function getAllowanceAmount(): float
        {
            return $this->allowanceAmount;
        }
    
        public function setAllowanceAmount(float $allowanceAmount): void
        {
            $this->allowanceAmount = $allowanceAmount;
        }
}
