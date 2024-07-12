<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evalute extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table='evalutes';
    protected $fillable=[
        'id',
        'subject',
        'message',
        'email',
        'name',
        'user_id'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
