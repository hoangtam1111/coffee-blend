<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table='orders';
    protected $fillable=[
        'id',
        'quantity',
        'total',
        'order_id',
        'product_id'
    ];
    public function order(){
        return $this->belongsTo(Order::class);
    }
    public function product(){
        return  $this->belongsTo(Product::class);
    }
}
