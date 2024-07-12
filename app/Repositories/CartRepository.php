<?php
namespace App\Repositories;
use App\Repositories\Interfaces\CartRepositoryInterface;
use App\Models\Cart;
class CartRepository implements  CartRepositoryInterface{
    public function getAllCarts(){
        return Cart::get();
    }
    public function getCart($id){
        return Cart::where('user_id',$id)->get();
    }
    public function getCartByProductAndUser($idUser,$idProduct){
        return Cart::where('user_id',$idUser)->where('product_id',$idProduct)->first();
    }
    public function insertCart($data){
        Cart::create($data);
    }
    public function updateCart($data,$id){
        $cart=Cart::where('id',$id)->first();
        $cart->quantity=$data['quantity'];
        $cart->total=$data['total'];
        $cart->save();
    }
    public function deleteCart($id){
        $cart=Cart::find($id);
        $cart->delete();
    }
}
