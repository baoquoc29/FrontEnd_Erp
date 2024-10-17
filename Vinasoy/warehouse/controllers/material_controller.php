<?php

class MaterialController {
    private $materialRepo;

    public function __construct() {
        $this->materialRepo = new MaterialRepository();
    }

    public function getAllMaterials() {
        try {
            $materials = $this->materialRepo->fetchAllMaterials();
            return $materials; 
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}