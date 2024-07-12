<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\CartRepositoryInterface;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private $cart, $product;
    public function __construct(CartRepositoryInterface $cartRepositoryInterface,  ProductRepositoryInterface $productRepositoryInterface){
        $this->cart=$cartRepositoryInterface;
        $this->product=$productRepositoryInterface;
    }
    public function index(){
        $totalPrice=0;
        $products=$this->product->getQuantityProduct(4);
        $carts=$this->cart->getCart(session()->get('id'));
        if($carts){
            foreach($carts as $cart){
                $totalPrice+=$cart->total;
            }
        }
        return view('cart', compact('products','carts','totalPrice'));
    }
    public function addCart(Request $request){
        if(session()->get('id')){
            $product=$this->product->getProduct($request->get('id'));
            $cart=$this->cart->getCartByProductAndUser(session()->get('id'),$product->id);
            if($cart){
                $this->cart->updateCart([
                    'quantity' => $cart->quantity+$request->get('quantity'),
                    'total' => ($cart->quantity+$request->get('quantity'))*$product->price
                ],$cart->id);
            }else{
                $this->cart->insertCart([
                    'quantity' => $request->get('quantity'),
                    'total' => $product->price*$request->get('quantity'),
                    'user_id' => session()->get('id'),
                    'product_id' => $product->id
                ]);
            }
            return redirect()->route('cart.index');
        }
        return redirect()->route('login');
    }
    public function deleteCart($id){
        $cart=$this->cart->getCartByProductAndUser(session()->get('id'),$id);
        if($cart){
            $this->cart->deleteCart($cart->id);
        }
        return redirect()->route('cart.index');
    }
}
