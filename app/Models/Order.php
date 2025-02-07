<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table='orders';
    protected $fillable=[
        'id',
        'total_amout',
        'active',
        'user_id',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
