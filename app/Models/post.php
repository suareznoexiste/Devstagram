<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function Laravel\Prompts\select;

class post extends Model
{
    use HasFactory;
    //esto es importante para laravel si no inserta
    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(user::class)->select(['name', 'username']);
    }
    public function comentario()
    {

        // de esta forma un post va a  tener muchos comentarios
        return $this->hasMany(Comentario::class);
    }
    public function likes()
    {
        return $this->hasMany(like::class);
    }
    public function checklike(User $user)
    {
     //aqui hacemos una validacion si este marico ya le dio like o nel , 
     //enviamos desde donde llamamos este metodo si  este we ya dio like
        return $this->likes->contains('user_id', $user->id);
    }
}
