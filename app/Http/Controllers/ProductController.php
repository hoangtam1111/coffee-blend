<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $product;
    public function __construct(ProductRepositoryInterface $productRepositoryInterface){
        $this->product=$productRepositoryInterface;
    }
    //

    public function menu(){
        $desserts=$this->product->getProductByType(2);
        $drinks=$this->product->getProductByType(1);
        return view('menu', compact('desserts','drinks'));
    }
}
