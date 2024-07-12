<?php
namespace App\Repositories;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use App\Models\Order;
class OrderRepository implements  OrderRepositoryInterface{
    public function getAllOrders(){
        return Order::get();
    }
    public function getOrder($id){
        return Order::find($id);
    }
    public function insertOrder($data){
        Order::create($data);
    }
    public function updateOrder($data,$id){
        $order=Order::where('id',$id)->first();
        $order->total_amout=$data['total_amout'];
        $order->active=$data['active'];
        $order->user_id=$data['user_id'];
        $order->save();
    }
    public function deleteOrder($id){
        $order=Order::find($id);
        $order->delete();
    }
}
