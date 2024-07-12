<?php
namespace App\Repositories;
use App\Repositories\Interfaces\ProductTypeRepositoryInterface;
use App\Models\ProductType;
class ProductTypeRepository implements  ProductTypeRepositoryInterface{
    public function getAllProductTypes(){
        return ProductType::get();
    }
    public function getProductType($id){
        return ProductType::find($id);
    }
    public function insertProductType($data){
        ProductType::create($data);
    }
    public function updateProductType($data,$id){
        $productType=ProductType::where('id',$id)->first();
        $productType->name=$data['name'];
        $productType->save();
    }
    public function deleteProductType($id){
        $productType=ProductType::find($id);
        $productType->delete();
    }
}
