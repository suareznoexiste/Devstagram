<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\post;
use App\Models\User;
use DragonCode\Contracts\Cashier\Auth\Auth;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    //
    public function store( Request $request ,  User $user , post $post)  {
      $this->validate($request,['comentario'=>'required|max:255']);

      Comentario::create(

        [ 
          'user_id'=> Auth()->user()->id ,
          'post_id'=> $post->id,
          'comentario'=>$request->comentario

        ]
        );
        return back()->with('mensaje', 'se ha comentado exitosamente ');
        //lo with se imprimen con una sesion
    }
  


}
