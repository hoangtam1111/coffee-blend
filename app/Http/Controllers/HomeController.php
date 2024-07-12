<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\EvaluteRepositoryInterface;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    private $product,$evalute;
    public function __construct(ProductRepositoryInterface $productRepositoryInterface, EvaluteRepositoryInterface $evaluteRepositoryInterface){
        $this->product=$productRepositoryInterface;
        $this->evalute=$evaluteRepositoryInterface;
    }
    public function index(){
        $products=$this->product->getQuantityProduct(4);
        $evalutes=$this->evalute->getQuantityEvalute(5);
        $products_in_menu=$products;
        return view('index', compact('products','evalutes','products_in_menu'));
    }
    public function detail($id){
        $product=$this->product->getProduct($id);
        $products=$this->product->getQuantityProduct(4);
        return view('product-single',compact('product','products'));
    }
    public function about(){
        $products_in_menu=$this->product->getQuantityProduct(4);
        $evalutes=$this->evalute->getQuantityEvalute(5);
        return view('about', compact('products_in_menu','evalutes'));
    }
    public function contact(){
        return view('evalute');
    }
    public function services(){
        return view('services');
    }
}
