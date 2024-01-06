<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    //NO ENTIENDO MUY BIEN COMO FUNCIONA ESTA PARTE 
    //Por que solo envio un dato en el attach

      public function store( User $user){
        // el attach es para relacion de muchos a muchos pero aqui 
        //usamos el metodo followers que como no usamos la convencion de laravel 
        // lo hacemos asi con el metodo  que se encuentra en el modelo 
        // en otras usamos el created como en like
        
        //Laravel sabe qué id ingresar porque se lo estás proporcionando explícitamente a través de auth()->user()->id (para el seguidor) y $user (para el usuario seguido).
              $user->followers()->attach(auth()->user()->id)  ;  
              return back();
      }
      public function destroy( User $user){
       
              $user->followers()->detach(auth()->user()->id)  ;  
              return back();
      }
}

