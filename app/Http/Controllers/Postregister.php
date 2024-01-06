<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\User;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class Postregister extends Controller
{
    //
  public function __construct()
  {
    $this->middleware('auth')->except(['show','index']); // es para verificar si el usario esta autenticado y se necesita el nombre exacto de login en la ruta
    //para que pueda ser usado 
  }
    public function index( User $user ){
      //aqui pasamos la variable user bueno el modelo user hacia la vista para mostrar lo que estamos viendo 
      //del usario visitado
      //esto va en conjunto con la ruta donde le decimos que use el nombre del usario
         $post= post::where('user_id',$user->id)->latest()->paginate(5); // where cuando  user  id 
         //paginet es para paginar cosas 
         //tambie exist paginesimple
         //podriamos $user->posts y mostraria array pero tambien no se  puede paginar
        
        return view('dashboard',['user'=>$user,'posts'=>$post]);

    }
   
public function create()
    {

    return view('Post.create');
  }

  public function store(Request $request){
    //,'ímagen'=>'required' lo quite por que no me lee la configuracion de app.js
    $this->validate($request,['titulo'=>'required|max:255','descripcion' =>'required|min:4']);
     

   post::create([
    'titulo'=>$request->titulo,
    'descripcion'=>$request->descripcion,
    'imagen'=>$request->imagen,
    'user_id'=>auth()->user()->id
   ]);
   //otra forma es 


  //  $post= new post();
  //  $post->titulo=$request->titulo,
  // y asi sucesivamentes




   //lo llevamos hacia su direccion
   return redirect()->route('muro',auth()->user()->username);
  }


  public function show( User $user, post $post) {
    return view('post.show',['post'=>$post ,'user'=>$user]);
  }
  public function destroy( post $post){
// aqui usamos polices 
   $this->authorize('delete',$post);


   $post->delete();
//eliminar imagen
   $imagen_path=public_path('uploads/' .$post->imagen);
     if (File::exists($imagen_path)) {
     unlink($imagen_path);
     }
   return  redirect()->route('muro',auth()->user()->username);

  }
}