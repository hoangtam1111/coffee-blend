<?php
namespace App\Repositories\Interfaces;
interface CartRepositoryInterface{
    public function getAllCarts();
    public function getCart($id);
    public function getCartByProductAndUser($idUser,$idProduct);
    public function insertCart($data);
    public function updateCart($data,$id);
    public function deleteCart($id);
}
