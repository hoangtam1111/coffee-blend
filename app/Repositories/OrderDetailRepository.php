<?php
namespace App\Repositories;
use App\Repositories\Interfaces\OrderDetailRepositoryInterface;
use App\Models\OrderDetail;
class OrderDetailRepository implements  OrderDetailRepositoryInterface{
    public function getAllOrderDetails(){
        return OrderDetail::get();
    }
    public function getOrderDetail($id){
        return OrderDetail::find($id);
    }
    public function insertOrderDetail($data){
        OrderDetail::create($data);
    }
    public function updateOrderDetail($data,$id){
        $orderDetail=OrderDetail::where('id',$id)->first();
        $orderDetail->quantity=$data['quantity'];
        $orderDetail->total=$data['total'];
        $orderDetail->order_id=$data['order_id'];
        $orderDetail->product_id=$data['product_id'];
        $orderDetail->save();
    }
    public function deleteOrderDetail($id){
        $orderDetail=OrderDetail::find($id);
        $orderDetail->delete();
    }
}
