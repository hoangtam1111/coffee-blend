<?php
namespace App\Repositories\Interfaces;
interface ProductRepositoryInterface{
    public function getAllProducts();
    public function getProduct($id);
    public function getProductByType($id_type);
    public function getQuantityProduct($num);
    public function insertProduct($data);
    public function updateProduct($data,$id);
    public function deleteProduct($id);
}
