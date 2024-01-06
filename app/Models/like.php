<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class like extends Model
{
    use HasFactory;
// no le   ponemos post id por que lo asociamos desde el controlador 
    protected $fillable=[
        
        'user_id',
       
    ];
}
