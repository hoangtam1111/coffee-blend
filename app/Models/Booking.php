<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table='bookings';
    protected $fillable=[
        'id',
        'first_name',
        'last_name',
        'time',
        'date',
        'phone',
        'message',
        'active',
        'user_id'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
