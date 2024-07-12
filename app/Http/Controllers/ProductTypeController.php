<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\ProductTypeRepositoryInterface;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    private $type;
    public function __construct(ProductTypeRepositoryInterface $productTypeRepositoryInterface){
        $this->type=$productTypeRepositoryInterface;
    }
    public function index(){
        $types=$this->type->getAllProductTypes();
        return view('admin.type.index', compact('types'));
    }
    public function insert(){
        return view('admin.type.index');
    }
    public function postInsert(Request $request){
        $data=$request->validate([
            'name' => 'required'
        ],[
            'name.required' => 'Please enter name type'
        ]);
        $this->type->insertProductType($data);
        return redirect()->route('admin.type.index');
    }
    public function update($id){
        $type=$this->type->getProductType($id);
        if($type){
            return view('admin.type.update', compact('type'));
        }
        return redirect()->route('admin.type.index');
    }
    public function postUpdate(Request $request){
        $data=$request->validate([
            'name' => 'required'
        ],[
            'name.required' => 'Please enter name type'
        ]);
        $this->type->updateProductType($data,$request->get('id'));
        return redirect()->route('admin.type.index');
    }
    public function delete($id){
        $this->type->deleteProductType($id);
        return redirect()->route('admin.type.index');
    }
}
