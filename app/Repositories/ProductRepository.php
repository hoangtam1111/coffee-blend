<?php
namespace App\Repositories;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Models\Product;
class ProductRepository implements  ProductRepositoryInterface{
    public function getAllProducts(){
        return Product::get();
    }
    public function getProduct($id){
        return Product::find($id);
    }
    public function getProductByType($id_type){
        return Product::where('product_type_id',$id_type)->limit(6)->get();
    }
    public function getQuantityProduct($num){
        return Product::limit($num)->get();
    }
    public function insertProduct($data){
        Product::create($data);
    }
    public function updateProduct($data,$id){
        $product=Product::where('id',$id)->first();
        $product->name=$data['name'];
        $product->price=$data['price'];
        $product->description=$data['description'];
        $product->image=$data['image'];
        $product->product_type_id=$data['product_type_id'];
        $product->save();
    }
    public function deleteProduct($id){
        $product=Product::find($id);
        $product->delete();
    }
}
