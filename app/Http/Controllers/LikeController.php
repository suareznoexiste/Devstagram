<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    //Crea un nuevo “like” para el post actual.
    // El ‘like’ es asociado con el usuario que está actualmente autenticado.

    function store(Request $request, post $post)
    {
        // aqui en teoria es una tabla pivote pero no asociamos 
        // como los demas por que desde  este controllador enviamos el post ya creado 
        // entonces likes es un methodo de models no es la tabla como tal de migraciones 
        //al post le asignamos un likes y a su ves le asignamos el id del usuario
        $post->likes()->create([
            'user_id' => $request->user()->id
        ]);
        return back();
    }
    public function destroy(Request $request,post $post)
    {

          $request->user()->likes()->where('post_id',$post->id)->delete();
          return back();
           //esto nos retorna especificamente al mismo lugar 
    }
}
