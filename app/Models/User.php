<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
 public function posts(){
     return $this->hasMany(post::class);
 }
 public function likes(){
    return $this->hasMany(like::class);
 }
 public function followers(){
     //esto se hace asi por que estamos rompiendo las normaritivas de laravel 
     return $this->belongsToMany( User::class,'followers','user_id','follower_id');


 }
 public function following(){
    //se supone que aqui son los que yo estoy siguiendo
    return $this->belongsToMany( User::class,'followers','follower_id','user_id');


}
 public function siguiendo(User $user){
// aqui pregunta si esa relacion contiene eso , bueno la tabla contiene ese id 
     return $this->followers->contains( $user->id);

 }
}
