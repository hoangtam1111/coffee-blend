<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table='products';
    protected $fillable=[
        'id',
        'name',
        'price',
        'description',
        'image',
        'product_type_id'
    ];
    public function product_type(){
        return $this->belongsTo(ProductType::class);
    }
}
