<?php
namespace App\Repositories\Interfaces;
interface ProductTypeRepositoryInterface{
    public function getAllProductTypes();
    public function getProductType($id);
    public function insertProductType($data);
    public function updateProductType($data,$id);
    public function deleteProductType($id);
}
